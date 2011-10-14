<section class="posts-index">
  <div class="page-header">
    <h1>新着ユーザー
      <small>
        新しく登録したユーザーの一覧です。
      </small>
    </h1>
  </div>
  <ul>
    <li>
      <?php echo $html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
    </li>
  </ul>
  <br />
  <ul class="tabs">
    <li><a href="/">投稿一覧</a></li>
    <li class="active"><a href="/users/">新着ユーザー</a></li>
  </ul>
  <br class="clear" />
  <div class="">
    <?php
    foreach($users as $user)
    {
    ?>
    <div class="userBox">
      <div class="userImg">
        <img src="/img/prof.gif" alt="prof-img" width="72" height="72" />      
      </div>
      <div class="userName">
        <?php
          echo $html->link("".h($user['User']['name'])."", "/posts/user/".$user['User']['id']."");
        ?>
      </div>
    </div>
      <br class="clear" />
    <?php
    }
    ?>
  </div>
  <?php
  //echo $paginator->numbers();
  //pr($paginator);
  ?>
</section>
