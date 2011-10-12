<?php
class UsersController extends Appcontroller {
  var $name = "Users";
  //var $scaffold;
  var $paginate = array(
    'User' => array(
      'fields' => array('User.id', 'User.created'),
      'limit' => 10,
      'order' => array(
        'User.id' => 'desc'
      )
    )
  );

  protected $_types = array(
    'add'  => array('add', array()),
    'name' => array('name', array()), 
    'mail' => array('mail', array()), 
  );

  //var $components = array('Auth');

  function index()
  {
    //$this->set('users', $this->paginate());
    $options = array(
      //'conditons' =>
      'fields' => array(
        'User.id',
        'User.name',
      ),
      'limit'  => '10',
    );
    $this->set('users', $this->User->find('all', $options));
    $this->data = $this->paginate('User');
    //pr($this->User->find('all'));
    $this->render('/users/index');
  }

  function add() {
    if(!empty($this->data)) {
      //モデルにdataをセット
      $this->User->set($this->data);
      //入力チェック
      if(!$this->User->validates())
      {
        //入力に不備が合った場合の処理
        $this->render('/users/add');
        return;
      }
      //アクションを判定する
      $options = $this->_types[$this->params['action']];

      //名前が登録されているかをチェックする 
      $count = $this->User->find('name', array());
      if($count >= 1)
      {
        //名前が重複している
        $this->set('nameOverlap', true); 
        $this->render('/users/add');
        return ;
      }

      //メールアドレスが登録されているかをチェックする
      $count = $this->User->find('mail', array());
      if($count >= 1)
      {
        //メールアドレスが重複している
        $this->set('mailOverlap', true); 
        $this->render('/users/add');
        return ;
      }

      //パスワードのハッシュ化
      $this->data['User']['password'] = SALT.$this->data['User']['password'];
      $this->data['User']['password'] = Security::hash($this->data['User']['password']);
      //ユーザーデータの書き込み
      if($this->User->save($this->data, array('validate' => false)))
      {
        //登録されたデータを取得
        $user_data  = $this->User->find('first', $options[1]);
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
