<section class="">
  <div class="page-header">
    <h1>ログイン
      <small>
        
      </small>
    </h1>
  </div>
<?php

echo $form->create('User', array('type' => 'post', 'url' => '/users/login_cmp'));
echo $this->Html->div(''. $form->error('User.mail') || isset($login_error) && $login_error === true ? "clearfix error" : "clearfix" .'', null, array());
echo $form->input('mail', array(
    //divを非表示
    'div'   => false,
  )
);
echo "</div>";
echo $this->Html->div(''. $form->error('User.password') || isset($login_error) && $login_error === true ? "clearfix error" : "clearfix" .'', null, array());
echo $form->input('password', 
  array(
    'label' => 'パスワード',
    'div'   => false,
  )
);
if(isset($login_error) && $login_error === true )
{
    echo '<div class="error-message">メールアドレスとパスワードの組み合わせが間違っています。</div>';
}
echo "</div>";
//echo $form->error('password');
echo $form->submit('ログイン',
  array(
    'type'  => 'submit', 
    'class' => 'btn primary',
    'div'   => array(
      'class' => 'actions'
    ),
  )
);
echo $form->end();

?>
</section>
