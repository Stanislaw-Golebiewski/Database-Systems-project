<?php
  $message = "";
  include("../php/customer.php");
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
      <input type="text" name="shipment_id" placeholder="Enter the ID of your shipment"><br>
      <input type="submit" name="submit" value="Check status"><br>
      <div id="message"> <?php echo $message; ?> </div>     <!--DO TEGO TRZEBA DOPISAĆ FUNKCJĘ PHP! Jeśli takie id nie istnieje, wypisuje error; jeśli isnieje, wypisuje status./-->
    </form>
  </div>
</div>
</body>
</html>