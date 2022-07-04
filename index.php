<?php
  session_start();
  $czas = mktime(23,59,59,date("m"),date("d"),date("Y"));
  if(!isset($_COOKIE['zaladuj']))
  {
    setcookie("zaladuj","kiedy",$czas);
    header("refresh:0; url=./");
  }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SieLata</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="SieLata"/>
<meta content="" name="Geralt"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href='https://fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assets/pages/css/animate.css" rel="stylesheet">
<link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
<link href="assets/plugins/cubeportfolio/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet">
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/onepage2/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="css/moje.css" rel="stylesheet" type="text/css"/>
<link href="fonts/ubuntu-medium-webfont.woff " rel="stylesheet">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="sielata_ico.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-on-scroll" class to the body element to set fixed header layout -->
<body class="page-header-fixed">

	<!-- BEGIN MAIN LAYOUT -->
	<!-- Header BEGIN -->
    <header class="page-header">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                    </button>
                    <a class="navbar-brand" href="#intro">
                        <img class="logo-default" src="assets/onepage2/img/sielata_logo_53.gif" alt="SieLata">
                        <img class="logo-default-mobile" style="display:none;" src="assets/onepage2/img/sielata_logo_53.gif" alt="SieLata">
                        <img class="logo-scroll" src="assets/onepage2/img/sielata_logo_53.gif" alt="SieLata">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="page-scroll active">
                            <a href="#intro">Start</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about">O nas</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#clients">Festiwal</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#portfolio">Wydarzenia</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">Kontakt</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#polityka">Polityka prywatności</a>
                        </li>
                    </ul>
                </div>
                <!-- End Navbar Collapse -->
            </div>
            <!--/container-->
        </nav>
        <!-- Okno Modalne -->
        <!-- Komunikat -->
        <div class="modal fade" id="komunikatBlad" tabindex="-1" role="dialog" aria-labelledby="komunikatBladTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" id="modalBlad">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="komunikatBladLongTitle">Błąd</h4>
                </div>
                <div class="modal-body" id="komunikatTekstBlad">
                    <p id="konunikatTekstBlad-p">Wystąpił błąd.<p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="komunikatRejestracyjny" tabindex="-1" role="dialog" aria-labelledby="komunikatRejestracyjnyTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="komunikatRejestracyjnyLongTitle">INFORMACJA</h5>
                </div>
                <div class="modal-body" id="komunikatRejestracja">
                    <p id="komunikatRejestracja-p">Zapisy w formularzu dokonywane są na bieżąco.<br/>
                    Wystarczy, że naciśniesz przycisk Zapisz</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">INFORMACJA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="komunikat">
                    <p>Rozpoczęto operację odzyskiwania dostępu do konta.<br/>
                    Odbierz pocztę email. W wiadomości będą dalesze informacje.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Wydarzenia więcej-->
        <div class="modal fade" id="wydarzeniaWiecej" tabindex="-1" role="dialog" aria-labelledby="wydarzeniaWiecejLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="wydarzeniaWiecejLabel">Instalacja modelarska</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>
                    Technicznie zaś wyglądać to będzie tak: <br>
                    Zbudujemy trzy makiety samolotów PWS-A w skali 1:3 czyli rozpiętość skrzydeł 2,9 metra a długość kadłuba 2,3 metra. <br>
                    Dokumentację techniczną opracuje firma ARCHETYPON z Jaworzna specjalizująca się w modelowaniu 3D i animacjach.
                    Waga pojedynczego modelu to około 6-8 kg. Modele chcemy połączyć 66 centymetrowymi odcinkami taśm i cały taki zespół mierzący
                    w sumie blisko 10 metrów powiesić w hallu głównym CH "GALENA" w Jaworznie. <br>
                    Zamierzamy wydać komiks, przewodnik dla młodzieży, gdzie oprócz merytorycznej informacji będą zdjęcia rysunki autorstwa doskonałego
                    grafika Pana Jarosława Wróbla. Znajdzie się tam też rozmowa z historykiem lotnictwa oraz liderem grupy akrobacyjnej ŻELAZNY, który
                    opowie o stopniu trudności takiego pokazu. Mamy nadzieję, że dobra fabuła  zachęci młodych ludzi do zagłębienia się dalej w temat.
                    Do komiksu dołączymy też model kartonowy PWS-A opracowany przez jedno z wiodących polskich wydawnictw modeli kartonowych.
                    Komiks ten będziemy adresowany dla dzieci z klas 4-8 szkoły podstawowej oraz młodzież szkół średnich miasta Jaworzna, które będziemy
                    chcieli zaprosić na ciekawe zajęcia pod samolotami.
                    Będzie też kiosk multimedialny, gdzie osoba która podczas robienia zakupów podniesie wzrok i zobaczy samoloty, a będzie chciała
                    się o nich czegoś dowiedzieć bądź wyjaśnić np. dziecku na ekranie monitora wszystkie informacje. <br>
                    Nad merytoryczną stroną publikacji i zgodności z faktami współpracuje z nami Pan Adrian Rams z Muzeum Miasta Jaworzna,
                    profesor nadzwyczajny Andrzej Olejko oraz Muzeum Sił Powietrznych w Dęblinie.
                    Zamierzamy również przy współpracy z Polonią na wyspach brytyjskich odnowić mogiłę płk Jerzego Bajana.
                    <br>
                    Można nas znaleźć na Facebooku 100-lecie Polskich skrzydeł "Trójka Bajana" zapraszamy do polubienia naszej strony.
                    </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="KomunikatWyslij" tabindex="-1" role="dialog" aria-labelledby="KomunikatWyslijTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">INFORMACJA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Opcja będzie uruchomiona niebawem.</p><br/>
                    <p>Tymczasem skontaktuj się z nami przy pomocy telefonu czy FB.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
                </div>
            </div>
        </div>
        <!-- END Okno Modalne-->
    </header>
    <!-- Header END -->

    <!-- BEGIN INTRO SECTION -->
    <section id="intro">
        <!-- data-bs-interval="false" -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner text-uppercase" role="listbox">
                <!-- First slide -->

                <div class="item carousel-item-one active">
                    <div class="container">
                        <h3 class="carousel-position-one animate-delay carousel-title-v1" data-animation="animated fadeInDown">
                            rocznica zwycięstwa
                        </h3>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v1" style="margin-left: 5px;text-transform:none;" data-animation="animated fadeInDown">
                        Franciszka Żwirki i Stanisława Wigury
                        </p>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v1 carousel-subtitle-v1-1" style="margin-left: 5px;text-transform:none;letter-spacing:4px;" data-animation="animated fadeInDown">
                        Challenge International de Tourisme
                        </p>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v1 carousel-subtitle-v1-2" style="margin-left: 5px;text-transform:none;letter-spacing:3px;" data-animation="animated fadeInDown">
                        1932-2022
                        </p>
                        <a id="btn-carousel-clients" href="#clients" class="carousel-position-one animate-delay btn-brd-white" data-animation="animated fadeInUp">Rejestracja</a>
                        <div class="naglowek-napis">
                            <div class="row naglowek-kolejny">
                                XIII
                            </div>
                            <div class="row naglowek-festiwal">
                            Festiwal
                            </div>
                            <div class="row naglowek-modelarski" >
                            Modelarski
                            </div>
                            <div class="row naglowek-jaworzno">
                            Jaworzno
                            </div>
                            <div class="row naglowek-termin">
                            10-11 września 2022
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second slide -->
                <div class="item carousel-item-two">
                    <div class="container">
                        <h3 class="carousel-position-one animate-delay carousel-title-v2" data-animation="animated fadeInDown">
                        Wystawa grafik
                        </h3>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v2" style="margin-left: 5px;text-transform:none;" data-animation="animated fadeInDown">
                        Tomasza Sadzinicy
                        </p>
                        <!-- <a href="#portfolio" class="carousel-position-three animate-delay btn-brd-white" data-animation="animated fadeInUp">Czytaj więcej</a>-->
                        <a id="btn-carousel-portfolio" href="#clients" class="carousel-position-two animate-delay btn-brd-white" data-animation="animated fadeInUp">Rejestracja</a>
                        <div class="naglowek-napis">
                            <div class="row naglowek-kolejny">
                                XIII
                            </div>
                            <div class="row naglowek-festiwal">
                                Festiwal
                            </div>
                            <div class="row naglowek-modelarski" >
                                Modelarski
                            </div>
                            <div class="row naglowek-jaworzno">
                                Jaworzno
                            </div>
                            <div class="row naglowek-termin">
                            10-11 września 2022
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-three">
                    <div class="container">
                        <h3 class="carousel-position-one animate-delay carousel-title-v3" data-animation="animated fadeInDown">
                        Wojna o Falklandy 1982
                        </h3>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v3" style="margin-left: 5px;text-transform:none;" data-animation="animated fadeInDown">

                        </p>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v3 carousel-subtitle-v3-1" style="margin-left: 5px;text-transform:none;letter-spacing:4px;" data-animation="animated fadeInDown">
                        </p>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v3 carousel-subtitle-v3-2" style="margin-left: 5px;text-transform:none;letter-spacing:3px;" data-animation="animated fadeInDown">
                        </p>
                        <!--<a href="#about" class="carousel-position-three animate-delay btn-brd-white" data-animation="animated fadeInUp">O nas</a> -->
                        <a id="btn-carousel-about" href="#clients" class="carousel-position-three animate-delay btn-brd-white" data-animation="animated fadeInUp">Rejestracja</a>
                        <div class="naglowek-napis">
                            <div class="row naglowek-kolejny">
                                XIII
                            </div>
                            <div class="row naglowek-festiwal">
                                Festiwal
                            </div>
                            <div class="row naglowek-modelarski" >
                                Modelarski
                            </div>
                            <div class="row naglowek-jaworzno">
                                Jaworzno
                            </div>
                            <div class="row naglowek-termin">
                            10-11 września 2022
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END INTRO SECTION -->

    <!-- BEGIN MAIN LAYOUT -->
    <div class="page-content">
        <!-- BEGIN O NAS SECTION -->
        <section id="about">
            <!-- Services BEGIN -->
            <div class="container service-bg">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="services sm-margin-bottom-100">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="assets/onepage2/img/widgets/icon1.png" alt="">
                                </div>
                            </div>
                            <h2>Bez formalności</h2>
                            <p>Jesteśmy grupą ludźmi, których łączy <br> wspólna pasja - modelarstwo.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services sm-margin-bottom-100">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="assets/onepage2/img/widgets/icon2.png" alt="">
                                </div>
                            </div>
                            <h2>Bez podziałów</h2>
                            <p>Chociaż większość z nas pasjonuje lotnictwo, <br> inne formy modelarstwa są przez nas akceptowane.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="assets/onepage2/img/widgets/icon3.png" alt="">
                                </div>
                            </div>
                            <h2>Pomysłowość i innowacja</h2>
                            <p>Dzięki współpracy modelarzy realizacja  <br> nawet dużych celów jest łatwiejsza.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services END -->
        </section>
        <!-- END O NAS SECTION -->


        <!-- BEGIN FESTIWAL -->
        <section id="clients">
            <div class="clients">
                <div class="clients-bg">
                    <div class="container">
                        <!--Start sekcja zawody -->
                        <div class="heading-blue">
                            <div id="loader" style="display:none;">
                                    <img src="ajax-loader.gif" />
                            </div>
                            <div class="row" id="zawodnik">
                                <!-- Start Sekcja obsługi logowania-->
                                <div class="col-sm-4" id="logowanie">
                                    <h2 style="font-size:24px; text-align:left;">Zaloguj się</h2>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Nazwa użytkownika">
                                    <p></p>
                                    <input type="password" id="userpass" name="userpass" class="form-control" placeholder="Hasło">
                                    <p></p>
                                    <button type="submit" class="btn-brd-white btn-block" id="zaloguj">Zaloguj</button>
                                    <p></p>
                                    <button type="submit" class="btn-danger btn-md btn-block" onclick="zarejestruj()">Zarejstruj się</button>
                                    <p></p>
                                    <button type="submit" class="btn-brd-white btn-md btn-block" onclick="regulamin()">Regulamin</button>
                                    <p></p>
                                    <!-- <button type="submit" class="btn-brd-white btn-md btn-block" onclick="procbezp()">Procedury bezpieczeństwa</button>
                                    <p></p> -->
                                    <button type="submit" id="skleroza" class="btn-danger btn-md btn-block" data-toggle="modal" data-target="#exampleModalCenter">Zapomniałem hasła</button>
                                </div>
                                <!-- END Sekcja obsługi logowania-->
                                <!-- Start Sekcja obsługi danych personalnych-->
                                <div class="conteiner" id="rejestracja" style="display:none;">
                                    <h2 style="font-size:24px; text-align:left;">Rejestracja zawodnika</h2>
                                    <div class="col-6 col-md-4"><label for="imie" style="display:none;">Imię*</label>
                                        <input type="text" id="imie" name="imie" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Twoje imię*">
                                        <p></p>
                                        <label for="nazwisko" style="display:none;">Nazwisko*</label>
                                        <input type="text" id="nazwisko" name="nazwisko" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Twoje nazwisko*">
                                        <p></p>
                                        <label for="miasto" style="display:none;">Miejscowość</label>
                                        <input type="text" id="miasto" name="miasto" class="form-control" placeholder="Miejscowość">
                                        <p></p>
                                        <label for="rok_urodzenia" style="display:none;">Rok urodzenia*</label>
                                        <input type="text" id="rok_urodzenia" name="rok_urodzenia" class="form-control"  pattern="[0-9]+" placeholder="Rok urodzenia*">
                                        <p></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                    <label for="username_rej" style="display:none;">Nazwa użytkownika*</label>
                                        <input type="text" id="username_rej" name="username_rej" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Nazwa użytkownika*">
                                        <p></p>
                                        <label for="userpass_rej" style="display:none;">Hasło*</label>
                                        <input type="password" id="userpass_rej" name="userpass_rej" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Hasło*">
                                        <p></p>
                                        <label for="userpass2" style="display:none;">Powtórz hasło*</label>
                                        <input type="password" id="userpass2" name="userpass2" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Powtórz hasło*">
                                        <p></p>
                                        <label for="email" style="display:none;">Adres e-mail*</label>
                                        <input type="email" id="email" name="email" class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="Adres e-mail*">
                                        <p></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <label for="klub" style="display:none;">Klub</label>
                                        <input type="text" id="klub" name="klub" class="form-control" pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Klub lub modelarnia">
                                        <p></p>
                                        <label class="przelacznik" id="przelacznik">akceptuję regulamin*
                                        <input type="checkbox" id="akceptuje" name="akceptuje">
                                        <span class="checkmark"></span>
                                        </label>
                                        <p></p>
                                        <form>
                                            <div id="g-captcha-rejestruj"></div>
                                            <div id="g-recaptcha-error"></div>
                                        </form>
                                        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                                            async defer>
                                        </script>
                                        <p></p>
                                        <button id="dodajzawodnika" type="submit" class="btn-brd-white btn-block" >Zapisz</button>
                                        <p></p>
                                        <button id="zrezygnujRejZaw" type="submit" class="btn-danger btn-block" >Zrezygnuj</button>
                                    </div>
                                    <div class="form-row">
                                        <span id="nameError" style="display:none;"></span>
                                        <span id="message" style="align:left; display:none;"></span><br />
                                    </div>
                                </div>
                                <!-- END Sekcja obsługi danych personalnych-->
                                <!-- Start Sekcja obsługi modeli-->
                                <div class="col-sm-4" id="konto" style="display:none;">
                                    <label id="lbzawodnik"></label>
                                    <input type="hidden" id="idusr" value="0"/>
                                    <br/>
                                    <form class="form" id="dodajmodelForma" method="POST" novalidate>
                                        <select class="form-control form-control-lg" id="rodzajmodelu" name="rodzajmodelu" style="color: #000000">
                                            <option value="K">Karton</option>
                                            <option value="P">Plastik</option>
                                        </select>
                                        <p></p>
                                        <select class="form-control form-control-lg" id="kategoriamodelu" name="kategoriamodelu" style="color: #000000">
                                        </select>
                                        <p></p>
                                        <label for="nazwamod" style="display:none;">Nazwa modelu</label>
                                        <input type="text" id="nazwamod" name="nazwamod" class="form-control" placeholder="Nazwa modelu">
                                        <p></p>
                                        <input type="text" id="skala" name="skala" class="form-control" pattern="[0-9][/]"  placeholder="Skala (np 1/33)">
                                        <p></p>
                                        <input type="text" id="wydawca" name="wydawca" class="form-control"  placeholder="Wydawca / Producent zestawu">
                                        <p></p>
                                    </form>
                                    <input type="hidden" id="modelid" name="modelid" value="0"/>
                                    <button type="submit" id="wstawmodel" class="btn-brd-white btn-md btn-block">Zapisz</button>
                                    <p></p>
                                    <button type="submit" id="modyfikujzawodnika" class="btn-brd-white btn-md btn-block" \>Zmień dane personalne</button>
                                    <button type="submit" id="wyloguj" class="btn-danger btn-md btn-block">Wyloguj</button>
                                </div>
                                <!-- END Sekcja obsługi modeli-->
                                <!-- Start Sekcja obsługi listy modeli-->
                                <div class="col-sm-8" id="informacje" >
                                    <p> </p>
                                    <table class="table table-striped table-responsive-md btn-table" id="modele_zawodnika" style="display:none;">
                                            <thead><tr><th scope="col">#</th><th scope="col">Nazwa modelu</th><th scope="col">skala</th><th scope="col">Klasa</th><th scope="col"></th><th scope="col"></th></tr></thead>
                                            <tbody>
                                                <tr id="modelwliscie" name="modelwliscie" ><td> </td><td> </td><td>
                                                    <td>
                                                        <td>
                                                            <input type="hidden"  id="model_id" name="model_id" value="0" />
                                                            <input type="submit" id="model_edit" name="model_edit" value="Edytuj" class="btn-brd-primary btn-sm btn-block" onclick="model_zmien(0)"/>
                                                            <input type="submit" id="model_delete" name="model_delete" value="Usuń" class="btn-brd-primary btn-sm btn-block" />
                                                        </td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <!-- END Sekcja obsługi listy modeli-->
                            </div>
                            <div class="row" id="czekamynawyniki" style="display:none">
                                <h1>Czekamy na wyniki...</h1>
                            </div>
                            <div class="row" id="wyniki" style="display:none">

                            </div>
                        </div>
                        <!--end sekcja zawody -->
                    </div><!-- //end heading -->
                    <!-- Begin Sponsorzy -->
                    <div class="owl-carousel" >
                        <!-- <div class="item" data-quote="#client-quote-1">
                            <a href="https://www.wak.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/wak.gif" alt="Wydawnictwo WAK"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-2">
                            <a href="https://www.sslp.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/slpp.gif" alt="Światowe Stowarzyszenie Lotników Polskich"></a>
                        </div>
                        <div class="item" data-quote="#client-quote-3">
                            <a href="https://www.um.jaworzno.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/jaworzno.gif" alt="Miasto Jaworzno"></a>
                        </div>
                        <div class="item" data-quote="#client-quote-4">
                            <a href="https://www.betlejem.org/" target="_blank">
                            <img src="assets/onepage2/img/clients/wspolnota.gif" alt="Wspólnota Betlejem"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-5">
                            <a href="https://www.facebook.com/Wektor-340383536166552" target="_blank">
                            <img src="assets/onepage2/img/clients/wektor.gif" alt="Wydawnictwo WEKTOR"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-6">
                            <a href="https://www.radioartmdk.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/radio_art.png" alt="Internetowe Radio Jaworzno"></a>
                        </div>
                        <div class="item" data-quote="#client-quote-7">
                            <a href="https://www.zsp3.jaworzno.edu.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/zsp3.gif" alt="ZSP 3 Jaworzno"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-8">
                            <a href="https://www.facebook.com/SzkutnikModel/" target="_blank">
                            <img src="assets/onepage2/img/clients/szkutnik.gif" alt="Szkutnik model"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-9">
                            <a href="http://toro-model.home.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/toromodel.gif" alt="toro-model"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-10">
                            <a href="http://www.swiatzkartonu.eu/" target="_blank">
                            <img src="assets/onepage2/img/clients/swiatzkartonu.gif" alt="Świat z kartonu"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-11">
                            <a href="https://mdk.jaworzno.edu.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/mdk_jaworzno.png" alt="Młodzieżowy Dom Kultury Jaworzno"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-12">
                            <a href="http://yahumodels.siemianowice.com/" target="_blank">
                            <img src="assets/onepage2/img/clients/yahumodels.gif" alt="yahumodels"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-13">
                            <a href="https://techmod.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/techmod.jpg" alt="Techmod"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-14">
                            <a href="https://www.cobi.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/cobi.gif" alt="COBI"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-15">
                            <a href="https://www.revell.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/revell.jpg" alt="REVELL"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-16">
                            <a href="https://vesper.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/vesper.jpg" alt="vesper"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-17">
                            <a href="http://www.aber.net.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/aber.gif" alt="ABER"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-18">
                            <a href="http://agtom.eu/" target="_blank">
                            <img src="assets/onepage2/img/clients/agtom.png" alt="AGTOM"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-19">
                            <a href="http://www.answer.pl/pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/answer.gif" alt="Wydanictwo ANSWER"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-20">
                            <a href="http://www.armahobby.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/armahobby.gif" alt="ARMA Hobby"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-21">
                            <a href="http://www.bmzzszklo.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/bmzzszkło.jpg" alt="Branżowy Związek Zawodowy Szkło"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-22">
                            <a href="http://www.drafmodel.pl" target="_blank">
                            <img src="assets/onepage2/img/clients/modeldraf.gif" alt="Wydawnictwo Draf Model"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-23">
                            <a href="http://extramodel.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/extramodel.gif" alt="Extra Model"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-24">
                            <a href="http://wrzesien1939.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/firs_to_fight.gif" alt="First to Fight"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-25">
                            <a href="http://fundacja-energetyka.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/fundacja.jpg" alt="Fundajca Energetyka Na Rzecz Polski Południowej"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-26">
                            <a href="https://www.gpm.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/gpm.gif" alt="Wydawnictwo GPM"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-27">
                            <a href="http://hataka-hobby.com/" target="_blank">
                            <img src="assets/onepage2/img/clients/hataka.gif" alt="HATAKA-Hobby"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-28">
                            <a href="http://www.ibg.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/ibg.gif" alt="IBG"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-29">
                            <a href="http://ipn.gov.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/ipn.jpg" alt="ipn"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-30">
                            <a href="http://www.jsc.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/jsc.gif" alt="Wydanictwo JSC"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-31">
                            <a href="http://www.kartonowa.pl//" target="_blank">
                            <img src="assets/onepage2/img/clients/profile.gif" alt="Kartonowa kolekcja"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-32">
                            <img src="assets/onepage2/img/clients/edekmodel.gif" alt="EDEK Model"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-33">
                            <a href="http://www.modelmaker.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/modelmaker.gif" alt="Model Maker"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-34">
                            <a href="http://www.model-kom.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/modelkom.gif" alt="model-kom"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-35">
                            <a href="http://www.hobbyzone.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/hobbyzone.gif" alt="hobbyzone"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-36">
                            <a href="https://www.facebook.com/Mistel2/" target="_blank">
                            <img src="assets/onepage2/img/clients/papieroplastyka.jpg" alt="Papieroplastyka"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-37">
                            <a href="http://sklep.mazowszelok.pl/index.php/pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/malymodelarz.gif" alt="Mały Modelarz"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-38">
                            <a href="http://fhmarkus.pl" target="_blank">
                            <img src="assets/onepage2/img/clients/markus.png" alt="FHU Markus"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-39">
                            <a href="http://www.martola.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/martola.gif" alt="Martola"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-40">
                            <a href="http://www.master-model.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/master.gif" alt="MASTER MODEL Piotr Czerkasow"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-41">
                            <a href="https://maxhobby.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/max_hobby.gif" alt="MAX Hobby"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-42">
                            <a href="https://www.mojehobby.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/mojehobby.gif" alt="Moje Hobby"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-43">
                            <a href="http://mrhobby.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/mrhobby.gif" alt="MR Hobby"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-44">
                            <a href="http://www.m-zone.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/m-zone.gif" alt="M-Zone"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-45">
                            <a href="https://olfa.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/olfa.jpg" alt="OLFA"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-46">
                            <a href="https://orlik-models.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/orlik.gif" alt="Wydawnictwo ORLIK"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-47">
                            <a href="http://sklej-model.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/sklejmodel.gif" alt="Wydawnictwo SKLEJ MODEL"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-48">
                            <a href="https://stadlermedia.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/stadler.png" alt="Stadler Media"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-49">
                            <a href="https://seahorse.pl/pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/logoseahorse.jpg" alt="Wydawnictwo SeaHorse"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-50">
                            <a href="http://www.stratusbooks.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/stratus.gif" alt="Wydawnictwo STRATUS"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-51">
                            <a href="https://kartonowakolej.pl" target="_blank">
                            <img src="assets/onepage2/img/clients/kartonowa-kolej-logo.png" alt="Kartonowa kolej"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-52">
                            <a href="https://www.facebook.com/muzeumstatkow" target="_blank">
                            <img src="assets/onepage2/img/clients/rafal.jpg" alt="Muzeum statków"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-53">
                            <a href="http://www.remgips.eu/" target="_blank">
                            <img src="assets/onepage2/img/clients/remigps.png" alt="REMGIPS"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-54">
                            <a href="https://www.facebook.com/groups/374161667193585/?ref=share" target="_blank">
                            <img src="assets/onepage2/img/clients/modelzkartonu.jpg" alt="Modele z kartonu"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-55">
                            <a href="https://konkursymodelarskie.pl" target="_blank">
                            <img src="assets/onepage2/img/clients/kmonline.png" alt="Konkurs on line"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-56">
                            <a href="http://chemoform.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/chemoform.jpg" alt="Chemoform Polska"></a>
                        </div>
                        <!-- <div class="item" data-quote="#client-quote-57">
                            <a href="https://www.almapress.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/almapress.jpg" alt="almapress"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-58">
                            <a href="https://www.dream.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/dreamlogo.gif" alt="dream"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-59">
                            <a href="https://www.amazing-art.eu/pl/amazingart-hobby-accessories" target="_blank">
                            <img src="assets/onepage2/img/clients/amazingart.jpg" alt="AMAZING ART"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-60">
                            <a href="https://www.amazing-art.eu/platine/" target="_blank">
                            <img src="assets/onepage2/img/clients/amazingxlogo.png" alt="AMAZING ART"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-61">
                            <a href="https://www.facebook.com/Bilmodel-Makers-552270644807394" target="_blank">
                            <img src="assets/onepage2/img/clients/bilmodel.gif" alt="Bilmodel-Makers"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-62">
                            <a href="https://www.facebook.com/TopGunModel" target="_blank">
                            <img src="assets/onepage2/img/clients/topgun.gif" alt="Top Gun Model"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-63">
                            <a href="http://model-shipyard.com/pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/shipyard.jpg" alt="Shipyard"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-15">
                            <a href="https://modelbud.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/choroszy.gif" alt="Choroszy Modelbud"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-18">
                            <a href="https://www.facebook.com/Bears-Scale-Modeling-1214520688614013/" target="_blank">
                            <img src="assets/onepage2/img/clients/bears.gif" alt="Bear's Scale Models"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-19">
                            <a href="http://www.lukgraph.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/lukgraph.gif" alt="LUKGRAPH Łukasz Sznajder"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-22">
                            <a href="http://valkiria-miniatures.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/valkiria.gif" alt="valkiria-miniatures"></a>
                        </div> -->
                        <!--<div class="item" data-quote="#client-quote-25">
                            <a href="http://www.mirage-hobby.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/miragehobby.jpg" alt="Mirage-Hobby"></a>
                        </div>-->
                        <!-- <div class="item" data-quote="#client-quote-29">
                            <a href="https://www.altair.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/skrzydlatapolska.gif" alt="SKRZYDLATA POLSKA"></a>
                        </div> -->
                        <!--<div class="item" data-quote="#client-quote-31">
                            <a href="http://www.papermodeling.net/" target="_blank">
                            <img src="assets/onepage2/img/clients/orzel.gif" alt="Ukraińskie wydawnictwo Orzeł"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-42">
                            <a href="https://hgwmodels.cz" target="_blank">
                            <img src="assets/onepage2/img/clients/hgwlogo.gif" alt="HGW Models"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-43">
                            <a href="https://mckis.jaw.pl/puls-jaworzna/" target="_blank">
                            <img src="assets/onepage2/img/clients/puls_jaworzna_logo.gif" alt="PULS Jaworzna"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-44">
                            <img src="assets/onepage2/img/clients/marszalek.gif" alt="Marszałek Województwa Śląskiego"></a>
                        </div> -->
                        <!--<div class="item" data-quote="#client-quote-48">
                            <a href="http://www.taurusmodels.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/taurus.gif" alt="TAURUS Models"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-49">
                            <a href="https://sklep.kagero.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/kagero.jpg" alt="KAGERO"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-51">
                            <a href="https://www.modelarskiswiat.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/modellersword.jpg" alt="MODELLERS WORLD"></a>
                        </div>
                        <div class="item" data-quote="#client-quote-52">
                            <a href="https://whitestorkminiatures.com" target="_blank">
                            <img src="assets/onepage2/img/clients/white_stork.jpg" alt="White stork"></a>
                        </div> -->
                        <!-- <div class="item" data-quote="#client-quote-54">
                            <a href="https://www.halinski.com.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/halinski.jpg" alt="Wydawnictwo Haliński"></a>
                        </div>-->
                        <!-- <div class="item" data-quote="#client-quote-55">
                            <a href="https://www.facebook.com/archetyponmodel/" target="_blank">
                            <img src="assets/onepage2/img/clients/archetypon.jpg" alt="Archetypon"></a>
                        </div> -->
                        <!--<div class="item" data-quote="#client-quote-56">
                            <a href="https://www.flymodel.pl" target="_blank">
                            <img src="assets/onepage2/img/clients/flymodel.jpg" alt="Wydawnictwo FLY Model"></a>
                        </div>-->
                        <div class="item" data-quote="#client-quote-57">
                            <a href="https://www.vena-reklama.pl" target="_blank">
                            <img src="assets/onepage2/img/clients/vena.png" alt="VENA"></a>
                        </div>
                    </div>
                    <!-- End Sponsorzy -->
                </div>
            </div>
        </section>
    </div>
    <!-- END FESTIWAL -->

    <!-- BEGIN WYDARZENIA SECTION -->
    <section id="portfolio">
        <div class="portfolio">
            <div class="container">
                <div class="heading">
                    <h2><strong>Trójka Bajana - Instalacja modelarska</strong></h2>
                </div>
                <div class="cube-portfolio">
                    <div class="row">
                        <div class="col-md-5 md-margin-bottom-50">
                            <div class="heading-left">
                                <h2>
                                    <strong>100-lat Polskich Sił Powietrznych</strong>
                                    <br>

                                </h2>
                                <p>Chciałbym zaprezentować Państwu szczegóły i zaprosić do uczestnictwa w naszym przedsięwzięciu. Będzie nim budowa instalacji modelarskiej mającej uczcić 100- lecie Polskich Sił Powietrznych oraz postać Jaworznickiego pilota, Asa Polskich Sił Powietrznych na zachodzie, kawalera Virtuti Militari, czterokrotnie odznaczonego Krzyżem Walecznych oraz wielu innych wysokich odznaczeń Brytyjskich i Alianckich: mjr pil. Karola Pniaka.</p>
                                <br><p>
                                Instalacja ta to również wspomnienie o płk pilocie Jerzym Bajanie ikonie Polskiego lotnictwa wojskowego jak również cywilnego.
                                </p><br>
                                <p>
                                W okresie dwudziestolecia międzywojennego Polskie lotnictwo wojskowe mimo, iż bardzo młode rozwijało się
                                bardzo prężnie, jednym ze sposobów jakim to lotnictwo chciało pokazać społeczeństwu swoją służbę było organizowanie
                                pokazów lotniczych z okazji świąt państwowych. Do tego wybierano najlepszych pilotów którzy organizowali się
                                w kilku osobowe grupy. Jedną z najlepszych była tzw. "Trójka Krakowska" bądź też "Trójka Bajana" z drugiego pułku lotniczego
                                w Krakowie. Grupę pod odwództwem płk pil. Jerzego Bajana tworzyło czterech pilotów, ale występowało tylko trzech.
                                W skład grupy wchodzili por. pil. Bronisław Kosiński, plut. pil. Stanisław Macek oraz kapral pil. Karol Pniak.
                                Grupa ta zasłynęła z akrobacji zespołowej wykonywanej na trzech samolotach PWS-A, których skrzydła były połączone dwu
                                metrowymi odcinkami taśmy parcianej od startu, aż do lądowania.<br>
                                Tak w wielkim skrócie wygląda aspekt historyczny tego co chcemy zrobić.
                                </p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wydarzeniaWiecej">Czytaj więcej</button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <!-- Cube Portfolio -->
                            <div id="grid-container" class="cbp-l-grid-agency">
                                <div class="cbp-item ecommerce">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/01.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/01.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-item admin">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/02.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/02.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-item corporate">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/03.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/03.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-item retail">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/04.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/04.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-item retail">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/05.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/05.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-item retail">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/06.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/06.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-item retail">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-hover-gradient">
                                            <img src="assets/onepage2/img/portfolio/07.jpg" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body portfolio-icons">
                                                    <a href="assets/onepage2/img/portfolio/07.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                    <a href="#"><i class="fa fa-file"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Cube Portfolio -->
                    </div>
                </div><!-- //end row -->
            </div>
        </div>
    </section>
    <!-- END WYDARZENIA SECTION -->

    <!-- BEGIN KONTAKT SECTION -->
    <section id="contact">
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="heading-left-light">
                            <h2>Jeżeli chcesz</h2>
                            <p>się z nami skontaktować, wypełnij formularz i wyślij go. <br> Odpowiemy jak tylko będzie to możliwe.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form">
                            <div class="form-wrap">
                                <div class="form-wrap-group">
                                    <input id="emailimienazw" type="text" placeholder="Twoje imię i nazwisko" class="form-control">
                                    <input id="emailtytul" type="text" placeholder="Tytuł" class="border-top-transparent form-control">
                                </div>
                                <div class="form-wrap-group border-left-transparent">
                                    <input id="emailadres" type="text" placeholder="Twój email" class="form-control">
                                    <input id="emailphone" type="text" placeholder="Twój telefon" class="border-top-transparent form-control">
                                </div>
                            </div>
                            <form >
                                <div id="g-captcha-wiadomosc"></div>
                            </form>
                            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                                async defer>
                            </script>
                        </div>
                        <textarea id="emailtresc" rows="8" name="message" placeholder="Tutaj napisz wiadomość..." class="border-top-transparent form-control"></textarea>
                        <button id="wyslijwiadomosc" type="submit" class="btn-danger btn-md btn-block" data-toggle="modal" >Wyślij</button>
                    </div>
                </div><!-- //end row -->
            </div>
        </div>
        <!-- End Footer -->
    </section>
    <!-- END KONTAKT SECTION -->

    <!-- BEGIN POLITYKA PRYWATNOŚCI -->
    <section id="polityka">
            <!-- Polityka -->
            <div class="footer">
                <div class="container service-bg">
                    <div class="heading-left-light">
                        <h2>Polityka prywatności.</h2>
                        <ol>
                            <li>Informacje ogólne
                                <p> Niniejsza polityka dotyczy Serwisu www, funkcjonującego pod adresem url: <a href="http://www.sielata.com.pl">www.sielata.com.pl</a>
                                    Operatorem serwisu oraz Administratorem danych osobowych jest: SieLata. <br/>Operator jest Administratorem Twoich danych osobowych w odniesieniu do danych podanych dobrowolnie w Serwisie.
                                    Serwis wykorzystuje dane osobowe w następujących celach:
                                    <ul>
                                        <li>Organizacji zawodów modelarskich,</li>
                                        <li>statystyk użytkkowania strony internetowej.</li>
                                    </ul></p><p>
                                    Wykonanie przez Administratora danych osobowych prawnie ciążących na nim obowiązków zgodnie z art. 6 ust. 1 lit. c) RODO w zakresie w jakim przewidują to przepisy szczególne.
                                    Serwis realizuje funkcje pozyskiwania informacji o użytkownikach i ich zachowaniu w następujący sposób:
                                    Poprzez dobrowolnie wprowadzone w formularzach dane, które zostają wprowadzone do systemów Operatora.
                                    Poprzez zapisywanie w urządzeniach końcowych plików cookie (tzw. „ciasteczka”).
                                    </p>
                                    </li>
                            <li>Operator stosuje następujące metody ochrony danych osobowych:
                                <ul>
                                    <li>Miejsca logowania i wprowadzania danych osobowych są chronione w warstwie transmisji (certyfikat SSL).
                                        Dzięki temu dane osobowe i dane logowania, wprowadzone na stronie, zostają zaszyfrowane w komputerze
                                        użytkownika i mogą być odczytane jedynie na docelowym serwerze.</li>
                                <li>Hasła użytkowników są przechowywane w postaci hashowanej. Funkcja hashująca działa jednokierunkowo - nie
                                        jest możliwe odwrócenie jej działania, co stanowi obecnie współczesny standard w zakresie przechowywania
                                        haseł użytkowników.</li>
                                <li>Operator okresowo zmienia swoje hasła administracyjne.</li>
                                <li>W celu ochrony danych Operator regularnie wykonuje kopie bezpieczeństwa.</li>
                                <li>Istotnym elementem ochrony danych jest regularna aktualizacja wszelkiego oprogramowania, wykorzystywanego
                                    przez Operatora do przetwarzania danych osobowych, co w szczególności oznacza regularne aktualizacje komponentów programistycznych.
                                </li>
                                </ul>
                            </li>
                            <li>Hosting.
                                <p>Serwis jest hostowany (technicznie utrzymywany) na serwera operatora: hekko.pl
                                    Dane rejestrowe firmy hostingowej: H88 S.A. z siedzibą w Poznaniu, Franklina Roosevelta 22, 60-829 Poznań, wpisana do Krajowego Rejestru Sądowego przez Sąd Rejonowy Poznań – Nowe Miasto i Wilda w Poznaniu, Wydział VIII Gospodarczy Krajowego Rejestru Sądowego pod nr KRS 0000612359, REGON 364261632, NIP 7822622168, kapitał zakładowy 210.000,00 zł w pełni wpłacony.
                                    Pod adresem https://hekko.pl możesz dowiedzieć się więcej o hostingu i sprawdzić politykę prywatności firmy hostingowej.
                                    Firma hostingowa:
                                </p>
                                <ul>
                                    <li>stosuje środki ochrony przed utratą danych (np. macierze dyskowe, regularne kopie bezpieczeństwa),</li>
                                    <li>stosuje adekwatne środki ochrony miejsc przetwarzania na wypadek pożaru (np. specjalne systemy gaśnicze),</li>
                                    <li>stosuje adekwatne środki ochrony systemów przetwarzania na wypadek nagłej awarii zasilania (np. podwójne tory zasilania, agregaty, systemy podtrzymania napięcia UPS),</li>
                                    <li>stosuje środki fizycznej ochrony dostępu do miejsc przetwarzania danych (np. kontrola dostępu, monitoring),</li>
                                    <li>stosuje środki zapewnienia odpowiednich warunków środowiskowych dla serwerów jako elementów systemu przetwarzania danych (np. kontrola warunków środowiskowych, specjalistyczne systemy klimatyzacji),</li>
                                    <li>stosuje rozwiązania organizacyjne dla zapewnienia możliwie wysokiego stopnia ochrony i poufności (szkolenia, wewnętrzne regulaminy, polityki haseł itp.),</li>
                                    <li>powołała Inspektora Ochrony Danych.</li>
                                </ul>
                            </li>
                            <li><p>Firma hostingowa w celu zapewnienia niezawodności technicznej prowadzi logi na poziomie serwera. Zapisowi mogą podlegać:</p>
                                <ul>
                                    <li>zasoby określone identyfikatorem URL (adresy żądanych zasobów – stron, plików),</li>
                                    <li>czas nadejścia zapytania,</li>
                                    <li>czas wysłania odpowiedzi,</li>
                                    <li>nazwę stacji klienta – identyfikacja realizowana przez protokół HTTP,</li>
                                    <li>informacje o błędach jakie nastąpiły przy realizacji transakcji HTTP,</li>
                                    <li>adres URL strony poprzednio odwiedzanej przez użytkownika (referer link) – w przypadku gdy przejście do Serwisu nastąpiło przez odnośnik,/li>
                                    <li>informacje o przeglądarce użytkownika,</li>
                                    <li>informacje o adresie IP,</li>
                                    <li>informacje diagnostyczne związane z procesem samodzielnego zamawiania usług poprzez rejestratory na stronie,</li>
                                    <li>informacje związane z obsługą poczty elektronicznej kierowanej do Operatora oraz wysyłanej przez Operatora.</li>
                                </ul>

                            </li>
                            <li>Twoje prawa i dodatkowe informacje o sposobie wykorzystania danych.
                                    <p>W niektórych sytuacjach Administrator ma prawo przekazywać Twoje dane osobowe innym odbiorcom, jeśli będzie to niezbędne do wykonania zawartej z Tobą umowy lub do zrealizowania obowiązków ciążących na Administratorze. Dotyczy to organów publicznych po przekazaniu odpowiednich zgód.
                                    Twoje dane osobowe przetwarzane przez Administratora nie dłużej, niż jest to konieczne do wykonania związanych z nimi czynności określonych osobnymi przepisami. W odniesieniu do danych marketingowych dane nie będą one przetwarzane w ten sposób.
                                    Przysługuje Ci prawo żądania od Administratora:</p>
                                    <ul>
                                        <li>dostępu do danych osobowych Ciebie dotyczących,</li>
                                        <li>ich sprostowania,</li>
                                        <li>usunięcia,</li>
                                        <li>ograniczenia przetwarzania,</li>
                                        <li>oraz przenoszenia danych.</li>
                                    </ul>
                                    <p>Przysługuje Ci prawo do złożenia sprzeciwu w zakresie przetwarzania wskazanego w pkt 3.3 c) wobec przetwarzania danych osobowych w celu wykonania prawnie uzasadnionych interesów realizowanych przez Administratora, w tym profilowania, przy czym prawo sprzeciwu nie będzie mogło być wykonane w przypadku istnienia ważnych prawnie uzasadnionych podstaw do przetwarzania, nadrzędnych wobec Ciebie interesów, praw i wolności, w szczególności ustalenia, dochodzenia lub obrony roszczeń.
                                    Na działania Administratora przysługuje skarga do Prezesa Urzędu Ochrony Danych Osobowych, ul. Stawki 2, 00-193 Warszawa.
                                    Podanie danych osobowych jest dobrowolne, lecz niezbędne do obsługi Serwisu.
                                    W stosunku do Ciebie mogą być podejmowane czynności polegające na zautomatyzowanym podejmowaniu decyzji, w tym profilowaniu w celu świadczenia usług w ramach zawartej umowy oraz w celu prowadzenia przez Administratora marketingu bezpośredniego.
                                    Dane osobowe nie są przekazywane od krajów trzecich w rozumieniu przepisów o ochronie danych osobowych. Oznacza to, że nie przesyłamy ich poza teren Unii Europejskiej.</p>
                            </li>
                            <li>Informacje w formularzach.
                                    <ul>
                                        <li>Serwis zbiera informacje podane dobrowolnie przez użytkownika, w tym dane osobowe, o ile zostaną one podane. Są to takie dane jak: imię, nazwisko, rok urodzenia, miasto zamieszkania oraz adres email.</li>
                                        <li>Serwis może zapisać informacje o parametrach połączenia (oznaczenie czasu, adres IP).</li>
                                        <li>Serwis, w niektórych wypadkach, może zapisać informację ułatwiającą powiązanie danych w formularzu z adresem e-mail użytkownika wypełniającego formularz. W takim wypadku adres e-mail użytkownika pojawia się wewnątrz adresu url strony zawierającej formularz.</li>
                                        <li>Dane podane w formularzu są przetwarzane w celu wynikającym z funkcji konkretnego formularza, np. w celu dokonania procesu obsługi zgłoszenia serwisowego lub kontaktu handlowego, rejestracji usług itp. Każdorazowo kontekst i opis formularza w czytelny sposób informuje, do czego on służy.</li>
                                    </ul>
                            </li>
                            <li>Logi Administratora.
                                    <p>Informacje zachowaniu użytkowników w serwisie mogą podlegać logowaniu. Dane te są wykorzystywane w celu administrowania serwisem.</p>
                            </li>
                            <li>Istotne techniki marketingowe.
                                    <p>Operator stosuje analizę statystyczną ruchu na stronie. Operator nie przekazuje do operatora tej usługi danych osobowych, a jedynie zanonimizowane informacje. Usługa bazuje na wykorzystaniu ciasteczek w urządzeniu końcowym użytkownika. </p>
                            </li>

                            <li>Informacja o plikach cookies.

                                    <p>Serwis korzysta z plików cookies.
                                    Pliki cookies (tzw. „ciasteczka”) stanowią dane informatyczne, w szczególności pliki tekstowe, które przechowywane są w urządzeniu końcowym Użytkownika Serwisu i przeznaczone są do korzystania ze stron internetowych Serwisu. Cookies zazwyczaj zawierają nazwę strony internetowej, z której pochodzą, czas przechowywania ich na urządzeniu końcowym oraz unikalny numer.
                                    Podmiotem zamieszczającym na urządzeniu końcowym Użytkownika Serwisu pliki cookies oraz uzyskującym do nich dostęp jest operator Serwisu.
                                    Pliki cookies wykorzystywane są w następujących celach:
                                        utrzymanie sesji użytkownika Serwisu (po zalogowaniu), dzięki której użytkownik nie musi na każdej podstronie Serwisu ponownie wpisywać loginu i hasła;
                                        realizacji celów związanych z organizacją zawodów;
                                    W ramach Serwisu stosowane są dwa zasadnicze rodzaje plików cookies: „sesyjne” (session cookies) oraz „stałe” (persistent cookies). Cookies „sesyjne” są plikami tymczasowymi, które przechowywane są w urządzeniu końcowym Użytkownika do czasu wylogowania, opuszczenia strony internetowej lub wyłączenia oprogramowania (przeglądarki internetowej). „Stałe” pliki cookies przechowywane są w urządzeniu końcowym Użytkownika przez czas określony w parametrach plików cookies lub do czasu ich usunięcia przez Użytkownika.
                                    Oprogramowanie do przeglądania stron internetowych (przeglądarka internetowa) zazwyczaj domyślnie dopuszcza przechowywanie plików cookies w urządzeniu końcowym Użytkownika. Użytkownicy Serwisu mogą dokonać zmiany ustawień w tym zakresie. Przeglądarka internetowa umożliwia usunięcie plików cookies. Możliwe jest także automatyczne blokowanie plików cookies Szczegółowe informacje na ten temat zawiera pomoc lub dokumentacja przeglądarki internetowej.
                                    Ograniczenia stosowania plików cookies mogą wpłynąć na niektóre funkcjonalności dostępne na stronach internetowych Serwisu.
                                    Pliki cookies zamieszczane w urządzeniu końcowym Użytkownika Serwisu wykorzystywane mogą być również przez współpracujące z operatorem Serwisu podmioty, w szczególności dotyczy to firm: Google (Google Inc. z siedzibą w USA), Facebook (Facebook Inc. z siedzibą w USA), Twitter (Twitter Inc. z siedzibą w USA).</p>
                            </li>
                            <li>Zarządzanie plikami cookies – jak w praktyce wyrażać i cofać zgodę?

                                    <p>Jeśli użytkownik nie chce otrzymywać plików cookies, może zmienić ustawienia przeglądarki. Zastrzegamy, że wyłączenie obsługi plików cookies niezbędnych dla procesów uwierzytelniania, bezpieczeństwa, utrzymania preferencji użytkownika może utrudnić, a w skrajnych przypadkach może uniemożliwić korzystanie ze stron www
                                    W celu zarządzania ustawienia cookies wybierz z listy poniżej przeglądarkę internetową, której używasz i postępuj zgodnie z instrukcjami:</p>
                                        <ul>
                                            <li>Edge</li>
                                            <li>Internet Explorer</li>
                                            <li>Chrome</li>
                                            <li>Safari</li>
                                            <li>Firefox</li>
                                            <li>Opera</li>
                                        </ul>

                                    <p>Urządzenia mobilne:</p>
                                        <ul>
                                            <li>Android</li>
                                            <li>Safari (iOS)</li>
                                            <li>Windows Phone</li>
                                        </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Footer Coypright -->
            <div class="footer-copyright">
                <div class="container">
                    <img class="logo-default" src="assets/onepage2/img/sielata_logo_new_w.gif" alt="SieLata" width="15%" height="15%">
                    <ul class="copyright-socials">
                        <li><a href="https://www.facebook.com/Sielata-561882014014619/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.facebook.com/FestiwalModelarski"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://pl.pinterest.com/mtelski/"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/pawe%C5%82-m%C4%99telski-a89b34aa/"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                    <P>Utworzone przy pomocy wzoru <a href="http://www.keenthemes.com/">KeenThemes</a></P>
                    <P>©2022 Geralt</P>
                </div>
            </div>
            <!-- End Footer Coypright -->
    </section>
    <!-- END POLITYKA PRYWATNOŚCI -->

    <!-- END MAIN LAYOUT -->
    <a href="#intro" class="go2top"><i class="fa fa-arrow-up"></i></a>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery.easing.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.parallax.js" type="text/javascript"></script>
