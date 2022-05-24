<?php
    error_reporting(0);
    session_start();
    require_once('../lib/drukowanie.php');
    $response = '';
    $Rodzaj = $_POST["rodzaj"];
    $baza = new drukowanie;
    $response = $baza->DrukowanieListy($Rodzaj);

    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>