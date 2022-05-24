<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    $nagroda = new kontrolka;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['idusr']) && (isset($_POST['idnag']))){
           $response = $nagroda->dodajNagrodeZaModel($_POST['idusr'], $_POST['idnag']);
        }
    }
    else {
        $response = $nagroda->modeleNagrodzoneSpecjalnie();
    }
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>