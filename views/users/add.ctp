<section id="users-add">
  <div class="page-header">
    <h1>新規登録
      <small>
        ユーザー登録を行います。
      </small>
    </h1>
  </div>
<?php
echo $form->create('User');
echo $this->Html->div(''. $form->error('User.name') || isset($nameOverlap) ? "clearfix error" : "clearfix" .'', null, array());
echo $form->input('name',
  array(
    'class' => 'xlarge',
    //divを非表示
    'div'   => false,
  )
);
if(isset($nameOverlap) && $nameOverlap === true)
{
  echo '<div class="error-message">名前が重複しています。</div>';
}
echo '</div>';
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
