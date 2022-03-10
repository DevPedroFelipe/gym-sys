<?php 

session_start();

if(!isset ($_SESSION['login']) and !isset ($_SESSION['senha'])) {
    
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

?>