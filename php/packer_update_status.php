<?php
	session_start();
	$shipment_id = $_REQUEST["shipment"];
	include("db_connect.php");

	 $query1 = "UPDATE shipment
	 		   SET status='COMPLETING'
			   WHERE shipment_id=".$shipment_id;

	 $query2 = "INSERT INTO packing_line
	 		   VALUES (".$_SESSION["user_id"].", $shipment_id)";

  
	$rs = pg_query($connection, $query1) or die("Cannot execute query: $query1\n");
	$rs = pg_query($connection, $query2) or die("Cannot execute query: $query2\n");

	echo($shipment_id);
?>