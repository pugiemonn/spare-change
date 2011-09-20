<ul>
  <li>
    <?php echo $html->link("欲しい額を投稿する", "/posts/add");?>
  </li>
  <?php if($this->Session->read("auth")){
    $auth_data = $this->Session->read("auth");
  ?>
  <li>
    <?php echo $html->link("自分の投稿", "/posts/user/".$auth_data['id']."" );?>
  </li>
  <?php } ?>
  <li>
    <?php echo $html->link("ユーザー一覧", "/users/" );?>
  </li>
</ul>
<br />
<div class="posts">
  <div class="postBox">
    <div class="postCost">
      <p>1,000<span>円</span></p>
    </div>
    <div class="postText">
      <ul>
        <li>
          <a href="#">pugiemonn</a>
        </li>
      </ul>
      <p>ぷぎですがポケモン買いたいです</p>
      <ul>
        <!--
        <li>
          <a href="#">コメントする</a>
        </li>
        -->
        <li>
          <a href="#">2011-09-19 16:12:47</a>
        </li>
      </ul>
    </div>
  </div>
  <br class="clear" />
</div>
<?php
foreach($post_list as $post) {
?>
<div class="posts">
  <div class="postBox">
    <div class="postCost">
      <p><?php echo h(number_format($post['SparechangePost']['cost'])); ?><span>円</span></p>
    </div>
    <div class="postText">
      <ul>
        <li>
          <a href="#">pugiemonn</a>
        </li>
      </ul>
      <p>ぷぎですがポケモン買いたいです</p>
      <ul>
        <!--
        <li>
          <a href="#">コメントする</a>
        </li>
        -->
        <li>
          <a href="#">2011-09-19 16:12:47</a>
        </li>
      </ul>
    </div>
  </div>
  <br class="clear" />
</div>
<?php
}
?>

