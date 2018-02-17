<?php 
    session_start();
    if($_SESSION['sess_user'] === NULL){
        header("Location: ../scanner.php");
    }
?>