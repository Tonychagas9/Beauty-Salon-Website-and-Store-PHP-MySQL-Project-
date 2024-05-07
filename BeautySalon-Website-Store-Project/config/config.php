<?php
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if (!isset($_SESSION['lang']))
        $_SESSION['lang'] = "pt";
    else if (isset($_GET['lang']) && ($_SESSION['lang']) != $_GET['lang'] && !empty($_GET['lang'])) {
        if ($_GET['lang'] == "pt")
            $_SESSION['lang'] = "pt";
        else if ($_GET['lang'] == "fr")
            $_SESSION['lang'] = "fr";
    }

    require_once "lang/" . $_SESSION['lang'] . ".php";

    $conn = mysqli_connect('localhost','root','','altair') or die('connection failed');
?>