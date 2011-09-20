<?php
//pr($auth_data);
echo $html->link('投稿一覧', '/posts');
echo $form->create('Post');
//echo $form->select('user_id', array('1' => 1), 1);
echo $form->hidden('user_id', array('value' => ''.$auth_data["id"].''));
echo $form->input('cost', array('label' => '金額(500円から100000円まで)'));
echo $form->error('SparechangePost.cost');
echo $form->input('comment', array('label' => 'お金の使い道'));
echo $form->error('SparechangePost.comment');
echo $form->submit();
echo $form->end();
?>
