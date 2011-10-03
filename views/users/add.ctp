<?php
echo $form->create('User');
echo $form->input('name');
echo '<div class="input text required">';
echo $form->input('mail', array(
  'type'  => 'text',
  //'label' => true,
  //divを非表示
  'div'   => false,
  )
);
//echo $form->error('User.mail');
if(isset($mailOverlap) && $mailOverlap === true)
{
  echo '<div class="error-message">メールアドレスが重複しています。</div>';
}
echo '</div>';
echo $form->input('password');
echo $form->end('登録');

?>
