<?php
echo $html->link('投稿一覧', '/posts');
echo $form->create('Post');
//echo $form->select('user_id', array('1' => 1), 1);
echo $form->hidden('user_id', array('value' => 1));
echo $form->input('comment', array('label' => 'お金の使い道'));
echo $form->input('cost', array('label' => '金額(500円から100000円まで)'));
echo $form->error('cost', 'URLが正しくありません');
echo $form->submit();
echo $form->end();
?>
