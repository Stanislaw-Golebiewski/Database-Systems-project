<?php 
session_start();
  if (!isset($_SESSION["user_id"]))
   {
      header("location: login_page.php");
   }
   else if($_SESSION["user_role"] != "MANAGER")
   {
      header("location: login_page.php");
   }
  $error = "";
  include("../php/add_new_packer.php");
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

    <h3>Add new packer</h3>

    <div id="full_box">
    <table class="big_table">
      <tr>
        <td>
          <form action="" method="post">
            <input type="text" name="name" placeholder="Name"><br>
            <input type="text" name="phone" placeholder="Phone number"><br>
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="add_packer" value="Add"><br>
            <div class="message2"> <?php echo $error; ?> </div>
          </form>
        </td>
      </tr>
    </table>
    </div>

  </div>

</body>
</html>