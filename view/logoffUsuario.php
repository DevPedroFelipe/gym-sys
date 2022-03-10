<?php

session_start();

unset($_SESSION['login']);
unset($_SESSION['senha']);
session_unset();
session_destroy();
header("location:../index.php");

?>