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
  <script src="../js/packer_shipments_scripts.js"></script> 
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
      <li><a href="packer_shipments.php">Your shipments</a></li>
      <li><a class="active" href="packer_all_shipments.php">Get new shipment</a></li>
    </ul>

    <div id="full_box">
      <table class="big_table">
        <tr>
          <th>Shipment ID</th>
          <th>Show content</th>
          <th>Add to your shipments</th>
        </tr>
        <?php
          include("../php/db_connect.php");
          $query = "select s.shipment_id
                    from shipment s,  warehouse w, packer p
                    where s.warehouse_id = w.warehouse_id
                    and p.warehouse_id =  w.warehouse_id
                    and p.employee_id = ".$_SESSION["user_id"]."
                    and s.status = 'PENDING APPROVAL'";
          $rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
          while ($row = pg_fetch_row($rs)) {
            echo "<tr><td>".$row[0]."</td><td>
            <button id=\"button".$row[0]."\" class=\"show_button\">Show</button>
            <div id=\"modal".$row[0]."\" class=\"modal\">
              <div class=\"modal-content\">
                <span class=\"close\">&times;</span>
                <h2>Shipment ".$row[0]."</h2>";
            //////////////////////////////////////////
            $query = "select ps.quantity, p.name, a.location
                      from shipment s, product_shipment ps, product p, availability a, warehouse w, packer pac
                      where s.shipment_id = ps.shipment_id
                      and ps.product_id = p.product_id
                      and a.product_id = p.product_id
                      and a.warehouse_id = w.warehouse_id
                      and pac.warehouse_id = w.warehouse_id
                      and s.shipment_id = ".$row[0]."
                      and pac.employee_id =".$_SESSION["user_id"];

            $response = pg_query($connection, $query) or die("Cannot execute query: $query\n");
            while ($row_2 = pg_fetch_row($response)) {
               echo "<p>".$row_2[0]." x ".$row_2[1]." ".$row_2[2]."</p>";
            }
            /////////////////////////////////////////
            echo "</div></div></td><td><button name=\"".$row[0]."\"onclick=\"addShipment(this.name)\">Add</button></td></tr>";
          }
         pg_close($connection);
        ?>

      </table>

      <script>
        var modals = document.getElementsByClassName("modal");
        console.log(modals);
        var buttons = document.getElementsByClassName("show_button");
        console.log(buttons);
        var span = [];

        for (i = 0; i < modals.length; i++)
        {
          console.log(modals[i]);
          console.log(buttons[i]);
          span[i] = modals[i].childNodes[1].childNodes[1]
          buttons[i].onclick = (function() {
            var currentI = i;
            return function() { 
              modals[currentI].style.display = "block";
            }
          })();
          console.log(buttons[i].onclick);

          span[i].onclick = (function() {
            var currentI = i;
            return function() { 
              modals[currentI].style.display = "none";
            }
          })();
        }
    </script>
    </div>
  </div>

</body>
</html>