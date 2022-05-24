<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['szukaj'])){
           $szukaj = new kontrolka;
           $response = $szukaj->szukajZawodnikafull($_POST['szukaj']);
        }
        
    }
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>