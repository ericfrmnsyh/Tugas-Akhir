<?php
    session_start();
    if(!isset($_SESSION['isAdmin']))
    {
        header("Location: http://localhost/Tugas Akhir/index.php");
        exit();
    }
?>