<?php

session_start();

if(isset($_GET['logoutBtn'])){
    session_destroy();
    unset($_SESSION);
    header("Location:login.php");   
}
?>