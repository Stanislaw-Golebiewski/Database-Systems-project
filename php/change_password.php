<?php
if (isset($_POST['change_password'])) {
  if (empty($_POST['old_password']) || empty($_POST['new_password']) || empty($_POST['repeated_password'])) {
    $error_password = "Empty fields!";
  }
  else
  {
    include("db_connect.php");
    $username = $_SESSION['user_login'];
    $old_password = $_POST['old_password'];
    $old_password = stripslashes($old_password);
    $new_password = $_POST['new_password'];
    $new_password = stripslashes($new_password);
    $repeated_password = $_POST['repeated_password'];
    $repeated_password = stripslashes($repeated_password);
    // Form a query

    if ($new_password != $repeated_password)
    {
      $error_password = "Passwords not equal!";
    }
    else
    {
      $check_password = "SELECT password FROM account
              WHERE login = '$username'";
      // Execute query
      $cp = pg_query($connection, $check_password) or die("Cannot execute query: $query\n");

      $actual_password = pg_fetch_row($cp);
      if ($actual_password[0] == $old_password)
      {
        $update_password = "UPDATE account
                          SET password = '$new_password'
                          WHERE login = '$username'";
        $change = pg_query($connection, $update_password) or die("Cannot execute query: $query\n");

        include("logout.php");
      }
      else
      {
        $error_password = "Wrong password!";
      }
    }
    
    pg_close($connection);
}
}
?>
