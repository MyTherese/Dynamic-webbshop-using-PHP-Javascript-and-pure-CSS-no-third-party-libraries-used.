<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["success"]);
header("Location:index.php");
?>