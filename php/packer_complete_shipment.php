<?php
	$shipment_id = $_REQUEST["shipment"];
	include("db_connect.php");
	$err="";
	 $query = "UPDATE shipment
	 		   SET status='AWAITING'
			   WHERE shipment_id=".$shipment_id;

	$rs = pg_query($connection, $query) or die("Cannot execute query: $query2\n");
	echo($err);
?>