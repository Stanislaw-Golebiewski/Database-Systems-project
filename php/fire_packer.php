<?php
	$packer_id = $_REQUEST["id"];
	include("db_connect.php");

	 $query = "DELETE FROM packer
			   WHERE employee_id=".$packer_id;
  
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
	echo($packer_id);
?>