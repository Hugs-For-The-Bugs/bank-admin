<?php
session_start();
 include("config.php");
 ini_set("display_errors","on");

    
$ID = $_SESSION['login_user'];
   if(session_destroy()) { echo "<script>window.location.replace('login.php');</script>"; }
?>