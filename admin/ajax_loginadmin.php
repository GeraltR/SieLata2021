<?php
    error_reporting(0);
    session_start();
    require_once('../lib/kontrolki.php');
    $response = array(array());
    $userpass = $_POST['userpass'];
    $username = $_POST['username'];
    
    $baza = new festiwal;
    $wynik = $baza->Zaloguj_Admina ($username, $userpass); 
    if (!isset ($wynik)) {
        $response['error']['exists'] = true;
    }
    else {
        if ($wynik['id'] != 0) {
            $kto = $baza->DajNazweUzytkownika($wynik['id']);
            $response['error']['exists'] = false;
            $_SESSION['admin'] = $wynik['admin'];
            $_SESSION['kto'] = $kto;
            $_SESSION['idkto'] = $wynik['id'];
        }
        else {
            $response['error']['exists'] = true;
        }
    }
    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>