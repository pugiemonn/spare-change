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

//        pr($this->data);
//        pr($this->User->find('all', $this->data));
//        exit();  
      //ユーザーデータの書き込み
      if($this->User->save($this->data))
      {
        //セッションへ書き込み
        
        //ユーザーのページへリダイレクト
        $this->flash('ユーザー登録が完了しました。', '/posts/user/');
      }
    }
  }

  function edit($id=null)
  {
    $this->data = $this->User->read();
    pr($this->data);
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
