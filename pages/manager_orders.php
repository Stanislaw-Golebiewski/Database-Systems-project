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
  <script src="../js/manager_order_scripts.js"></script> 
  <!--                      -->
  <script>
    window.onload = function() {
        var x = document.getElementById("left_box");
        if(x.childNodes.length == 1)
        {
          //what if there is no shipments?
        }
        else
        { 
           show_content(x.childNodes[1]);
        }
    };

  </script>
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
      <li><a href="manager_products.php">Products</a></li>
      <li><a class="active" href="manager_orders.php">Orders</a></li>
    </ul>

    <div id="left_box">
      <?php 
      include("../php/db_connect.php");
      $query = "select o.order_id as quantity from orders o, product_order po where po.order_id = o.order_id group by o.order_id having SUM(po.quantity) > 0";
      $rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
      while ($row = pg_fetch_row($rs)) {
        echo "<dev id=\"display_element\" name='".$row[0]."' onclick=\"show_content(this)\">Order ".$row[0]."</dev>";
      }
      pg_close($connection);
      ?>
    </div>

    <div id="right_box">
    <!-- -->
    </div>

  </div>

</body>
</html>