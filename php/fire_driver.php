<?php
	$driver_id = $_REQUEST["id"];
	include("db_connect.php");

	 $query = "DELETE FROM driver
			   WHERE employee_id=".$driver_id;
  
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
	echo($driver_id);
?>