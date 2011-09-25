<?php
class SparechangePost extends AppModel
{
  var $name = "SparechangePost";
/*
  var $belongsTo  = array(
    'User' => array(
      'className'  => 'User',
      //'joinTable'  => 'users', 
      'foreignKey' => 'id',
      //'fields'     => array('id', 'name'),
    )
  );*/
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

  //トップを表示するときに呼ばれる
  function findTop($user=1) {
    $options = array(
      //'conditions' => array('`User`.`id`' => $id),
      'order'      => 'SparechangePost.id DESC',
      'fields'     => array('`SparechangePost`.`id`', '`SparechangePost`.`cost`', '`SparechangePost`.`comment`', '`SparechangePost`.`user_id`', '`SparechangePost`.`created`', '`User`.`name`'),
      'joins'      => array(
        array(
          'type'       => 'LEFT',
          'table'      => '`users`',
          'alias'      => 'User',
          'conditions' => '`User`.`id`=`SparechangePost`.`user_id`',
        )
      ),
      'limit'      => '20',
    );
   // pr($options);
    return $this->find('all', $options);
  }

  function findView($id=1)
  {
    $options = array(
      'conditions' => array('`SparechangePost`.`id`' => $id),
      //'order'      => 'SparechangePost.id DESC',
      'fields'     => array('`SparechangePost`.`id`', '`SparechangePost`.`cost`', '`SparechangePost`.`comment`', '`SparechangePost`.`user_id`', '`SparechangePost`.`created`', '`User`.`name`'),
      'joins'      => array(
        array(
          'type'       => 'LEFT',
          'table'      => '`users`',
          'alias'      => 'User',
          'conditions' => '`User`.`id`=`SparechangePost`.`user_id`',
        )
      ),
      //'limit'      => '20',
    );
    return $this->find('all', $options);
  }

  function findUserPost($id=1)
  {
    $options = array(
      'conditions' => array('`SparechangePost`.`user_id`' => $id),
      //'order'      => 'SparechangePost.id DESC',
      'fields'     => array('`SparechangePost`.`id`', '`SparechangePost`.`cost`', '`SparechangePost`.`comment`', '`SparechangePost`.`user_id`', '`SparechangePost`.`created`', '`User`.`name`'),
      'joins'      => array(
        array(
          'type'       => 'LEFT',
          'table'      => '`users`',
          'alias'      => 'User',
          'conditions' => '`User`.`id`=`SparechangePost`.`user_id`',
        )
      ),
      //'limit'      => '20',
    );
    return $this->find('all', $options);
  }

  function findUserTotalAmount($id=1)
  {
    $options = array(
      'conditions' => array('`SparechangePost`.`user_id`' => $id),
      'fields'     => array(
        '`SparechangePost`.`user_id`',
        'SUM(`SparechangePost`.`cost`) AS `cost`',
      ),
      'group' => array('`SparechangePost`.`user_id`'),
    );
    return $this->find('all', $options);
  }

  function findUserPostCount($id=1)
  {
  }
}

?>
