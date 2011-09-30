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
    'name'     => array(
      'rule'    => 'notEmpty',
      'message' => 'aaa',
    ),
    
    'mail'     => array(
      'isMail' => array(
        'rule'    => 'email',
        'message' => 'メールアドレスを入力してください。'
      )
    ),

    'password' => array(
      'rule'    => 'notEmpty',
      'message' => 'パスワードを入力してください'
    ),
    //'account'  => array(),
  );
}

?>
