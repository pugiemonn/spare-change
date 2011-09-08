<?php
class PostsController extends AppController {

  var $uses = array("SparechangePost");
  var $sacaffold;

  function index() {
    
    $post_list = $this->SparechangePost->find('all');
    //pr($post_list);
    $this->set("post_list", $post_list);
  }

  function add() {

    if(!empty($this->data))
    {
      $data = array(
        'user_id' => 1,
        'comment' => ''.$this->params['data']['Post']['comment'].'',
        'cost'    => ''.$this->params['data']['Post']['cost'].'',
      );
       
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

  function delete()
  {
  }

}
?>
