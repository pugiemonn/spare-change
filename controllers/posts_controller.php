<?php
class PostsController extends AppController {

  var $uses = array("SparechangePost");
  var $sacaffold;

  function index() {
    $conditions = array(
      'order' => 'SparechangePost.id DESC',
      'limit' => '20'
    );    
    $post_list = $this->SparechangePost->find('all', $conditions);
    $this->set("post_list", $post_list);
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
          'user_id' => 1,
          'comment' => ''.$this->params['data']['Post']['comment'].'',
          'cost'    => ''.$this->params['data']['Post']['cost'].'',
        );
       
        //pr($data);
        $this->SparechangePost->set($data);
        if(!$this->SparechangePost->validates())
        {
          //validateでエラーがある場合
          $this->set("cost", $this->params['data']['Post']['cost']);
          //pr($this->SparechangePost);
          echo "入力エラーがあります";
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

}
?>
