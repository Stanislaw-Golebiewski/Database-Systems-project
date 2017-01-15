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
  <link rel="stylesheet" type="text/css" href="style_main.css">
  <script src="../js/manager_products_scripts.js"></script> 
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
      <li><a href="manager_shipments.php">Shipments</a></li>
      <li><a class="active" href="manager_products.php">Products</a></li>
      <li><a href="manager_orders.php">Orders</a></li>
    </ul>

    <div id="full_box">
    	<?php include("../php/construct_product_table_for_manager.php") ?>
    </div> 

    <!--<div id="left_box">
      <dev id="display_element" name='1' onclick="show_content(this)">< 10</dev>
      <dev id="display_element" name='2' onclick="show_content(this)">< 100</dev>
      <dev id="display_element" name='3' onclick="show_content(this)">100   +</dev>
    </div>

    <div id="right_box">
      <h2>< 10</h2>
      <table class="small_table">
        <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th>Location</th>
        </tr>
        <tr>
          <td>Banan</td>
          <td>3</td>
          <td>DJD310</td>
        </tr>
        <tr>
          <td>Czystek</td>
          <td>9</td>
          <td>KOJ132</td>
        </tr>
        <tr>
          <td>Pumeks</td>
          <td>2</td>
          <td>JIM241</td>
        </tr>
      </table>
    </div>/-->

  </div>

</body>
</html>