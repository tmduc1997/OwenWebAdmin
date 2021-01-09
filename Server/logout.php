<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["permission"]);
unset($_SESSION["avatar"]);
unset($_SESSION["admin_id"]);

header("Location: ../server/login.php");
?>