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
      //モデル名が違うから指定しないといけない?
      if($this->SparechangePost->save($this->data['Post']))
      { 
        $this->flash("投稿しました", "/posts");
      }
    }  
  }

}
?>
