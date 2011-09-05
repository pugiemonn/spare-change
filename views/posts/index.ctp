<?php
echo $html->link("投稿する", "/posts/add");

?>
<table>
  <tr>
    <th>
      金額
    </th>
    <th>
      何に使うか
    </th>
  </tr>
<?php
//pr($post_list);
foreach($post_list as $item)
{
?>
  <tr>
    <td>
      <?php echo $item['SparechangePost']['cost']."円"; ?>
    </td>
    <td>
      <?php echo $item['SparechangePost']['comment']; ?>
    </td>

  </tr>
<?php
}

?>
</table>

