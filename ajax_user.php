<?php
    error_reporting(0);
    session_start();
    require_once('lib/kontrolki.php');
    $response = array(array());
    $userpass = $_POST['userpass'];
    $username = $_POST['username'];

    $dzien   = 11;
    $miesiac = 9;
    $rok     = 2021;
    $godzina = 20;
    $minuta  = 0;
    $sekunda = 0;

    $termin = mktime($godzina, $minuta, $sekunda, $miesiac, $dzien, $rok);
    $teraz = microtime(true);

    if ($teraz < $termin)
    {
        try {
            $baza = new festiwal;
            $wynik = $baza->Zaloguj ($username, $userpass);
            if (!isset ($wynik)) {
                $response['error']['exists'] = true;
                $response['error']['message'] = "Logowanie nie udało się! Wprowadź poprawny login i hasło.";
                $response['uzytkownik']['id']  = 0;
                $response['uzytkownik']['nazwa']  = '';
                $response['uzytkownik']['login']  = '';
            }
            else {
                if ($wynik==0) {
                    $response['error']['exists'] = true;
                    $response['error']['message'] = "Logowanie nie udało się! Wprowadź poprawny login i hasło.";
                    $response['uzytkownik']['id']  = 0;
                    $response['uzytkownik']['nazwa']  = '';
                    $response['uzytkownik']['login']  = '';
                }
                else {
                    $user_id=$wynik;
                    $user_fullname=$baza->DajNazweUzytkownika($user_id);
                    $_SESSION['login'] = $username;
                    $_SESSION['kto'] = $user_fullname;
                    $_SESSION['idusr'] = $user_id;
                    $response['error']['exists'] = false;
                    $response['error']['message'] = '';
                    $response['uzytkownik']['id']  = $user_id;
                    $response['uzytkownik']['nazwa']  = $user_fullname;
                    $response['uzytkownik']['login']  = $username;


                    try {
                        $tabela = new kontrolka;
                        $wynik = $tabela->modele_zawodnika($user_id);
                        if (empty ($wynik)) {
                            $wynik= '';
                        }
                    } catch(PDOException $e) {
                        http_response_code(500);
                        $komunikat = $e->getMessage();
                    }
                    $response['uzytkownik']['modele'] = $wynik;
                }
            }
        } catch(PDOException $e) {
            http_response_code(500);
            $komunikat = $e->getMessage();
        }
    }
    else {
        $response['error']['exists'] = true;
        $response['error']['message'] = "Logowanie nie udało się! Upłyną dopuszczalny czas rejestracji.";
        $response['uzytkownik']['id']  = 0;
        $response['uzytkownik']['nazwa']  = '';
        $response['uzytkownik']['login']  = '';
    }


    header( 'Content-Type: application/json' );
    echo json_encode($response);
?>


