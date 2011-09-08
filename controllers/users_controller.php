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

  function delete()
  {
  }

}
?>
