<section class="posts-user">
  <div class="page-header">
    <h1><?php echo h($user_info['User']['name']); ?>
      <small>
        の情報です。
      </small>
    </h1>
  </div>
<div class="profileInfo">
  <div class="profileImg">
    <img src="/img/prof.gif" alt="prof-img" width="96" height="96" />
  </div>
  <div class="profileDetails">
    <div class="profileAccount">
      <h3>口座情報
        <small>
         
          <?php
            if($this->params['controller'] === 'posts'  && $this->params['action'] === 'user' && $this->params['pass'][0] == $auth['id'])
            { 
              echo $html->link('編集>>', '/users/edit/');
            }
          ?>
        </small>
      </h3>
      <p><?php echo h($user_info['User']['account']); ?>
    </div>
  </div>
  <br class="clear" />
</div>
<div class="row show-grid" title="Default three column layout">
  <div class="span7">
    <h3>欲しがっている金額合計</h3> 
    <span class="user-info-num"><?php echo h(number_format($user_data['amount'])); ?></span><span class="user-info-chara">円</span> 
  </div>
  <div class="span4">
    <h3>投稿数</h3>
    <span class="user-info-num"><?php echo h(number_format($user_data['count'])); ?></span><span class="user-info-chara">件</span>
  </div>
  <div class="span5">
    <h3>平均金額 </h3>
    <span class="user-info-num"><?php echo h(number_format($user_data['average'])); ?></span><span class="user-info-chara">円</span>
  </div>
</div>
<div class="btnArea">
    <?php echo $html->link("欲しい額を投稿する", "/posts/add",array('class' => 'btn primary'));?>
</div>
<?php
foreach($post_list as $post) {
?>
<div class="posts">
  <div class="postBox">
    <div class="postCost">
      <p><?php echo h(number_format($post['SparechangePost']['cost'])); ?><span>円</span></p>
      <p class="kaomoji">( ﾟдﾟ)ﾎｽｨ…</p>
    </div>
    <div class="postText">
      <ul>
        <li>
          <?php echo $html->link("".h($post['User']['name'])."", "/posts/user/".$post['SparechangePost']['user_id'].""); ?>
        </li>
      </ul>
      <p><?php echo h($post['SparechangePost']['comment']); ?></p>
      <ul>
        <!--
        <li>
          <a href="#">コメントする</a>
        </li>
        -->
        <li>
          <?php echo $html->link("".h($post['SparechangePost']['created'])."", "/posts/view/".$post['SparechangePost']['id'].""); ?>
        </li>
      </ul>
    </div>
  </div>
  <br class="clear" />
</div>
<?php
}
?>
</section>

