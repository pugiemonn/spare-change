<?php
class Post extends AppModel
{
  var $name = "Post";
  var $validate = array(
    'user_id' => 'notEmpty',
    'comment' => 'notEmpty',
    'cost'    => array('rule' => 'numeric', 'message' => '数字をいれて')
  );
}
?>
