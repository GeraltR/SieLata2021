<?PHP
    error_reporting(0);
	$UserName = $_POST['username'];
	$response = array();
	require_once('lib/baza.php');

	$baza = new festiwal;
	$wynik= $baza->Daj_UnikalnyKod($UserName); 
	$nowe = md5(time());
	$nowe = substr($nowe, 1, 6); 	
	$email = $wynik['email'];


	$czydalej = $baza->Zmien_Haslo($wynik['kod'], $nowe);
	if (isset ($czydalej)) {
		$content = 'Twoje hasło zostało zmienione na: '.$nowe.' Kliknij link by aktywowować hasło 
					<a href="http://www.sielata.com.pl/go2chc.php?kod='.$wynik['kod'].'"> Następnie zaloguj się nowym hasełm.</a>';
		
		//$headers = "MIME-Version: 1.0" . "\r\n";
		//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";			
		//$header='From: automat@sielata.com.pl '. "\r\n";
		
		$header= 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n" . 'From: aministracja <no-reply@sielata.com.pl>' . "\r\n";
		

				
		if (mail($email, '=?UTF-8?B?'.base64_encode('Zmiana hasła do konta festiwalu w Jaworznie').'?=', $content, $header))
			$response[komunikat] = 'Hasło zostało zmienionen odbierz pocztę na koncie, które użyte było do rejestracji.';
		else $response[komunikat] = 'NIE można zmienić hasła. Skontaktuj się z organizatorem.';
	}
	else $response[komunikat] = 'NIE można zmienić hasła. Skontaktuj się z organizatorem.';
	header( 'Content-Type: application/json' );
    echo json_encode($response);
?>