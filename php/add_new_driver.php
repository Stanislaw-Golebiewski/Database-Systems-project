<?php
if (isset($_POST['add_driver'])) {
  if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['car'])|| empty($_POST['login']) || empty($_POST['password'])) {
    $error = "There are empty fields!";
  }
  else
  {
    include("db_connect.php");
    $name = $_POST['name'];
    $name = stripslashes($name);
    $phone = $_POST['phone'];
    $phone = stripslashes($phone);
    $car = $_POST['car'];
    $car = stripslashes($car);
    $login = $_POST['login'];
    $login = stripslashes($login);
    $password = $_POST['password'];
    $password = stripslashes($password);
    // Form a query
    $check_login_query = "SELECT login FROM account
              WHERE login = '$login'";
    // Execute query
    $check_login = pg_query($connection, $check_login_query) or die("Cannot execute query: $check_login\n");

    $check_car_query = "SELECT car_id FROM driver
                      WHERE car_id = '$car'";
    // Execute query
    $check_car = pg_query($connection, $check_car_query) or die("Cannot execute query: $check_login\n");

    $check_login_value = pg_num_rows($check_login);
    $check_car_value = pg_num_rows($check_car);

    if ($check_login_value == 0)
    {

      if($check_car_value == 0)
      {


      $get_id_query = "select max(employee_id) from employee";
      $get_id = pg_query($connection, $get_id_query) or die("Cannot execute query: $get_id_query\n");
      $max_id = pg_fetch_row($get_id);
      $id = $max_id[0] + 1;

      $add_employee_query = "INSERT INTO employee (employee_id, phone, name)
                    VALUES ($id, '$phone', '$name')";

      $add_account_query = "INSERT INTO account (employee_id, login, password, permission)
                            VALUES ($id, '$login', '$password', 'DRIVER')";

      $add_driver_query = "INSERT INTO driver (employee_id, car_id)
                            VALUES ($id, $car)";

      $add_employee = pg_query($connection, $add_employee_query) or die("Cannot execute query: $add_employee_query\n");

      $add_account = pg_query($connection, $add_account_query) or die("Cannot execute query: $add_account_query\n");

      $add_driver = pg_query($connection, $add_driver_query) or die("Cannot execute query: $add_driver_query\n");

      header("location: ../pages/manager_drivers.php");

      }
      else
      {
        $error = "Car ID taken!";
      }
    }
    else
    {
      $error = "Login taken!";
    }
    pg_close($connection);
}
}
?>
