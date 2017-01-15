<?php
	$shipment_id = $_REQUEST["id"];
	include("db_connect.php");

	 $query = "UPDATE shipment
	 		   SET status='ON THE WAY'
			   WHERE shipment_id=".$shipment_id;
  
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
	echo($pshipment_id);
?>