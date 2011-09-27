<div id="topBar">
  <div class="staticLink">
    <a href="/">sparechange</a> 
  </div>
  <div class="activeLink">
    <?php echo $html->link('Home', '/'); ?>
    <?php
      if(isset($auth)) {
        echo $html->link('Profile', '/posts/user/'.$auth['id'].'');
        echo "&nbsp;";
        echo $html->link('Logout', '/users/logout/');
      }
      else
      {
        echo $html->link('Login', '/users/login/');
      }
    ?>
  </div>
<br />
</div>
