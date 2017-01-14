<?php
session_start();
if($_SESSION["user_role"] == "PACKER"){
	header("location: ../pages/packer_shipments.php");
}
if($_SESSION["user_role"] == "MANAGER"){
	header("location: ../pages/manager_packers.php");
}
?>
<!DOCTYPE HTML>
<html>
<body>

<h1><?php echo "ID: ".$_SESSION["user_id"]."<br>Redirect to: ".$_SESSION["user_role"]?></h1>

</body>
</html>
