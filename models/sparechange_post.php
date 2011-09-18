<?php
class SparechangePost extends AppModel
{
  var $name = "SparechangePost";
  var $validate = array(
    'user_id' => 'notEmpty',
    'comment' => array(
      'isEmpty' => array(
        'rule'    => 'notEmpty',
        'message' => 'コメントを入力してください',
      ),
      'between' => array(
        'rule'    => array('between', 1, 140),
        'message' => '1文字以上140文字以下のコメントを入力してください',
      )
    ),
    'cost'    => array(
      //数値形式の判定
      'numeric' => array(
        'rule'     => 'numeric',
        'required' => true,
        'message'  => '数字をいれてください',
      ),
      //500円から10万円まで
      'range' => array(
        'rule' => array('range', 499.5, 100000.1),
        'message' => '500以上100000以下の自然数を半角で入力してください'
      ),
    )
  );
}
?>
