<?php
class UsersController extends Appcontroller {
  var $name = "User";
  var $scaffold;
  var $paginate = array(
    'limit' => 2,
    'order' => array(
      'User.id' => 'desc'
    ) 
  );

  protected $_types = array(
    'add' => array('add', array()),
  );

  function index()
  {
    $this->set('users', $this->paginate());
    $options = array(
      //'conditons' =>
      'fields' => array(
        'User.id',
        'User.name',
      ),
      'limit'  => '2',
    );
    $this->set('users', $this->User->find('all', $options));
    //pr($this->User->find('all'));
    $this->render('/users/index');
  }

  function add() {
    if(!empty($this->data)) {
      //モデルにdataをセット
      $this->User->set($this->data);
      if(!$this->User->validates())
      {
        //入力に不備が合った場合の処理
        $this->render('/users/add');
        return;
      }

      //pr($this->data);
      //アクションを判定する
      $options = $this->_types[$this->params['action']];
      $options[1] = array_merge($options[1], array(
        'conditions' => array(
          '`User`.`mail`'     => $this->data['User']['mail'],
            //'`User`.`password`' => $this->data['User']['password'],
        )
        )
      );
      //メールアドレスが登録されているかをチェックする
      //$count = $this->User->find($options[0], $options[1]);
      $count = $this->User->find('count', $options[1]);
      //pr($count);
      if($count >= 1)
      {
        //メールアドレスが重複している
        $this->set('mailOverlap', true); 
        $this->render('/users/add');
        return ;
      }
      //exit("aaaaa");  
      //ユーザーデータの書き込み
      if($this->User->save($this->data))
      {
        $user_data  = $this->User->find('first', $options[1]);
        //pr($user_data);
        //exit("bbb");  
        //セッションへ書き込み
        $this->Session->write('auth', $user_data['User']);
        
        //ユーザーのページへリダイレクト
        $this->flash('ユーザー登録が完了しました。', '/posts/user/'.$user_data['User']['id'].'');
        //returnと書くといいですね。
        return ;
      }
    }
    $this->render('/users/add');
  }

  function edit($id=null)
  {
    //セッションチェック
    $this->checkSession();
    //セッションデータを読み込み
    $user_data = $this->Session->read('auth');
    //pr($user_data); 
    //$this->set(compact(user_data));
    if(empty($this->data))
    {
      //フォームから入力が無い場合
      $this->User->id = $user_data['id'];
      $this->data = $this->User->read();
    }
    //口座情報を書き込み
    else
    {
      $this->User->set($this->data);
      //バリデーション
      if(!$this->User->validates())
      {
        return ;
      }
      //保存      
      if($this->User->save($this->data['User']))
      {
        $this->flash('更新されました', '/posts/user/'.$user_data['id'].'');
        return;
      }
    } 
    //pr($this->data);
    $this->render('/users/edit');  
  }

  function login()
  {
    $this->set("login_error", false); //初期表示時はエラー無しとする    
    //これを入れないと/user/loginを見に行く
    $this->render("/users/login");
  }

  function login_cmp()
  {
    $conditions = array(
      'conditions' => array(
        'User.mail'     => $this->data['User']['mail'],
        'User.password' => $this->data['User']['password']
      )
    );
    $data = array(
        'mail'     => $this->data['User']['mail'],
        'password' => $this->data['User']['password']
      );
    //validateするために値をセットする
    $this->User->set($data);
    if(!$this->User->validates()) {
      //値がおかしかった場合はリダイレクト
      $this->render('/users/login');
      return ;
    }

    $data = $this->User->find('all', $conditions);
    //データがあるかをチェックする
    if(count($data) == 0)
    {
      $this->set('login_error', true);
      $this->render('/users/login');
      return;
    }
    //セッションにログイン情報を挿入する
    $this->Session->write('auth', $data[0]['User']);
    //pr($this->Session->read('auth'));
    //
    $this->flash('ログイン成功', '/posts/user/'.$data[0]['User']['id'].'');
  }

  function logout()
  {
    $this->Session->delete("auth");
    $this->flash("さようなら", "/");
  }

  function delete()
  {
    
  }

}
?>
