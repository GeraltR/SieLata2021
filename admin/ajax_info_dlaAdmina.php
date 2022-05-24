<?php
    error_reporting(0);
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    
    $baza = new kontrolka;
    $response = $baza->info_dlaAdmina();

    echo $response;
?>    