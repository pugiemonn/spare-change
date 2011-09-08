<?php
echo $html->link('投稿一覧', '/posts');
echo $form->create('Post');
//echo $form->select('user_id', array('1' => 1), 1);
echo $form->hidden('user_id', array('value' => 1));
echo $form->input('comment');
echo $form->input('cost');
echo $form->error('cost', 'URLが正しくありません');
echo $form->submit();
echo $form->end();
?>
