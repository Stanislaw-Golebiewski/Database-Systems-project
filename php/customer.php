<?php
if (isset($_POST['submit'])) {
  if (empty($_POST['shipment_id'])) {
    $message = "Enter the shipment ID!";
  }
  else
  {
    //****************
    $host = "localhost";
    $user = "postgres";
    $pass = "lubiekoty";
    $db   = "shop";
    //****************
    //Connect to postgres database
    $connection = pg_connect("host=$host dbname=$db user=$user password=$pass")
                  or die ("Could not connect to server\n");
    // Define $orderID
    $shipment_id = $_POST['shipment_id'];
    $shipment_id = stripslashes($shipment_id);
    // Form a query
    if (is_numeric($shipment_id))
    {
      $query = "SELECT status FROM shipment
              WHERE shipment_id = '$shipment_id'";
      // Execute query
      $rs = pg_query($connection, $query) or die ("Cannot execute query: $query\n");

      // Check if there are any tuples returned (if yes, user and password are correct)
      $rows = pg_num_rows($rs);
      if ($rows == 1)
      {
        $row = pg_fetch_row($rs);
        $message = "Your shipment status:<br>".$row[0];
      }
      else
      {
        $message = "Wrong shipment ID!";
      }
    }
    else
    {
      $message = "Wrong shipment ID!";
    }


    
    pg_close($connection);
}
}
?>
