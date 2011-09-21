<?php
class Post extends AppModel
{
  var $name      = 'Post';
  var $hasOne = array(
    'User' => array(
      'className'  => 'User',
      'foreignKey' => 'id',
      //'conditions' => array('SparechangePost.id' => 'DESC'),
      //'limit'      => '20',
    )
  );
  var $validate  = array(
    'user_id' => 'notEmpty',
    'comment' => 'notEmpty',
    'cost'    => array('rule' => 'numeric', 'message' => '数字をいれて')
  );
}
?>
