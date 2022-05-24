<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    $wyniki = new festiwal;
    $widok = new kontrolka;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['idkat'])){
           $wyniki->zatwierdzMiejsca($_POST['idkat']);
           $response = $widok->wynikiLista($_POST['kategoria']);
        }
        else {
            $response = $widok->wynikiLista($_POST['kategoria']);
        }
    }    
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>