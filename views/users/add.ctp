<section id="users-add">
  <div class="page-header">
    <h1>ユーザー登録
      <small>
        登録をして何がおきても責任はとれません。
      </small>
    </h1>
  </div>
<?php
echo $form->create('User');
echo $form->input('name',
  array(
    'class' => 'xlarge'
  )
);
echo '<div class="input text required">';
echo $form->input('mail', array(
  'type'  => 'text',
  //'label' => true,
  'class' => 'xlarge',
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
echo $form->input('password',
  array(
    'class' => 'xlarge',
  )
);
echo $form->end(
  array(
    'type' => 'submit',
    'class' => 'btn primary',
  )
);

?>
</section>
