<?php
  session_start();
  if (isset($_POST['wynikLogowania']))
    $blad_login = $_POST['wynikLogowania'];
  else $blad_login = 0;  
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Logowanie do panelu administracyjnego SieLata</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/bootstrap-essentials.min.css" rel="stylesheet">
    <link href="../css/moje.css" rel="stylesheet" type="text/css"/>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../sielata_ico.png"/>
</head>

<body>
	<div class="container-login text-center">
		<div class="row">
			<div class="col-xs-12">
                <img class="logo-default" src="../assets/onepage2/img/sielata_logo_53.gif" alt="SieLata">
                <p>Zaloguj się by pójść dalej.</p>
                 <p class="moj-error" id="error_login" style="display:none;">Błąd logowania</p>
				
					<div class="form-group">
						<input type="text" class="form-control" id="UserName" name="UserName" placeholder="Username" required="">
					</div>
					<div class="form-group">
						<input type="password" id="UserPass" name="UserPass" class="form-control" placeholder="Password" required="">
					</div>
					<button type="submit" id="btnLogin" class="btn btn-primary btn-block">Login</button>
                
				<p class="m-t"> <small>framework based on Bootstrap 4.3.1 © 2019</small> </p>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-essentials.min.js"></script>
    <script>
        $('#btnLogin').click(function(){
            $.ajax({
                type:'POST',
                url:'ajax_loginadmin.php',
                dataType:'json',
                data:'username='+$('#UserName').val()+'&userpass='+$('#UserPass').val(),
                success:function(dane){
                    if (dane.error.exists==true){
                      $('#error_login').show(0);
                    } else {
                        $('#error_login').hide(0);
                        window.location.href='sladmin.php';
                    }
                    
                }
            })
        })
    </script>
</body>

</html>