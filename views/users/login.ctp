<?php
echo $form->create('User', array('type' => 'post', 'url' => '/users/login_cmp'));
echo $form->input('mail', array());
//echo $form->error('User.mail');
echo $form->input('password', array('label' => 'パスワード'));
//echo $form->error('password');
echo $form->end('ログイン');

?>

<!--
<form action="/users/login_cmp" method="POST">
メールアドレス
<input type="text" name="mail" />
<br />
パスワード
<input type="password" name="password" />
<br />
<?php
if($login_error == true)
{
  echo "メールアドレスまたはパスワードが違います";
}
?>
<input type="submit" value="ログイン" />
</form>
-->
