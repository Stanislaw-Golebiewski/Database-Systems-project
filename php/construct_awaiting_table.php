<?php
  session_start();
	$warehouse_id = $_REQUEST["warehouse"];
	$content = "<h2>WAREHOUSE ".$warehouse_id."</h2>
				<table class=\"small_table\">
     			   ";

	include("db_connect.php");
	$query = "select distinct s.shipment_id
            from shipment s, warehouse w, driver d
            where s.status = 'AWAITING'
            and s.driver_id = d.employee_id
            and s.warehouse_id = ".$warehouse_id."
            and s.driver_id = ".$_SESSION["user_id"].";";
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
    	$content = $content."<tr>
          				<td>Shipment ".$row[0]."</td>
                  <td>
                    <button name=".$row[0]." onclick=collect_shipment(this)>Collected</button>
                  </td>
        			</tr>";
     }
     echo $content."</table>";
     pg_close($connection);
?>