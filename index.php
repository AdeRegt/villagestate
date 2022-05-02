<?php 
    session_start();
    header("location: " . (isset($_SESSION["login"])?"/gameplay.php":"/loginpage.html"), true);
?>