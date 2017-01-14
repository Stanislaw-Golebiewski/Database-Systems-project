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
     <td style="padding: 15px"><form id="options">Options</form></td>
     <td style="padding: 15px"><form id="logout">Log out</form></td>
    </tr>
  </table>

  <div>
    <h1>Spock, welcome to</h1><br>    <!--TU POWINNO BYĆ IMIĘ ZIOMKA/-->
    <div id="logo_big">DuczBase</div>
  </div>

  <div id="main_box">

    <ul>
      <li><a href="manager_packers.php">Packers</a></li>
      <li><a href="manager_shipments.php">Shipments</a></li>
      <li><a class="active" href="manager_products.php">Products</a></li>
      <li><a href="manager_orders.php">Orders</a></li>
    </ul>

    <div id="left_box">
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
    </div>

  </div>

</body>
</html>