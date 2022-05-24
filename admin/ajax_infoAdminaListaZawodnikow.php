<?php
    error_reporting(0);
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    $CzySenior=$_POST["czyseniorzy"];
    $CzyModzicy = $_POST["czymodzicy"];
    $CzyKarton = $_POST["czykarton"];
    $CzyPlastik = $_POST["czyplastik"];
    $JakiOrder = $_POST["jakiorder"];
    $baza = new kontrolka;
    $response = $baza->infoAdminaListaZawodnikow($CzySenior, $CzyModzicy, $CzyKarton, $CzyPlastik, $JakiOrder);

    header( 'Content-Type: application/json' );
    echo json_encode($response);
?> 