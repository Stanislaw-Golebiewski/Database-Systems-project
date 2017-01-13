<?php
$error = "";
include("../php/login.php");
if(isset($_SESSION['login_user'])){
header("location: ../php/profile.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login_page.css">
<style>
  /*
    #login{
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      vertical-align: middle;
      border: 2px solid black;
    }
    body{
      background-color: #afb5bf;
    }
    #error{
      color: red;
      text-align: center;
    }


    input[type=submit]{
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover{
      background-color: #45a049;
    }

    input[type=text], input[type=password]{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    */
  </style>
</head>
<body>

<div id="login">
<form action="" method="post">
<input type="text" name="username" placeholder="username"><br>
<input type="password" name="password" placeholder="*********"><br>
<input type="submit" name="submit" value=" LoginTej "><br>
<div id="error"> <span> <?php echo $error; ?> </sapn> </div>
</form>
</div>
</body>
</html>
