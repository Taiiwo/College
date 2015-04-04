<?php
if (isset($_POST['username']) && isset($_POST['password'])){
  if ($_POST['username'] == 'admin' && $_POST['password'] == 'changeme'){
    echo "<h3>Access Granted</h3>";
  }
  else {
    echo "<h3>Access Denied</h3>";
  }
}
else {
  ?>
  <form action="./3.php" method="POST">
    <input name="username" placeholder="username" type="text" />
    <input name="password" placeholder="password" type="password" />
    <input type="submit" value="Login" />
  </form>
  <?
}
?>
