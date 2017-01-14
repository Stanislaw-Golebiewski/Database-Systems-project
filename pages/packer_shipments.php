<?php 
session_start();
  if (!isset($_SESSION["user_id"]))
   {
      header("location: login_page.php");
   }
   else if($_SESSION["user_role"] != "PACKER")
   {
      header("location: login_page.php");
   }
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>DuczBase</title>
  <link rel="stylesheet" type="text/css" href="style_main.css">
  <script>
    function show_content(shipment)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("right_box").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../php/construct_product_table.php?shipment=" + shipment, true);
        xmlhttp.send();
    }
  </script>
</head>
<body>

  <table id="logout_options_table">
    <tr>
     <td style="padding: 15px">
        <button id="options" type="submit" onclick="window.location.href='options.php'">Options</button>
     </td>    <!--TO POWINNO ODSYŁAĆ DO OPCJI!/-->
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
      <li><a class="active" href="packer_shipments.php">Your shipments</a></li>
      <li><a href="packer_all_shipments.php">Get new shipment</a></li>
    </ul>
    <div id="left_box">
      <?php 
      include("../php/db_connect.php");
      $query = "select s.shipment_id
                from shipment s, packer p, packing_line l, warehouse w
                where p.employee_id = l.packer_id
                and s.shipment_id = l.shipment_id
                and p.employee_id =".$_SESSION["user_id"]." 
                and p.warehouse_id = w.warehouse_id;";
      $rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
      while ($row = pg_fetch_row($rs)) {
        echo "<dev id=\"display_element\" name='".$row[0]."' onclick=\"show_content(this.attributes['name'].value)\">Shipment ".$row[0]."</dev>";
      }
      pg_close($connection);
      ?>
    </div>
    <div id="right_box"><!-- content loaded here--></div>
  </div>
</body>
</html>