<?php
if (isset($_POST['add_packer'])) {
  if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['login']) || empty($_POST['password'])) {
    $error = "There are empty fields!";
  }
  else
  {
    include("db_connect.php");
    $name = $_POST['name'];
    $name = stripslashes($name);
    $phone = $_POST['phone'];
    $phone = stripslashes($phone);
    $login = $_POST['login'];
    $login = stripslashes($login);
    $password = $_POST['password'];
    $password = stripslashes($password);
    // Form a query
    $check_login = "SELECT login FROM account
              WHERE login = '$login'";
    // Execute query
    $rs1 = pg_query($connection, $check_login) or die("Cannot execute query: $check_login\n");

    $rows1 = pg_num_rows($rs1);
    if ($rows1 == 0)
    {
      $get_id_query = "select max(employee_id) from employee";
      $get_id = pg_query($connection, $get_id_query) or die("Cannot execute query: $get_id_query\n");
      $max_id = pg_fetch_row($get_id);
      $id = $max_id[0] + 1;

      $add_employee_query = "INSERT INTO employee (employee_id, phone, name)
                    VALUES ($id, '$phone', '$name')";

      $add_account_query = "INSERT INTO account (employee_id, login, password, permission)
                            VALUES ($id, '$login', '$password', 'PACKER')";

      $add_packer_query = "INSERT INTO packer (employee_id, warehouse_id)
                            VALUES ($id, ".$_SESSION['warehouse_id'].")";

      $add_employee = pg_query($connection, $add_employee_query) or die("Cannot execute query: $add_employee_query\n");

      $add_account = pg_query($connection, $add_account_query) or die("Cannot execute query: $add_account_query\n");

      $add_packer = pg_query($connection, $add_packer_query) or die("Cannot execute query: $add_packer_query\n");

      header("location: ../pages/manager_packers.php");
    }
    else
    {
      $error_username = "Login taken!";
    }
    pg_close($connection);
}
}
?>
