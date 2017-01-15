<?php
	$shipment_id = $_REQUEST["shipment"];
	$content = "<h2>SHIPMENT ".$shipment_id."</h2>
				<table class=\"small_table\">
     			   ";

	include("db_connect.php");
	$query = "select c.address_street, c.address_number, c.address_postal_code, c.address_city
            from shipment s, orders o, customer c
            where o.order_id = s.order_id
            and o.customer_id = c.customer_id
            and s.shipment_id = ".$shipment_id.";";
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
    	$content = $content."<tr>
          				<td>
                    <p>".$row[0]." ".$row[1]."</p>
                    <p>".$row[2]." ".$row[3]."</p>
                  </td>
                  <td>
                    <button name=".$shipment_id." onclick=deliver_shipment(this)>Delivered</button>
                  </td> 
        			</tr>";
     }
     echo $content."</table>";
?>