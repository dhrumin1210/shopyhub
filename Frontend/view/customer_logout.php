<?php

session_start();
unset($_SESSION["email"]);
unset($_SESSION["loggedin"]);
session_destroy();
// echo '<pre>'; print_r($_SESSION);exit;
header("Location:index.php");
?>