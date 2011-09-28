<?php
class PostsController extends AppController {

  var $uses = array("SparechangePost");
  var $sacaffold;
  var $paginate = array(
    'limit' => 20,
    'order' => array(
      'SparechangePost.id' => 'DESC'
    ) 
  );

  protected $_types = array(
    'index' => array('index', array('limit' => '20')),//index
    'user'  => array('user', array('limit' => '20')), 
    'view'  => array('view', array('limit' => '1')),
  );

  function index() {
    //アクション名を取得
    $options  = $this->_types[$this->params['action']];
    $post_list = $this->SparechangePost->find($options[0], $options[1]);
    //$this->paginate = $conditions;
    $this->set('post_list', $this->paginate('SparechangePost'));
    $this->set(compact("post_list"));
  }

  function add() {
    //セッションチェック
    $this->checkSession();
    $auth_data = $this->Session->read("auth");
    //pr($auth_data);
    //echo $auth_data['id'];
    $this->set('auth_data', $auth_data);
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
    $amount    = $this->SparechangePost->findUserTotalAmount($id);
    //ユーザーの数値情報を作る
    $user_data['amount']  = $amount[0][0]['cost']; 
    $user_data['count']   = $count;
    $user_data['average'] = ceil($amount[0][0]['cost'] / $count); 
    $options  = $this->_types[$this->params['action']];
    //投稿のidを渡す
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`user_id`' => $id)));
    $post_list = $this->SparechangePost->find($options[0], $options[1]);
    $this->set(compact('user_data'));
    $this->set('post_list', $post_list);
  }

  function view($id=null)
  {
    $options  = $this->_types[$this->params['action']];
    //投稿のidを渡す
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`id`' => $id)));
    $post_list = $this->SparechangePost->find($options[0], $options[1]);
    $this->set(compact('post_list'));
  }  

}
?>
