<?php
    error_reporting(0);
    session_start();
    require_once('../lib/drukowanie.php');
    $response = '';
    $CzySenior=$_POST["czyseniorzy"];
    $CzyMlodzicy = $_POST["czymlodzicy"];
    $CzyKarton = $_POST["czykarton"];
    $CzyPlastik = $_POST["czyplastik"];
    $JakiOrder = $_POST["jakiorder"];
    $IdMod = $_POST["idmod"];
    $OdNumeru = $_POST["odnumeru"];
    $baza = new drukowanie;
    $response = $baza->DrukowanieKart($CzySenior, $CzyMlodzicy, $CzyKarton, $CzyPlastik, $JakiOrder,$IdMod,$OdNumeru);

    header( 'Content-Type: application/json' );
    echo json_encode($response);
?> 