<section class="posts-index">
  <div class="page-header">
    <h1>投稿一覧
      <small>
        お金を欲しがっている投稿の一覧です。
      </small>
    </h1>
  </div>
<?php
//pr($example);
?>
<ul>
  <li>
    <?php echo $html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
  </li>
<!--
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
-->
</ul>
<br />
<?php
foreach($post_list as $post) {
?>
<div class="posts">
  <div class="postBox">
    <div class="postCost">
      <p><?php echo h(number_format($post['SparechangePost']['cost'])); ?><span>円</span></p>
      <p class="kaomoji">( ﾟдﾟ)ﾎｽｨ…</p>
    </div>
    <div class="postText">
      <ul>
        <li>
          <?php echo $html->link("".h($post['User']['name'])."", "/posts/user/".$post['SparechangePost']['user_id'].""); ?>
        </li>
      </ul>
      <p><?php echo h($post['SparechangePost']['comment']); ?></p>
      <ul>
        <!--
        <li>
          <a href="#">コメントする</a>
        </li>
        -->
        <li>
          <?php echo $html->link("".h($post['SparechangePost']['created'])."", "/posts/view/".$post['SparechangePost']['id'].""); ?>
        </li>
      </ul>
    </div>
  </div>
  <br class="clear" />
</div>
<?php
}
unset($post_list);
unset($post);
?>
<?php
//echo $paginator->numbers(true);
//  echo $this->paginator->counter();
?>

