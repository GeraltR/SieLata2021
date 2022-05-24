<?php
session_start();
require_once('../lib/baza.php');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$idusr = $_POST['idusr'];
    $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
    $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
    $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["username_rej"]))), ENT_QUOTES);
    $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
    $miasto = htmlspecialchars(addslashes(strip_tags(trim($_POST["miasto"]))), ENT_QUOTES);
    $rok_urodzenia = htmlspecialchars(addslashes(strip_tags(trim($_POST["rok_urodzenia"]))), ENT_QUOTES);
	$klub = $_POST["klub"];
	$admin = $_POST["admin"];
	$haslo = $_POST["haslo"];

	$response = array(array());
	$baza = new festiwal;
	$blad = 0;
	if (!isset($idusr))
	  $idusr = 0;
	$response['uzytkownik']['idusr']=$idusr;
	$response['uzytkownik']['nazwa']='';

    if (!isset($admin)) {
		$admin=0;
	}
	if (empty($haslo)) {
		$haslo='';
	}

	if(empty($_POST['imie']))
	{
		$response['error_imie']['exists'] = true;
		$response['error_imie']['message'] = "Nie podano imienia.";
		$response['error_imie']['typ'] = 0;
		$blad = 1;
	}
	else
	{
	$response['error_imie']['exists'] = false;
	$response['message'] = "";
	$response['error_imie']['typ'] = 0;
	}
	if (empty($_POST['nazwisko'])) {
		$response['error_nazwisko']['exists'] = true;
		$response['error_nazwisko']['message'] = "Nie podano nazwiska.";
		$response['error_nazwisko']['typ'] = 0;
		$blad = 1;
	}
	else {
	$response['error_nazwisko']['exists'] = false;
	$response['message'] = "";
	$response['error_nazwisko']['typ'] = 0;
	}
	if (empty($_POST['username_rej'])) {
	$login='';
	$response['error_username_rej']['exists'] = false;
	$response['message'] = "";
	$response['error_username_rej']['typ'] = 0;
	}
	else {
	if (($idusr === 0 || $idusr == null) and (!isset($_POST['username_rej'])))
	$wynik = $baza->CzyJestLogin($login);
	else $wynik = 0;
	if ($wynik != 0) {
		$response['error_username_rej']['exists'] = true;
		$response['message'] = "";
		$response['error_username_rej']['typ'] = 1;
		$blad = 1;
	}
	else {
		$response['error_username_rej']['exists'] = false;
		$response['message'] = "";
		$response['error_username_rej']['typ'] = 0;
	}


	}
	if (empty($_POST['rok_urodzenia'])) {
		$response['error_rok_urodzenia']['exists'] = true;
		$response['error_rok_urodzenia']['message'] = "Nie podano roku urodzenia.";
		$response['error_rok_urodzenia']['typ'] = 0;
		$blad = 1;
	}
	else {
		if ($rok_urodzenia < 1918) {
			$response['error_rok_urodzenia']['exists'] = true;
			$response['error_rok_urodzenia']['message'] = "Niewłaściwy roku urodzenia.";
			$response['error_rok_urodzenia']['typ'] = 0;
			$blad = 1;
		}
		else {
			$response['error_rok_urodzenia']['exists'] = false;
			$response['message'] = "";
			$response['error_rok_urodzenia']['typ'] = 0;
		}
	}



	if (empty($miasto)) $miasto = '';
	if (empty($klub)) $klub = '';

	//jak dobrze to wstawiamy zawodnika
    if ($blad == 0) {
		$wynik = $baza->WstawUzytkownikaBezHasla($idusr, $imie, $nazwisko, $login, $email, $miasto, $rok_urodzenia, $klub, $admin, $haslo);
		if ($wynik != 0)
		{
			$idusr=$wynik;
	        $response['uzytkownik']['idusr']=$idusr;
			$response['uzytkownik']['nazwa']=$baza->DajNazweUzytkownika($wynik);
		}
	}

	header( 'Content-Type: application/json' );
	echo json_encode($response);
	//echo 'www';
}

?>


