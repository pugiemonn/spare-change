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
<table>
  <tr>
    <th>
      name
    </th>
  </tr>
<?php
foreach($users as $user)
{
?>
  <tr>
    <td>
<?php
  echo h($user['User']['name']);
?>
    </td>
  </tr>
<?php
}
?>
</table>
