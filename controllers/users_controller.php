<?php
class UsersController extends Appcontroller {
  var $name = "User";
  var $scaffold;

  function index()
  {
    $this->set('users', $this->User->find('all'));
    $this->render('/users/index');
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
        'User.mail'     => $this->params['form']['mail'],
        'User.password' => $this->params['form']['password']
      )
    );

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
    //exit("aaa");
    $this->flash('ログイン成功', '/posts');
  }

  function logout()
  {
    $this->Session->delete("auth");
    $this->flash("さようなら", "/users/login");
  }

  function delete()
  {
    
  }

}
?>
