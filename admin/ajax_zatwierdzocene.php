<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = array();
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['idkat']) && isset($_POST['idcri'])){
           $zatwierdz = new festiwal;
           $ile = $zatwierdz->IlePunktow($_POST['idkat'], $_POST['idcri']); 
            if ($ile < 7) {
                $zatwierdz->Zatwierdz($_POST['idkat'], $_POST['idcri']);
                $ile=$zatwierdz->CzyZatwierdzone($_POST['idkat'], $_POST['idcri']);
                $response['zatwierdzone'] = $ile;
                $modeleSenior = new kontrolka;
                $response['widok'] = $modeleSenior->seniorzy_ocenianie($_POST['idkat'], $_POST['idcri']);
            }
            else {
                $response['zatwierdzone'] = $ile;
            }
           
        }
        
    }
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>