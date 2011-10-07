<section class="posts-user">
  <div class="page-header">
    <h1>投稿
      <small>
        欲しい金額と使い道を投稿します。
      </small>
    </h1>
  </div>
<?php
echo $form->create('Post');
//echo $form->select('user_id', array('1' => 1), 1);
echo $form->hidden('user_id', array('value' => ''.$auth_data["id"].''));
echo $this->Html->div(''. $form->error('SparechangePost.cost') ? "clearfix error" : "clearfix" .'', null, array());
echo $form->input('cost', 
  array(
    'label' => '金額(500~10万円)',
    'div'   => false,
  )
);
echo $form->error('SparechangePost.cost',
  array(
  //  'div' => array(
  //    'class' => 'error',
  //  )
  )
);
echo '</div>';
echo $this->Html->div(''. $form->error('SparechangePost.comment') ? "clearfix error" : "clearfix" .'', null, array());
echo $form->input('comment', 
  array(
    'label' => 'お金の使い道',
    'class' => 'span10',
    'div'   => false,
  )
);
echo $form->error('SparechangePost.comment');
echo '</div>';
echo $this->Html->tag('div', null,
  array(
    'class' => 'actions', 
  )
);
echo $form->submit('投稿',
  array(
    'class' => 'btn primary',
    'div'   => false,
  )
);
echo '&nbsp;';
echo $form->button('キャンセル',
  array(
    'type'  => 'reset',
    'class' => 'btn',
    'div'   => false,
  )
);
echo "</div>";
echo $form->end();
?>
</section>