<script src="assets/plugins/smooth-scroll/smooth-scroll.js" type="text/javascript"></script>
<script src="assets/plugins/owl.carousel/owl.carousel.js" type="text/javascript"></script>
<!-- BEGIN CUBEPORTFOLIO -->
<script src="assets/plugins/cubeportfolio/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="assets/onepage2/scripts/portfolio.js" type="text/javascript"></script>
<!-- END CUBEPORTFOLIO -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/onepage2/scripts/layout.js" type="text/javascript"></script>
<script src="assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->


<!-- Moje skrypty -->
<script type="text/javascript">
    function CzyMozna(){
       const currentDate = new Date();
       const rok=currentDate.getFullYear();
       const miesiac=currentDate.getMonth()+1;
       var dzien=currentDate.getUTCDate();
       const godzina=currentDate.getHours();
       const minuta=currentDate.getMinutes();
       const dzisiaj = new Date(rok, miesiac, dzien, godzina, minuta);
       const wynikitermin = new Date(2022,9,11,12,55,0);
       if (dzisiaj >= wynikitermin){
            $('#btn-carousel-about').text = 'Rejestracja'
            $('#btn-carousel-portfolio').text = 'Rejestracja'
            $('#btn-carousel-clients').text = 'Rejestracja'
            return false;
       }
       else {
            $('#btn-carousel-about').text = 'Wyniki'
            $('#btn-carousel-portfolio').text = 'Wyniki'
            $('#btn-carousel-clients').text = 'Wyniki'
            return true;
       }
    }

    function zarejestruj() {
        $.ajax({
            type:'POST',
            url:'index.php',
            data:'',
            success:function(html){
                var idusr=$('#idusr').val();
                $('#logowanie').hide (0);
                $('#rejestracja').show(0);
                if (idusr == null || idusr == 0){
                  $('#username_rej').removeAttr('disabled');
                  $('#username_rej').attr('placeholder', 'Nazwa użytkownika*');
                  $('#imie').attr('style','border: solid 1px #3b4e5f');
                  $('#nazwisko').attr('style','border: solid 1px #3b4e5f');
                  $('#rok_urodzenia').attr('style','border: solid 1px #3b4e5f');
                  $('#username_rej').attr('style','border: solid 1px #3b4e5f');
                  $('#userpass_rej').attr('style','border: solid 1px #3b4e5f');
                  $('#userpass2').attr('style','border: solid 1px #3b4e5f');
                  $('#email').attr('style','border: solid 1px #3b4e5f');
                  $('#przelacznik').attr('style','border: none');
                  grecaptcha.reset(widgetRejestruj);
                }
            },
            error: function (){
                $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Wystąpił błąd przy rejestracji.</br>Popraw lub uzupełnij dane.</p>');
                $('#komunikatBlad').modal();
                }
            });
    };
    function ustaw_kategorie(AJakie, ACo){
        $.ajax({
            type:'POST',
            url:'ajax_kategorie.php',
            data:'rodzaj_id='+AJakie,
            success:function(html){
              $('#kategoriamodelu').html(html);
              $('#kategoriamodelu').val(ACo);
            }
            });
    };

    function model_zmien(AIdMod){
        var idmod = 0;
        if (AIdMod == undefined)
          idmod = $('#modelid')
        else idmod = AIdMod;
        //console.log('zmieniamy');
        $.ajax({
           type: 'POST',
           url: 'ajax_model.php',
           dataType: 'json',
           data: 'idmod='+idmod,
           success: function(dane){
               //console.log(dane);
               $('#rodzajmodelu').val(dane.model_klasa);
               $('#nazwamod').val(dane.model_nazwa);
               $('#modelid').val(dane.model_id);
               $('#skala').val(dane.model_skala);
               $('#wydawca').val(dane.model_producent);
               ustaw_kategorie(dane.model_klasa, dane.model_idkat);
               $('#kategoriamodelu').val(dane.model_idkat);
           }
        });
    };

    function model_usun(AIdMod){
       if (!CzyMozna()){
            $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Nie można już wprowadzać zmian w modelach</p>');
            $('#komunikatBlad').modal();
            exit;
       }
       else {
            var idmod = 0;
            if (AIdMod == undefined)
            idmod = $('#idmod')
            else idmod = AIdMod;
            $.ajax({
            type: 'POST',
            url: 'ajax_usunmodel.php',
            dataType: 'json',
            data: 'idmod='+idmod,
            success: function(dane){
                //console.log(dane);
                $('#modele_zawodnika').show(0);
                $('#modele_zawodnika').html (dane.uzytkownik.modele);

            }
            });
       }
    };

    function regulamin(){
        window.location = 'Regulamin2022.pdf';
    }
    // function procbezp(){
    //     window.location = 'procedurybezp2022.pdf';
    // }

</script>
<script src="scripts.js" type="text/javascript"></script>
<script src="js/skryptgre.js" type="text/javascript"></script>
<!-- KONIEC -->

<!-- END JAVASCRIPTS -->
<script src="https://politykacookies.pl/politykacookies.pl.js" type="text/javascript"> cookiesPolicy(); </script>
</body>
<!-- END BODY -->
</html>