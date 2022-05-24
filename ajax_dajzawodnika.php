<?php
    error_reporting(0);
    session_start();
    require_once('lib/baza.php');
    require_once('lib/kontrolki.php');
    $response = array(array());
    $IdUsr = $_POST['IdUsr'];
    try {
        $baza = new festiwal;
        $wynik = $baza->Daj_Uzytkownika ($IdUsr); 
        if (!isset ($wynik)) {
            $response['error']['exists'] = true;
            $response['error']['message'] = "Błąd pobierania zawodnika";
            $response['uzytkownik']['id']  = 0;
            $response['uzytkownik']['nazwa']  = '';
            $response['uzytkownik']['login']  = '';
        }    
        else {
            if ($wynik==null) {
                $response['error']['exists'] = true;
                $response['error']['message'] = "Błąd pobierania zawodnika";
                $response['uzytkownik']['id']  = 0;
                $response['uzytkownik']['nazwa']  = '';
                $response['uzytkownik']['login']  = '';
            }
            else {
                $response['error']['exists'] = false;
                $response['error']['message'] = '';
                $response['uzytkownik']['id']  = $IdUsr;
                $response['uzytkownik']['imie']  = $wynik['imie'];
                $response['uzytkownik']['nazwisko']  = $wynik['nazwisko'];
                $response['uzytkownik']['login']  = $wynik['login'];
                //$response['uzytkownik']['haslo']  = $wynik['haslo'];
                $response['uzytkownik']['email']  = $wynik['email'];
                $response['uzytkownik']['kod']  = $wynik['kod'];
                $response['uzytkownik']['miasto']  = $wynik['miasto'];
                $response['uzytkownik']['rokur']  = $wynik['rokur'];
                $response['uzytkownik']['klub']  = $wynik['klub'];
            }
        }
    } catch(PDOException $e) {
        http_response_code(500);
        $komunikat = $e->getMessage();
    }


    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>

       
