<?php
  $error = "";
  include("../php/login.php");
  if(isset($_SESSION['login_user'])) {
    header("location: ../php/profile.php");
  }
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>DuczBase</title>
  <link rel="stylesheet" type="text/css" href="style_main.css">
</head>
<body>
<div id="logo_box">
  <div id="logo_big">DuczBase</div>
  <div id="login_box">
    <form action="" method="post">
      <input type="text" name="username" placeholder="username"><br>
      <input type="password" name="password" placeholder="*********"><br>
      <input type="submit" name="submit" value=" LoginTej "><br>
      <div id="error"> <?php echo $error; ?> </div>
    </form>
  </div>
</div>
</body>
</html>