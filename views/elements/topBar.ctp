<div class="topbar">
  <div class="topbar-inner">

    <div id="" class="container">
      <a href="/" class="brand">sparechange</a> 
      <ul class="nav">
        <?php
          echo '<li>';
          echo $html->link('Home', '/');
          echo '</li>';
        ?>
        <?php
          //echo($this->Session->read('auth'));
          //pr($user_info);
          //authがある場合
          if(isset($auth)) {
            echo '<li>';
            echo $html->link('Profile', '/posts/user/'.$auth['id'].'');
            echo '</li>';
              //コントローラ、アクション、セッションをチェック
              if($this->params['controller'] === 'posts'  && $this->params['action'] === 'user' && $this->params['pass'][0] == $user_info['User']['id'])
              {
                //echo "&nbsp;";
                echo '<li>';
                echo $html->link('Edit', '/users/edit/');
                echo '</li>';
              }
        
            echo '<li>';
            echo $html->link('Logout', '/users/logout/');
            echo '</li>';
          }
          //authなし
          else
          {
            echo '<li>';
            echo $html->link('Start', '/users/add/');
            echo '</li>';
            echo '<li>';
            echo $html->link('Login', '/users/login/');
            echo '</li>';
          }
        ?>
      </ul>
    </div>
  </div>
</div>
