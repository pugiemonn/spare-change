<section class="users-edit">
  <div class="page-header">
    <h1>情報の編集
      <small>
        口座情報を登録すれば、運よくお金が振り込まれるかもしれません。
      </small>
    </h1>
  </div>
<?php
echo $form->create('User', array('action' => 'edit'));
echo $form->hidden('id');
echo $form->input('account', array(
    'label' => '銀行口座',
    'div'   => array(
      'class' => 'clearfix',
    ),
  )
);
echo $form->submit('更新', 
  array(
    'class' => 'btn primary',
    'div'   => array(
      'class' => 'clearfix actions'
    ),
  )
);
echo $form->end();
?>
</section>
