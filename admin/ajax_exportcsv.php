<?php
    error_reporting(0);
    session_start();
    require_once('../lib/kontrolki.php');
    $response = '';
    $CzySenior=$_POST["czysenior"];
    $CzyJunior=$_POST["czyjunior"];
    $CzyMlodzik = $_POST["czymlodzik"];
    $CzyKarton = $_POST["czykarton"];
    $CzyPlastik = $_POST["czyplastik"];
    $pola = $_POST['pola'];
    if (!isset($pola)) {
      $pola='uzytkownik.id userId,model.konkurs,model.nazwa modelnazwa,kategoria.klasa,kategoria.symbol,kategoria.nazwa';
    }
    $sql='';
    if ($CzyMlodzik=='t' || $CzyJunior=='t' || $CzySenior=='t'){
        if ($CzyMlodzik == 't' && $CzyJunior=='n' && $CzySenior=='n') {
          $sql='Year(now())-uzytkownik.rokur < 14';
        }
        if ($CzyMlodzik == 'n' && $CzyJunior=='t' && $CzySenior=='n') {
            $sql='Year(now())-uzytkownik.rokur between 14 and 17';
        }
        if ($CzyMlodzik == 'n' && $CzyJunior=='n' && $CzySenior=='t') {
            $sql='Year(now())-uzytkownik.rokur >= 18';
        }
        if ($CzyMlodzik == 'n' && $CzyJunior=='t' && $CzySenior=='t') {
            $sql='Year(now())-uzytkownik.rokur >= 14';
        }
        if ($CzyMlodzik == 't' && $CzyJunior=='n' && $CzySenior=='t') {
            $sql='Year(now())-uzytkownik.rokur < 14 or Year(now())-uzytkownik.rokur >= 18';
        }
        if ($CzyMlodzik == 't' && $CzyJunior=='t' && $CzySenior=='n') {
            $sql='Year(now())-uzytkownik.rokur < 18';
        }
    }
    if ($CzyKarton=='t' || $CzyPlastik=='t'){
        if ($CzyKarton=='t') {
            $sql.=' and kategoria.klasa="K" ';
        }
        else {
            $sql.=' and kategoria.klasa="P" ';
        }
    }
    $baza = new kontrolka;
    $response = '';
    //$pola='uzytkownik.id userId,model.konkurs,model.nazwa modelnazwa,kategoria.klasa,kategoria.symbol,kategoria.nazwa';
    $response=$baza->tabla2CSV($pola, $sql);

    header( 'Content-Type: application/json' );
    echo json_encode($response);
?> 