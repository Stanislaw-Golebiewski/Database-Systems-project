<?php
	$shipment_id = $_REQUEST["shipment"];
	$content = "<h2>SHIPMENT ".$shipment_id."</h2>
				<table>
     			   	<tr>
          			<th>Product</th>
          			<th>Quantity</th>
          			<th>Location</th>
        			</tr>";

	include("db_connect.php");
	$query = "	select s.shipment_id, s.order_id, s.status 
                from shipment s, packer p, packing_line l, warehouse w
                where p.employee_id = l.packer_id
                and s.shipment_id = l.shipment_id
                and p.employee_id = 5 
                and p.warehouse_id = w.warehouse_id;";
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
    	$content = $content."<tr>
          				<td>".$row[0]."</td>
          				<td>".$row[1]."</td>
          				<td>".$row[2]."</td>
        			</tr>";
     }
     echo $content."</table>";
?>