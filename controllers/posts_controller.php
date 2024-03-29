<?php
class PostsController extends AppController {

  var $uses = array("SparechangePost", "User");
  var $sacaffold;
/*
  var $paginate = array(
    'limit' => 20,
    //'order' => array('SparechangePost.id' => 'asc'),
     'fields'     => array('`SparechangePost`.`id`', '`SparechangePost`.`cost`', '`SparechangePost`.`comment`', '`SparechangePost`.`user_id`', '`SparechangePost`.`created`', '`User`.`name`'),
     'joins'      => array(
       array(
         'type'       => 'LEFT',
         'table'      => '`users`',
         'alias'      => 'User',
         'conditions' => '`User`.`id`=`SparechangePost`.`user_id`',
       )
     )
  );
*/

  var $paginate = array(
    
    'limit' => 20,
    //'order' => array('SparechangePost.id' => 'asc'),
  );

  protected $_types = array(
    'index' => array('index', array('limit' => '20')),//index
    'user'  => array('user', array('limit' => '20')), 
    'view'  => array('view', array('limit' => '1')),
  );

/*
  $user_data = array(
      'amount'  => 0, 
      'count'   => 0,
      'average' => 0,
  );
*/
  var $components = array('Security');

  function beforeFilter() {
    //CSRF対策
    parent::beforeFilter();
    $this->Security->requireAuth('add');
  }


  function index() {
    //pr($this->paginate());
    //pr($this->paginate);
    //アクション名を取得
    $options  = $this->_types[$this->params['action']];
    //$post_list = $this->SparechangePost->find($options[0], $options[1]);
    $post_list = $this->SparechangePost->find($options[0], $options[1]);
    //$this->paginate = $conditions;
    //$this->set('data', $this->paginate());
    //$post_list = $this->paginate();
    $this->set('title_for_layout', SpareChangeTitle);
    $this->set(compact('post_list'));
  }

  function add() {
    //セッションチェック
    $this->checkSession();
    $auth_data = $this->Session->read("auth");
    //pr($auth_data);
    //echo $auth_data['id'];
    $this->set('auth_data', $auth_data);
    $this->set('title_for_layout', '欲しい額を投稿 | '.SpareChangeTitle);
    //書き込み
    if(!empty($this->data))
    {
      if($this->params['data']['Post']['user_id'] == $auth_data['id'])
      {
        $data = array(
          'user_id' => ''.$this->params['data']['Post']['user_id'].'',
          'comment' => ''.$this->params['data']['Post']['comment'].'',
          'cost'    => ''.$this->params['data']['Post']['cost'].'',
        );
       
//        pr($data);
        $this->SparechangePost->set($data);
        //pr($this->SparechangePost);
        //exit();
        if(!$this->SparechangePost->validates())
        {
          //validateでエラーがある場合
          $this->set("cost", $this->params['data']['Post']['cost']);
          //echo "入力エラーがあります";
          return;
        }
        //モデル名が違うから指定しないといけない?
        if($this->SparechangePost->save($data, false))
        {   
          $this->flash("投稿しました", "/posts");
        }
      }
    }  
  }

  function delete()
  {
  }

  function user($id=null)
  {
    $user_data = array();
    //$post_list = $this->SparechangePost->find('all', $conditions);
    $options   = array(
      'conditions' => array(
        'SparechangePost.user_id' => ''.$id.''
      )
    );
    //カウント数を取得
    $count     = $this->SparechangePost->find('count', $options);
    //すでに投稿がある場合
    if($count>0) {
      $amount    = $this->SparechangePost->findUserTotalAmount($id);
      //ユーザーの数値情報を作る
      $user_data['amount']  = $amount[0][0]['cost']; 
      $user_data['count']   = $count;
      $user_data['average'] = ceil($amount[0][0]['cost'] / $count); 
    }
    //投稿がまだ無い場合、または、ユーザー登録した瞬間など
    else
    {
      $user_data['amount']  = 0; 
      $user_data['count']   = 0;
      $user_data['average'] = 0; 
    }
    $options  = $this->_types[$this->params['action']];
    //投稿のidを渡す
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`user_id`' => $id)));
    $user_info = $this->User->find('first', array('conditions' => array('`User`.`id`' => $id)));
    $post_list = $this->SparechangePost->find($options[0], $options[1]);
    $this->set('auth', $this->Session->read('auth'));
    $this->set('title_for_layout', $user_info['User']['name'].'の情報 | '.SpareChangeTitle);
    $this->set(compact('user_info'));
    $this->set(compact('user_data'));
    $this->set(compact('post_list'));
  }

  function view($id=null)
  {
    $options  = $this->_types[$this->params['action']];
    //投稿のidを渡す
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`id`' => $id)));
    $post_list = $this->SparechangePost->find($options[0], $options[1]);
    $this->set('title_for_layout', number_format($post_list[0]['SparechangePost']['cost']).'円( ﾟдﾟ)ﾎｽｨ… | '.SpareChangeTitle);
    $this->set(compact('post_list'));
  }  

}
?>
