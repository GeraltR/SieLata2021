<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['nazwisko'])){
           $szukaj = new kontrolka;
           $response = $szukaj->szukajZawodnika($_POST['nazwisko']);
        }
        
    }
    //header( 'Content-Type: application/json' );
    //echo json_encode($response);
    echo $response;
?>