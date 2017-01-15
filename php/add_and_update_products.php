<?php
//(1)Insert new to product_shipment
//(2)Update product_order
//(3)Update availability
session_start();
$query = "select MAX(shipment_id)
		  from shipment s
		  where s.warehouse_id = ".$_SESSION["warehouse_id"];

$shipment_id       = $_REQUEST["sh_id"];
$product_id        = $_REQUEST["p_id"];
$order_id          = $_REQUEST["o_id"];
$shipment_quantity = $_REQUEST["sh_q"];
$order_quantity    = $_REQUEST["or_q"];
$aval_quantity     = $_REQUEST["av_q"];

include("db_connect.php");
//(1)
$query = "INSERT INTO product_shipment 
		  VALUES ($shipment_id, $product_id, $shipment_quantity)";
$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");

//(2)
$query = "UPDATE product_order 
		  SET quantity = $order_quantity
		  WHERE product_id = $product_id
		  AND order_id = $order_id";
$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");

//(3)
$query = "UPDATE availability
		  SET quantity = $aval_quantity
		  WHERE product_id = $product_id
		  AND warehouse_id = ".$_SESSION["warehouse_id"];
$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
//row = pg_fetch_row($rs);
pg_close($connection);
?>