<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    $wyniki = new festiwal;
    $widok = new kontrolka;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['kategoria'])){
            if ($_POST['oblicz']=='tak') {
               $wyniki->Zrob_Wyniki($_POST['kategoria']);
            }
            $response = $widok->wynikiLista($_POST['kategoria']);
        }
        else {
            $response = $widok->wynikiLista('');
        }
    }    
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>