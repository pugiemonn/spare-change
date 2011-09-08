<?php
class UsersController extends Appcontroller {
  var $name = "User";
  var $scaffold;

  function index()
  {
    $this->set('users', $this->User->find('all'));
    $this->render('/users/index');
  }
}
?>
