<ul>
  <li>
    <?php echo $html->link("欲しい額を投稿する", "/posts/add");?>
  </li>
  <li>
    <?php echo $html->link("ユーザー一覧", "/users/" );?>
  </li>
</ul>

<table>
  <tr>
    <th>
      金額
    </th>
    <th>
      何に使うか
    </th>
    <th>
      投稿時間
    </th>
  </tr>
<?php
//pr($post_list);
foreach($post_list as $item)
{
?>
  <tr>
    <td>
      <?php echo h($item['SparechangePost']['cost']).'円'; ?>
    </td>
    <td>
      <?php echo h($item['SparechangePost']['comment']); ?>
    </td>
    <td>
      <?php echo h($item['SparechangePost']['created']); ?>
    </td>
  </tr>
<?php
}

?>
</table>

