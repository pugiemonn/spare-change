<div id="topBar">
  <div class="staticLink">
    <a href="/">sparechange</a> 
  </div>
  <div class="activeLink">
    <?php echo $html->link('Home', '/'); ?>
    <?php
      //authがある場合
      if(isset($auth)) {
        echo $html->link('Profile', '/posts/user/'.$auth['id'].'');
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
