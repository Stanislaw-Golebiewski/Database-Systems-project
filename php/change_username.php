<?php
if (isset($_POST['change_username'])) {
  if (empty($_POST['new_username'])) {
    $error_username = "Empty field!";
  }
  else
  {
    include("db_connect.php");
    $old_username = $_SESSION['user_login'];
    $new_username = $_POST['new_username'];
    $new_username = stripslashes($new_username);
    // Form a query
    $check_username = "SELECT login FROM account
              WHERE login = '$new_username'";
    // Execute query
    $rs1 = pg_query($connection, $check_username) or die("Cannot execute query: $query\n");

    // Check if there are any tuples returned (if yes, user and password are correct)
    $rows1 = pg_num_rows($rs1);
    if ($rows1 == 0)
    {
      $update_username = "UPDATE account
                          SET login = '$new_username'
                          WHERE login = '$old_username'";
      $rs2 = pg_query($connection, $update_username) or die("Cannot execute query: $query\n");

      include("logout.php"); // Redirecting To Other Page
    }
    else
    {
      $error_username = "Username taken!";
    }
    pg_close($connection);
}
}
?>
