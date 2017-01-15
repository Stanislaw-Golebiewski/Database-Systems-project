<?php
session_start();

$product_id     = $_REQUEST["p_id"];
$new_quantity   = $_REQUEST["new_q"];

include("db_connect.php");

$query = "UPDATE availability
			SET quantity = $new_quantity
			WHERE product_id = $product_id
			AND warehouse_id = ".$_SESSION["warehouse_id"];

$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");


pg_close($connection);
?>