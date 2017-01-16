<?php 
session_start();
  if (!isset($_SESSION["user_id"]))
   {
      header("location: login_page.php");
   }
   else if($_SESSION["user_role"] != "MANAGER")
   {
      header("location: login_page.php");
   }
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>DuczBase</title>

  <!-- Link CSS and JS here -->
  <link rel="stylesheet" type="text/css" href="style_main.css">
  <script src="../js/manager_drivers_scripts.js"></script> 
  <!--                      -->
</head>
<body>

  <table id="logout_options_table">
    <tr>
     <td style="padding: 15px">
        <button id="options" type="submit" onclick="window.location.href='options.php'">Options</button>
     </td>
     <td style="padding: 15px">
       <form>
         <button id="logout" type="submit" formaction="../php/logout.php">Logout</button>
       </form>
     </td>
    </tr>
  </table>

  <div>
    <h1><?php echo $_SESSION["user_login"]?>, welcome to</h1>
    <div id="logo_big">DuczBase</div>
  </div>

  <div id="main_box">
    <ul>
      <li><a href="manager_packers.php">Packers</a></li>
      <li><a class="active" href="manager_drivers.php">Drivers</a></li>
      <li><a href="manager_shipments.php">Shipments</a></li>
      <li><a href="manager_products.php">Products</a></li>
      <li><a href="manager_orders.php">Orders</a></li>
    </ul>

    <div id="full_box">
    <?php include("../php/construct_drivers_table.php") ?>
    </div>
    <table class="big_table">
      <tr>
        <td><button class="button_outside" onclick="window.location.href='manager_add_new_driver.php'">Add new driver</button></td>
      </tr>
    </table>
  </div>
</body>
</html>