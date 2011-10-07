<section class="">
  <div class="page-header">
    <h1>ログイン
      <small>
        
      </small>
    </h1>
  </div>
<?php
echo $form->create('User', array('type' => 'post', 'url' => '/users/login_cmp'));
echo $form->input('mail', array(
    'div' => array(
      'class' => 'clearfix',
    ),
  )
);
echo $form->input('password', 
  array(
    'label' => 'パスワード',
    'div'   => array(
      'class' => 'clearfix',
    )
  )
);
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
