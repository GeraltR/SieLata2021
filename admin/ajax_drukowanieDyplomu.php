<?php
    error_reporting(0);
    session_start();
    require_once('../lib/drukowanie.php');
    $response = '';
    $IdMod = $_POST["dypidmod"];
    $Nagroda = $_POST["dypnagroda"];
    $Rodzaj = $_POST["dyprodzaj"];
    $baza = new drukowanie;
    $response = $baza->DrukowanieDyplomow($IdMod, $Nagroda, $Rodzaj);
    
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?> 