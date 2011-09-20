<?php
class User extends AppModel {
  var $name = "User";
  var $hasMany = array(
    'SparechangePost' => array(
      'className'  => 'SparechangePost',
      'foreignKey' => 'user_id',
      'limit'      => '20',
      //'foreignKey'    => 'user_id',
      //'conditions' => array('SparechangePost.id' => 'DESC'),
      //'order'      => 'SparechangePost.id DESC',
    ) 
  );
  var $validate = array(
    'name'     => array('rule' => 'notEmpty'),
    'mail'     => array('rule' => 'email'),
    'password' => array('rule' => 'notEmpty')
  );
}

?>
