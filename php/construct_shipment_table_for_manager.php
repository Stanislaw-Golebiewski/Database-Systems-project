<?php
//BEGINNING OF THE FIRST BOX
	$content="<div id=\"fot_box\">
      <h2>Pending</h2>
      <table class=\"small_table\">
        <tr>
          <th>Shipment</th>
        </tr>";

	include("db_connect.php");
	$get_pending_query = "SELECT shipment_id FROM shipment
            WHERE warehouse_id = ".$_SESSION["warehouse_id"]."
            AND status = 'PENDING APPROVAL'
            ORDER BY shipment_id";
	$pending = pg_query($connection, $get_pending_query) or die("Cannot execute query: $get_pending_query\n");
  $pending_number = pg_num_rows($pending);

  if ($pending_number == 0)
  {
    $content = $content."<tr><td>-</td></tr></table></div>";
  }
  else
  {
    while ($row = pg_fetch_row($pending)) {
      $content = $content."<tr><td>$row[0]</td></tr>";
    }
    $content = $content."</table></div>";
  }
//END OF THE FIRST BOX

//BEGINNING OF THE SECOND BOX
  $content = $content."<div id=\"sot_box\">
      <h2>Completing</h2>
      <table class=\"small_table\">
        <tr>
          <th>Shipment</th>
          <th>Packer</th>
        <tr>";

  $get_completing_query = "select s.shipment_id, pl.packer_id
            from shipment s, packing_line pl
            where s.warehouse_id = ".$_SESSION["warehouse_id"]."
            and s.status = 'COMPLETING'
            and pl.shipment_id = s.shipment_id
            order by shipment_id";
  $completing = pg_query($connection, $get_completing_query) or die("Cannot execute query: $get_completing_query\n");
  $completing_number = pg_num_rows($completing);

  if ($completing_number == 0)
  {
    $content = $content."<tr><td>-</td><td>-</td></tr></table></div>";
  }
  else
  {
    while ($row = pg_fetch_row($completing)) {
      $content = $content."<tr><td>$row[0]</td><td>$row[1]</td></tr>";
    }
    $content = $content."</table></div>";
  }
//END OF THE SECOND BOX

//BEGINNING OF THE THIRD BOX
  $content = $content."<div id=\"tot_box\">
      <h2>Awaiting</h2>
      <table class=\"small_table\">
        <tr>
          <th>Shipment</th>
          <th>Driver</th>
        <tr>";

  $get_awaiting_query = "select shipment_id, driver_id
            from shipment
            where warehouse_id = ".$_SESSION["warehouse_id"]."
            and status = 'AWAITING'";

  $awaiting = pg_query($connection, $get_awaiting_query) or die("Cannot execute query: $get_awaiting_query\n");
  $awaiting_number = pg_num_rows($completing);

  if ($awaiting_number == 0)
  {
    $content = $content."<tr><td>-</td><td>-</td></tr></table></div>";
  }
  else
  {
    while ($row = pg_fetch_row($awaiting)) {
      $content = $content."<tr><td>$row[0]</td><td>$row[1]</td></tr>";
    }
    $content = $content."</table></div>";
  }

  echo $content;
?>