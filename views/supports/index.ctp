<section id="supports-index">
  <div class="page-header">
    <h1>サイトについて
      <small>
        どんなサイトか
      </small>
    </h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="/">ホーム</a> <span class="divider">></span></li>
    <li class="active">サイトについて</li>
  </ul>
<!--
  <ul class="tabs">
    <li class="active"><a href="/">投稿一覧</a></li>
    <li class="active"><a href="/users/">新着ユーザー</a></li>
  </ul>
-->
  <br class="clear" />
  <div class="">
    <ul class="media-grid">
      <li>
        <a href="#">
          <?php
            echo $this->Html->image('http://net-vacation.com/wp-content/uploads/2011/10/Comic20111018_001.jpg', 
              array(
                'class'  => 'thumbnail',
                'alt'    => '怪しげなサイト紹介', //915 732
                'width'  => '549',
                'height' => '439',
              )
            );
          ?>
        </a>
      </li>
    </ul>
    <h3>ステップは３つ</h3>
    <ol>
      <li>１. 銀行口座を登録
      <li>２. 欲しい額を投稿
      <li>３. 振込を待つ
    </ol>
    <p>以降２と３を繰り返してください。
    <h3>このサイトをつくっている人</h3>
    <?php echo $this->Html->link('@pugieonn', 'http://twitter.com/#!/pugiemonn') ?>がつくってます。
  </div>
<?php
?>
</section>
