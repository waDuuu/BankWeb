<?php
    session_start();
    if(!isset($_SESSION['session_user'])){
        $_SESSION['session_user']="";
    }
    if(!isset($_SESSION['access'])){
        $_SESSION['access']="";
    }
    if(!isset($_SESSION['savbsb'])){
        $_SESSION['savbsb']="";
    }
        if(!isset($_SESSION['busbsb'])){
        $_SESSION['busbsb']="";
    }
    
    $session_user=$_SESSION['session_user'];
    $session_access=$_SESSION['access'];
    $session_savbsb=$_SESSION['savbsb'];
    $session_busbsb=$_SESSION['busbsb'];
?>