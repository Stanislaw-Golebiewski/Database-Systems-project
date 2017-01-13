<?php
session_start(); // Starting Session
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "There are empty fields";
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
    // Define $username and $password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = stripslashes($username);
    $password = stripslashes($password);
    // Form a query
    $query = "SELECT login, employee_id, permission FROM account
              WHERE login = '$username'
              AND password = '$password'";
    // Execute query
    $rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");

    // Check if there are any tuples returned (if yes, user and password are correct)
    $rows = pg_num_rows($rs);
    if ($rows == 1)
    {
      $row = pg_fetch_row($rs);
      $_SESSION['user_id'] = $row[1]; // Initializing Session
      $_SESSION['user_role'] = $row[2];
      header("location: ../php/profile.php"); // Redirecting To Other Page
    }
    else
    {
      $error = "Username or Password is invalid";
    }
    pg_close($connection);
}
}
?>
