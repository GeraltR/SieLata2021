<?php
error_reporting(0);
session_start();
require_once('lib/baza.php');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$idusr = $_POST['idusr'];
    $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
    $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
    $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["username_rej"]))), ENT_QUOTES);
    $haslo = $_POST["userpass_rej"];
    $haslo2 = $_POST["userpass2"];
    $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
    $miasto = htmlspecialchars(addslashes(strip_tags(trim($_POST["miasto"]))), ENT_QUOTES);
    $rok_urodzenia = htmlspecialchars(addslashes(strip_tags(trim($_POST["rok_urodzenia"]))), ENT_QUOTES);
    $klub = $_POST["klub"];
    $akceptuje = $_POST["akceptuje"];
	
	$response = array(array());
	$baza = new festiwal;
	$blad = 0;
	if (!isset($idusr))
	  $idusr = 0;
	  
	if(empty($_POST['imie']))
    {
        $response['error_imie']['exists'] = true;
		$response['error_imie']['message'] = "Nie podano imienia.";
		$response['error_imie']['typ'] = 0;
		$blad = 1;
    }
    else
    {   if (strlen($imie) < 2) {
			$response['error_imie']['exists'] = true;
			$response['error_imie']['message'] = "Za krótkie imię.";
			$response['error_imie']['typ'] = 0;
			$blad = 1;
		}
		else {
			$response['error_imie']['exists'] = false;
			$response['message'] = "";
			$response['error_imie']['typ'] = 0;
		}
		
        
	}
	if (empty($_POST['nazwisko'])) {
		$response['error_nazwisko']['exists'] = true;
		$response['error_nazwisko']['message'] = "Nie podano nazwiska.";
		$response['error_nazwisko']['typ'] = 0;
		$blad = 1;
	}
	else {
		if (strlen($nazwisko) < 2) {
			$response['error_nazwisko']['exists'] = true;
			$response['error_nazwisko']['message'] = "Za krótkie nazwisko.";
			$response['error_nazwisko']['typ'] = 0;
			$blad = 1;
		}
		else {
			$response['error_nazwisko']['exists'] = false;
			$response['message'] = "";
			$response['error_nazwisko']['typ'] = 0;
		}
	}
	if (empty($_POST['username_rej'])) {
		$response['error_username_rej']['exists'] = true;
		$response['error_username_rej']['message'] = "Nie podano loginu.";
		$response['error_username_rej']['typ'] = 0;
		$blad = 1;
	}
	else {
		if (strlen($login) < 5) {
			$response['error_username_rej']['exists'] = true;
			$response['error_username_rej']['message'] = "Login jest za krótki (co najmniej 6 znaków).";
			$response['error_username_rej']['typ'] = 1;
			$blad = 1;
		}
		else {
			if ($idusr == 0 || $idusr == null)
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
	}
    if (empty($_POST['userpass_rej'])) {
		$response['error_userpass_rej']['exists'] = true;
		$response['error_userpass_rej']['message'] = "Nie podano hasła.";
		$response['error_userpass_rej']['typ'] = 0;
		$blad = 1;
	}
	else {
		$response['error_userpass_rej']['exists'] = false;
		$response['message'] = "";		
		$response['error_userpass_rej']['typ'] = 0;	
	}
	if (empty($_POST['userpass2'])) {
		$response['error_userpass2']['exists'] = true;
		$response['error_userpass2']['message'] = "Nie powtórzono hasła.";
		$response['error_userpass2']['typ'] = 0;
		$blad = 1;
	}
	else {
		if ($haslo != $haslo2) {
			$response['error_userpass2']['exists'] = true;
			$response['error_userpass2']['message'] = "Hasła się różnią.";
			$response['error_userpass2']['typ'] = 0;
			$blad = 1;
		}
		else {
			$response['error_userpass2']['exists'] = false;
			$response['message'] = "";		
			$response['error_userpass2']['typ'] = 0;
		}
			
	}
	if (empty($_POST['email'])) {
		$response['error_email']['exists'] = true;
		$response['error_email']['message'] = "Nie podano adresu email.";
		$response['error_email']['typ'] = 0;
		$blad = 1;
	}
	else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
			$response['error_email']['exists'] = true;
			$response['error_email']['message'] = "Niepoprawny adres email.";
			$response['message'] = "";		
			$response['error_email']['typ'] = 0;
			$blad = 1;
		}
		else {
			$response['error_email']['exists'] = false;
			$response['message'] = "";		
			$response['error_email']['typ'] = 0;
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

	if (empty($akceptuje)) {
		$response['error_akceptuje']['exists'] = true;
		$response['error_akceptuje']['message'] = "Należy przeczytać i zaakceptować regulamin.";
		$response['error_akceptuje']['typ'] = 0;
		$blad = 1;
	}
	else {
		if ($akceptuje) {
			$response['error_akceptuje']['exists'] = false;
			$response['error_akceptuje']['message'] = "";
			$response['error_akceptuje']['typ'] = 0;
		}
		else {
			$response['error_akceptuje']['exists'] = true;
			$response['error_akceptuje']['message'] = "Należy przeczytać i zaakceptować regulamin.";
			$response['error_akceptuje']['typ'] = 0;
			$blad = 1;
		}

	}
	if (empty($miasto)) $miasto = '';
	if (empty($klub)) $klub = '';
	
	if (isset($_POST['g-recaptcha-response'])) {
		$secret = $_SESSION['tajny_klucz'];
		$response = $_POST['g-recaptcha-response'];
		$remoteip = $_SERVER['REMOTE_ADDR'];
		
		$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
		$result = json_decode($url, TRUE);
		if ($result['success'] == 1) {
		  $blad = 0;
		}else{
		  $blad = 2;
		}
	}

	//jak dobrze to wstawiamy zawodnika
    if ($blad == 0) {
		$wynik = $baza->WstawUzytkownika($idusr, $imie, $nazwisko, $login, $haslo, $email, $miasto, $rok_urodzenia, $klub);
		if ($wynik != 0)
		{
			
		}
	}

	header( 'Content-Type: application/json' );
    echo json_encode($response);
}
else  header('Location: index.php');   

?>

       
