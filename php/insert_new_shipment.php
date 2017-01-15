<?php
session_start();
include("db_connect.php");
$query = "select max(s.shipment_id)
		  from shipment s";
$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
$row = pg_fetch_row($rs);

$shipment_id = $row[0] + 1;
$order_id = $_REQUEST["order"];
$query= "INSERT INTO shipment(shipment_id, warehouse_id, order_id, status)
		 VALUES (".$shipment_id.", ".$_SESSION['warehouse_id'].",".$order_id.",'PENDING APPROVAL');";
$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
echo $shipment_id;
pg_close($connection);
?>