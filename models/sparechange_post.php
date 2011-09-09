<?php
class SparechangePost extends AppModel
{
  var $name = "SparechangePost";
  var $validate = array(
    'user_id' => 'notEmpty',
    'comment' => 'notEmpty',
    'cost'    => array(
      //数値形式の判定
      'numeric' => array(
        'rule'     => 'numeric',
        'required' => true,
        'message'  => 'aaa',
      ),
      //500円から10万円まで
      'range' => array(
        'rule' => array('range', 499.5, 100000.1),
        'message' => 'nurupo'
      ),
    )
  );
}
?>
