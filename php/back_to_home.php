<?php
   session_start();
   if (!isset($_SESSION["user_id"]))
   {
      header("location: ../pages/login_page.php");
   }

   if($_SESSION["user_role"] == "PACKER") {
      header("location: ../pages/packer_shipments.php");
   }
   if($_SESSION["user_role"] == "MANAGER"){
      include("get_warehouse_id_for_session.php");
      header("location: ../pages/manager_packers.php");
   }
   if($_SESSION["user_role"] == "DRIVER") {
      header("location: ../pages/driver_shipments.php");
   }
?>