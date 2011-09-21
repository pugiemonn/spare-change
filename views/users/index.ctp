<ul>
  <li>
    <?php echo $html->link("ユーザー登録", "/users/add" );?>
  </li>
  <li>
    <?php echo $html->link("欲しい金額一覧", "/posts/");?>
  </li>
  <li>
    <?php echo $html->link("ログイン", "/users/login/");?>
  </li>
</ul>
<br />

<div class="">
<?php
foreach($users as $user)
{
?>
  <div class="userName">
    <?php
      echo $html->link("".h($user['User']['name'])."", "/posts/user/".$user['User']['id']."");
    ?>
  </div>
<?php
}
?>
</div>

