<?php
   session_start();
   echo 'Hello sup ' . $_SESSION["username"];
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');
?>