<div id="topBar">
  <div class="staticLink">
    <a href="/">sparechange</a> 
  </div>
  <div class="activeLink">
    <?php echo $html->link('Home', '/'); ?>
    <?php
      //echo($this->Session->read('auth'));
      //pr($user_info);
      //authがある場合
      if(isset($auth)) {
        echo $html->link('Profile', '/posts/user/'.$auth['id'].'');
          //コントローラ、アクション、セッションをチェック
          if($this->params['controller'] === 'posts'  && $this->params['action'] === 'user' && $this->params['pass'][0] == $user_info['User']['id'])
          {
            echo "&nbsp;";
            echo $html->link('edit', '/users/edit/');
          }
        echo "&nbsp;";
        echo $html->link('Logout', '/users/logout/');
      }
      //authなし
      else
      {
        echo $html->link('start', '/users/add/');
        echo "&nbsp;";
        echo $html->link('Login', '/users/login/');
      }
    ?>
  </div>
<br />
</div>
