<?php
class User extends AppModel {
  var $name = "User";
  var $validate = array(
    'name'     => array('rule' => 'notEmpty'),
    'mail'     => array('rule' => 'email'),
    'password' => array('rule' => 'notEmpty')
  );
}

?>
