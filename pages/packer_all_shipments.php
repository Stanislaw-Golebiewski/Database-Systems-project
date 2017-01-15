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
  <script>    //TĘ FUNKCJĘ TRZEBA ZMIENIĆ!!!
    function show_content(field)
    {
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
          echo "<tr>
                  <td>".$row[0]."</td>
                  <td>
                    <button name=\"m".$row[0]."\" class=\"show_button\" onclick=\"function() { getElementsByClassName(modal).getElementById(this.name).style.display = &quot;block&quot;;}\">Show</button>
                    <div id=\"m".$row[0]."\" class=\"modal\">
                    <div class=\"modal-content\">
                    <span class=\"close\">&times;</span>
                      <h2>Shipment 9</h2>
                        <p>10 x Ziemniak (JOS21) </p>
                     </div>
                    </div>
                    </td>
                    <td><button>Add</button></td>    
                </tr>";
          }
         pg_close($connection);
        ?>
        <!-- <tr>
          <td>9</td>
          <td>
            <button name="m0" class="show_button" onclick="function() { getElementsByClassName(modal).getElementById(this.name).style.display = &quot;block&quot;;}">Show</button>
            <div id="m0" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <!-- <h2>Shipment 9</h2>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p> 
              </div>
            </div>
          </td>
          <td><button>Add</button></td>    
        </tr>
        <tr>
          <td>1</td>
          <td>
            <button id="button1" class="show_button">Show</button>
            <div id="modal1" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Shipment 1</h2>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p>
              </div>
            </div>
          </td>
          <td><button>Add</button></td>
        </tr>
        <tr>
          <td>3</td>
          <td>
            <button id="button3" class="show_button">Show</button>
            <div id="modal3" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Shipment 3</h2>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p>
              </div>
            </div>
          </td>
          <td><button>Add</button></td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <button id="button2" class="show_button">Show</button>
            <div id="modal2" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Shipment 2</h2>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
              </div>
            </div>
          </td>
          <td><button>Add</button></td>
        </tr>
        <tr>
          <td>6</td>
          <td>
            <button id="button6" class="show_button">Show</button>
            <div id="modal6" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Shipment 6</h2>
                <p>10 x Ziemniak (JOS21</p>
                <p>12 x Fasolka (JCZ10)</p>
                <p>9x Drapaczka (MOJ34)</p>
                <p>100 x Żelatyna w sprayu (COZ91)</p>
                <p>10 x Ziemniak (JOS21</p>
              </div>
            </div>
          </td>
          <td><button>Add</button></td>
        </tr> -->
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