<?php
	function html_form($id, $name, $location, $quantity, $button_id)
	{
		return "<tr name=\"$id\">
          <td>$id</td>
          <td>$name</td>
          <td>$location</td>
          <td>$quantity</td>
          <td><input type=\"in_table\" placeholder=\"0\"></td>
          <td><button name=\"$button_id\" onclick=\"addDelivery(this.name)\">Add</button></td> 
        </tr>";
	}

	$content="<table class=\"big_table\">
        	  <tr>
          	     <th>ID</th>
          	     <th>Name</th>
          	     <th>Location</th>
          	     <th>In stock</th>
          	     <th>Delivered</th>
              </tr>";

	include("db_connect.php");

  $query = "select distinct a.product_id, p.name, a.location, a.quantity
          from product p, availability a, warehouse w, manager m
          where p.product_id = a.product_id
          and a.warehouse_id = m.warehouse_id
          and m.employee_id = ".$_SESSION["user_id"]."
          order by a.product_id";

	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");

    $i = 1;
    while ($row = pg_fetch_row($rs)) {
    		$content = $content.html_form($row[0],$row[1],$row[2],$row[3], $i);
        $i = $i + 1;
     }
     echo $content."</table>";
?>