<?php
	$shipment_id = $_REQUEST["shipment"];
	$content = "<h2>SHIPMENT ".$shipment_id."</h2>
				<table class=\"small_table\">
     			   	<tr>
          			<th>Product</th>
          			<th>Quantity</th>
          			<th>Location</th>
        			</tr>";

	include("db_connect.php");
	$query = "select p.name, ps.quantity, a.location
            from shipment s, product_shipment ps, product p,
            availability a, warehouse w
            where p.product_id = ps.product_id
            and ps.shipment_id = s.shipment_id
            and a.product_id = p.product_id
            and s.warehouse_id = w.warehouse_id
            and w.warehouse_id = a.warehouse_id
            and s.shipment_id = ".$shipment_id.";";
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
    	$content = $content."<tr>
          				<td>".$row[0]."</td>
          				<td>".$row[1]."</td>
          				<td>".$row[2]."</td>
        			</tr>";
     }
     echo $content."</table>
     <table class=\"small_table\">
        <tr>
          <td>
            <button class=\"button_bottom\" onclick=\"completeShipment(".$shipment_id.")\">Completed</button>
          </td>
        </tr>
      </table>";
?>