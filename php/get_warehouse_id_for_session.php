<?php
include("db_connect.php");
$query = "select w.warehouse_id
          from warehouse w, manager m 
          where w.warehouse_id = m.employee_id
          and m.employee_id = ".$_SESSION["user_id"];
$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
$row = pg_fetch_row($rs);
$_SESSION['warehouse_id'] = $row[0];
pg_close($connection);
?>