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
    'class' => 'xlarge',
    'div'   => array(
      'class' => 'clearfix',
    )
  )
);
//User.mailと$mailOverlapのときにerrorとして表示する
echo $this->Html->div(''. $form->error('User.mail') || isset($mailOverlap) ? "clearfix error" : "clearfix" .'', null, array());
echo $form->input('mail', array(
  'type'  => 'text',
  //'label' => true,
  'class' => 'xlarge',
  //divを非表示
  'div'   => false,
  )
);
if(isset($mailOverlap) && $mailOverlap === true)
{
  echo '<div class="error-message">メールアドレスが重複しています。</div>';
}
echo '</div>';
echo $form->input('password',
  array(
    'class' => 'xlarge',
    'div'   => array(
      'class' => 'clearfix'
    )
  )
);
echo $form->end(
  array(
    'type'  => 'submit',
    'class' => 'btn primary',
    'div'   =>
      array(
        'class' => 'actions',
      )
  )
);

?>
</section>
