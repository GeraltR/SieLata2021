<?PHP
    error_reporting(0);
	$odkogo = $_POST['odkogo'];
    $email = $_POST['adres'];
    $temat = $_POST['temat'];
    $tresc = $_POST['tresc'];
    $phone = $_POST['phone'];
	$response = array();

    if (isset ($email) && isset($tresc)){
		if ((strlen($email) > 5) && (strlen($tresc) > 3)) {
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$tresc = "$tresc\n$odkogo\ntelefon:$phone";
				$header= "From: $email \nContent-Type:".' text/plain;charset="UTF-8"'."\nContent-Transfer-Encoding: 8bit";
				if (mail('donchichot@sielata.com.pl', $temat, $tresc, $header)){
					$response["wynik"] = 0;
					$response["komunikat"] = 'Twój email został wysłany.</br>Odpowiemy jak tylko będzie to możliwe.</p>';
				}
				else {
					$response["wynik"] = 1;
					$response["komunikat"] = 'NIE udało wysłać się maila.<br /> Skontaktuj się z nami przez FB lub telfonicznie.</p>';
				}
			}
			else {
				$response["wynik"] = 2;
				$response["komunikat"] = 'Nieprawidłowy adres email.</p>';
			}
		}
		else {
			$response["wynik"] = 3;
			$response["komunikat"] = 'Za mało danych by móc wysłać maila.</p>';
		}
	}
	header( 'Content-Type: application/json' );
    echo json_encode($response);
?>