<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    $wyniki = new festiwal;
    $widok = new kontrolka;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['rodzaj'])){
            if ($_POST['rodzaj']=='dodaj'){
                $wyniki->ustawMiejsce($_POST['idmod'], 'dodaj');
            }
            if ($_POST['rodzaj']=='odejmij'){
                $wyniki->ustawMiejsce($_POST['idmod'], 'odejmij');
            }
            if ($_POST['rodzaj']=='wyroznienie') {
                $wyniki->ustawWyroznienie($_POST['idmod']);
            }
           $response = $widok->wynikiLista('', $_POST['idkat']);
        }
        else {
            $response = $widok->wynikiLista('', $_POST['idkat']);
        }
    }    
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>