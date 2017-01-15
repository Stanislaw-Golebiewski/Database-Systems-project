<?php 
session_start();
  if (!isset($_SESSION["user_id"]))
   {
      header("location: login_page.php");
   }
   else if($_SESSION["user_role"] != "DRIVER")
   {
      header("location: login_page.php");
   }
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>DuczBase</title>
  <link rel="stylesheet" type="text/css" href="style_main.css">
  <script src="../js/driver_awaiting_scripts.js"></script> 
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
      <li><a href="driver_shipments.php">Your shipments</a></li>
      <li><a class="active" href="driver_awaiting.php">Awaiting</a></li>
    </ul>

    <div id="left_box">
      <?php 
      include("../php/db_connect.php");
      $query = "select distinct s.warehouse_id
                from shipment s, driver d
                where d.employee_id = s.driver_id
                and d.employee_id =".$_SESSION["user_id"]." 
                and s.status = 'AWAITING';";
      $rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
      while ($row = pg_fetch_row($rs)) {
        echo "<dev id=\"display_element\" name='".$row[0]."' onclick=\"show_awaiting(this.attributes['name'].value)\">Warehouse ".$row[0]."</dev>";
      }
      pg_close($connection);
      ?>
    </div>

    <div id="right_box">
      <!--<h2>WAREHOUSE 1</h2>
      <table class="small_table">
        <tr>
          <td>Shipment 1</td>
          <td><button>Collected</button></td>
        </tr>
        <tr>
          <td>Shipment 2</td>
          <td><button>Collected</button></td>
        </tr>

      </table>/-->
    </div>

  </div>

</body>
</html>