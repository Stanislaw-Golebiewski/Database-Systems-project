<?php
	$packer_id = $_REQUEST["id"];
	include("db_connect.php");
	$err="";
	$query1 = "DELETE FROM packer
			   WHERE employee_id=".$packer_id;

	$query2 = "UPDATE account
			   SET permission = 'NONE'
			   WHERE employee_id=".$packer_id;
  
	$rs = pg_query($connection, $query1) or die("Cannot execute query: $query1\n");
	$rs = pg_query($connection, $query2) or die("Cannot execute query: $query2\n");

	echo($err);
?>