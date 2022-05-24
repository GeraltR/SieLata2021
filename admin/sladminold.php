<?php
    //require_once('lib/kontrolki.php');
    session_start();
?>


<!DOCTYPE html>
<html lang="en" class="has-sticky-footer">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sidebar that break at small screen - Bootstrap Essentials</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-essentials.min.css" rel="stylesheet">
    <link href="../css/moje.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fill" style="margin-bottom: 61px;">
    <input type="hidden" id="admin_id" value="<?php echo $_SESSION['idkto']; ?>"/>
    <input type="hidden" id="admin_name" value="<?php echo $_SESSION['kto']; ?>"/>
    <input type="hidden" id="admin" value="<?php echo $_SESSION['admin']; ?>"/>
    <header role="banner">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->          
            <div class="navbar-left-static" style="margin-left:15px;margin-top:5px">
              <img class="logo-default" src="../assets/onepage2/img/sielata_logo_53.gif" alt="SieLata">
                <div class="navbar-right-static">       
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" id="KtoNazwa" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Zalogowany jako: <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a oncclick="">Wyloguj</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">może coś tu będzie</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </nav>
    </header>    
    <!-- Layout Start -->

    <div class="container container-smooth mt-xs-4 mb-xs-4" style="margin-left: 15px;" >
        <main role="main" class="page-main">
            <aside role="complementary" class="page-sidebar break-xs">
                <button type="submit" class="btn btn-primary btn-block" id="btnListaZawodnikow">Lista zawodników</button>
                <button type="submit" class="btn btn-primary btn-block" id="btnOcenianie">Ocenianie</button>
                <button type="submit" class="btn btn-primary btn-block" id="btnWprowadzanieNagrod">Wprowadzanie nagród</button>
            </aside>
            <div class="page-content pl-sm-4" id="ListaZawodnikow" style="display:none;">
                <h2 id="ListaZawodnikow">Lista zawodników</h2>
            </div>
            <div class="page-content pl-sm-4" id="Ocenianie" style="display:none;">    
                <h2 id="Ocenianie">Ocenianie</h2>
                <select  id="rodzaj" name="rodzaj" style="font-size: 42px; height: 70px;">
                    <option value="k">karton</option>
                    <option value="p">plastik</option>
                </select>
                    <select  id="kategorie" name="kategorie" onchange="pokazModeleWKategorii(this.value)" style="font-size: 42px; height: 70px;">
                    </select>
                </br><p> </p>
                <div class="table-responsive" style="font-size: 22px;">
                    <table class="table table-striped table-hover table-sm" id="seniorzy"></table>
                </div>
            </div>
            <div class="page-content pl-sm-4" id="WprowadzanieNagrod" style="display:none;">    
                <h2 id="WprowadzanieNagrod">Item 3</h2>
                
            </div>
        </main>
    </div>
    <footer role="contentinfo" class="footer navbar-inverse">
        <div class="container container-smooth">
            <p>Put copyright, etc. here.</p>
        </div>
    </footer>
    <!-- Layout End -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-essentials.min.js"></script>

    <!-- moje skrypty -->
    <script src='../js/zawody.js' type="text/javascript"></script> 
</body>

</html>