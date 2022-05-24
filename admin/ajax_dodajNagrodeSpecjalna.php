<?php
    session_start();
    require_once('../lib/kontrolki.php');
    $response = array();
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_POST['nazwa'])) {
           if (isset($_POST['opis'])) {
               $opis=$_POST['opis'];
           }
           else {
               $opis='';
           }
           $nazwa=$_POST['nazwa'];
           if (strlen($nazwa)>1){
                $wstaw = new festiwal;
                $ile = $wstaw->WstaNagrodeSpecjalna ($_POST['nazwa'], $opis, $_POST['rodzaj']); 
                    if ($ile != 0) {
                        $response['zatwierdzone'] = 1;
                        $listanagrodspec = new kontrolka;
                        $response['widok'] = $listanagrodspec->nagrodyspec_lookup();
                    }
                    else {
                        $response['zatwierdzone'] = 0;
                    }
            }
            else  {
                $response['zatwierdzone'] = 0;
            }
        }
        else {
            $listanagrodspec = new kontrolka;
            $response['widok'] = $listanagrodspec->nagrodyspec_lookup();
            $response['lista'] = $listanagrodspec->modeleNagrodzoneSpecjalnie();
        }
    }
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>