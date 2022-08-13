<?php
    require_once('./vendor/autoload.php');
	require_once('lib/baza.php');
	require_once('lib/wysylka.php');

	$UserName = $_POST['username'];
	$response = array();


	$baza = new festiwal;
	$wynik= $baza->Daj_UnikalnyKod($UserName);
	$nowe = md5(time());
	$nowe = substr($nowe, 1, 6);
	$email = $wynik['email'];
	$kto = $wynik['imie'].' '.$wynik['nazwisko'];


	$czydalej = $baza->Zmien_Haslo($wynik['kod'], $nowe);
	if (isset ($czydalej)) {
		$wysylka = new Wysylka;
		$content = 'Twoje hasło zostało zmienione na: '.$nowe.' Kliknij link by aktywowować hasło
					<a href="http://www.sielata.com.pl/go2chc.php?kod='.$wynik['kod'].'"> Następnie zaloguj się nowym hasełm.</a>';

		if ($wysylka->mail('Zmiana hasła do konta festiwalu w Jaworznie',
		    $content, $email, $kto) == 0)
			$response['komunikat'] = 'Hasło zostało zmienionen odbierz pocztę na koncie, które użyte było do rejestracji.';
		else $response['komunikat'] = 'NIE można zmienić hasła. Skontaktuj się z organizatorem.';
	}
	else $response['komunikat'] = 'NIE można zmienić hasła. Skontaktuj się z organizatorem.';
	header( 'Content-Type: application/json' );
    echo json_encode($response);
?>