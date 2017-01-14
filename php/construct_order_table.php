<?php
  $order_id = $_REQUEST["order_id"];
  $content = "<h2>Order ".$order_id."</h2>
              <table class=\"small_table\">
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>In stock</th>
                <th>Add</th>
              </tr>";

  include("db_connect.php");

  $query = ;
  $rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
      $content = $content."<tr>
              <td>".$row[1]."</td>
              <td>".$row[2]."</td>
              <td>".$row[3]."</td>
              <td><input type=\"in_table\" name=\"".$row[0]."\" placeholder=\"".$row[4]."\"></td>
              </tr>"
     }
     echo $content."</table>
                    <table class=\"small_table\">
                      <tr>
                        <td><button id=\"button_bottom\">Create shipment</button></td>
                      </tr>
                    </table>";
?>


<!-- 
        <tr>
          <td>Banan</td>
          <td>3</td>
          <td>43</td>
          <td><input type="in_table" name="1" placeholder="ID"></td>
        </tr>
        <tr>
          <td>Czystek</td>
          <td>9</td>
          <td>132</td>
          <td><input type="in_table" name="2" placeholder="ID"></td>
        </tr>
        <tr>
          <td>Pumeks</td>
          <td>2</td>
          <td>122</td>
          <td><input type="in_table" name="3" placeholder="ID"></td>
        </tr>
      </table>
      <table class="small_table">
        <tr>
          <td><button id="button_bottom">Create shipment</button></td>
        </tr>
      </table> -->
