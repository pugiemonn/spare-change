<ul>
  <li>
    <?php echo $html->link("欲しい額を投稿する", "/posts/add");?>
  </li>
  <li>
    <?php echo $html->link("投稿一覧", "/posts/" );?>
  </li>
  <li>
    <?php echo $html->link("ユーザー一覧", "/users/" );?>
  </li>
</ul>

<br />
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
?>


