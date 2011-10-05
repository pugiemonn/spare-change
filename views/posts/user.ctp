<ul>
  <li>
    <?php echo $html->link("欲しい額を投稿する", "/posts/add");?>
  </li>
<!--
  <li>
    <?php echo $html->link("投稿一覧", "/posts/" );?>
  </li>
  <li>
    <?php echo $html->link("ユーザー一覧", "/users/" );?>
  </li>
-->
</ul>
<br />

<div class="profileInfo">
  <div class="profileImg">
    <img src="/img/prof.gif" alt="prof-img" width="96" height="96" />
  </div>
  <div class="profileDetails">
    <div class="profileName">
      <?php //pr($user_info); ?>
      <?php //echo $html->link("".h($post_list[0]['User']['name'])."", "/posts/user/".$post_list[0]['SparechangePost']['user_id'].""); ?>
      <?php echo $html->link("".h($user_info['User']['name'])."", "/posts/user/".$user_info['User']['id'].""); ?>
    </div>
    <div class="profileAccount">
      <?php echo h($user_info['User']['account']); ?>
    </div>
  </div>
  <br class="clear" />
</div>
<table class="userData">
  <tr>
    <th>
      欲しがっている金額合計
    </th>
    <th>
      投稿数
    </th>
    <th>
      平均金額
    </th>
  </tr>
  <tr>
    <td>
      <?php e(h(number_format($user_data['amount']))); ?><span>円</span>
    </td>
    <td>
      <?php e(h(number_format($user_data['count']))); ?><span>件</span>
    </td>
    <td>
      <?php e(h(number_format($user_data['average']))); ?><span>円</span>
    </td>
  </tr>
</table>


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
?>


