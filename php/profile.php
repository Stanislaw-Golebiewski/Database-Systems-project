<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>

<h1><?php echo "ID: ".$_SESSION["user_id"]."<br>Redirect to: ".$_SESSION["user_role"]?></h1>

</body>
</html>
