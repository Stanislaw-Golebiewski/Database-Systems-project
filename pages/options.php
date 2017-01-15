<?php 
  session_start();
  if (!isset($_SESSION["user_id"]))
   {
      header("location: login_page.php");
   }
  $error_username = "";
  $error_password = "";
  include("../php/change_username.php");
  include("../php/change_password.php");
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>DuczBase</title>
  <link rel="stylesheet" type="text/css" href="style_main.css">
</head>
<body>

  <table id="logout_options_table">
    <tr>
     <td style="padding: 15px">
        <form>
         <button id="options" type="submit" formaction="../php/back_to_home.php">Back to Homepage</button>
       </form>
     </td>
     <td style="padding: 15px">
       <form>
         <button id="logout" type="submit" formaction="../php/logout.php">Logout</button>
       </form>
     </td>
    </tr>
  </table>

  <div>
    <h1><?php echo $_SESSION["user_login"]?>, welcome to</h1>
    <div id="logo_big">DuczBase</div>
  </div>

  <div id="options_box">

    <h3>Options</h3>

    <div id="half_box1">
    <table class="big_table">
      <tr>
        <th>Change username:</th>
      </tr>
      <tr>
        <td>
          <form action="" method="post">
            <input type="text" name="new_username" placeholder="New username"><br>
            <input type="submit" name="change_username" value="Change"><br>
            <div class="message2"> <?php echo $error_username; ?> </div>
          </form>
        </td>
      </tr>
    </table>
    </div>

    <div id="half_box2">
    <table class="big_table">
      <tr>
        <th>Change password:</th>
      </tr>
      <tr>
        <td>
          <form action="" method="post">
            <input type="password" name="old_password" placeholder="Old password"><br>
            <input type="password" name="new_password" placeholder="New password"><br>
            <input type="password" name="repeated_password" placeholder="Repeat password"><br>
            <input type="submit" name="change_password" value="Change"><br>
            <div class="message2"> <?php echo $error_password; ?> </div>
          </form>
        </td>
      </tr>
    </table>
    </div>

  </div>

</body>
</html>