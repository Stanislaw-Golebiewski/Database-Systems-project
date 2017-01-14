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
  <script>    //TĘ FUNKCJĘ TRZEBA ZMIENIĆ!!!
    function show_content(field)
    {
      var table_code = "<table><tr><th>product</th><th>location</th></tr>"
      var right_box_handler = document.getElementById("right_box");//znajdujemy prawegi diva po jego id, w tym wypadku "right box"
      right_box_handler.innerHTML = table_code+"<tr><td>"+String(field.attributes['name'].value)+"<td><td>"+String(field.attributes['name'].value)+"</td></tr></table>";
    }
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
      <li><a class="active" href="manager_shipments.php">Shipments</a></li>
      <li><a href="manager_products.php">Products</a></li>
      <li><a href="manager_orders.php">Orders</a></li>
    </ul>

    <div id="fot_box">
      <h2>Pending</h2>
      <table class="small_table">
        <tr>
          <th>Shipment</th>
        </tr>
        <tr>
          <td>1</td>
        </tr>
        <tr>
          <td>34</td>
        </tr>
      </table>
    </div>

    <div id="sot_box">
      <h2>Completing</h2>
      <table class="small_table">
        <tr>
          <th>Shipment</th>
          <th>Packer</th>
        <tr>
          <td>1</td>
          <td>3</td>
        </tr>
        <tr>
          <td>32</td>
          <td>6</td>
        </tr>
      </table>
    </div>

    <div id="tot_box">
      <h2>Awaiting</h2>
      <table class="small_table">
        <tr>
          <th>Shipment</th>
          <th>Driver</th>
        <tr>
          <td>1</td>
          <td>3</td>
        </tr>
        <tr>
          <td>32</td>
          <td>6</td>
        </tr>
        <tr>
          <td>1</td>
          <td>3</td>
        </tr>
        <tr>
          <td>32</td>
          <td>6</td>
        </tr>
      </table>
    </div>

  </div>

</body>
</html>