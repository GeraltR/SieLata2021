<?php
    error_reporting(0);
    session_start();
    require_once('lib/baza.php');
    $response = array(array());
    $kod = htmlspecialchars(addslashes(strip_tags(trim($_GET['kod']))), ENT_QUOTES);
    $baza = new festiwal;
    $baza->Aktywuj_Haslo($kod);
    header('Location: http://www.sielata.com.pl');   
?>