<?php
class SparechangePost extends AppModel
{
  var $name = "SparechangePost";
  var $validate = array(
    'user_id' => 'notEmpty',
    'cost'    => 'numeric'
  );
}
?>
