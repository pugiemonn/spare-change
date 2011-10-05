<?php
echo $form->create('User', array('action' => 'edit'));
echo $form->hidden('id');
echo $form->input('account', array(
    'label' => '銀行口座'
  )
);
//echo $form->submit();
echo $form->end('save Posts');

?>
