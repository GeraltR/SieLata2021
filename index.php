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
                        <img class="logo-default" src="assets/onepage2/img/sielata_logo_53w.gif" alt="SieLata">
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
                            <a href="#polityka">Polityka prywatno??ci</a>
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
                    <h4 class="modal-title" id="komunikatBladLongTitle">B????d</h4>
                </div>
                <div class="modal-body" id="komunikatTekstBlad">
                    <p id="konunikatTekstBlad-p">Wyst??pi?? b????d.<p>
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
                    <p id="komunikatRejestracja-p">Zapisy w formularzu dokonywane s?? na bie????co.<br/>
                    Wystarczy, ??e naci??niesz przycisk Zapisz</p>
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
                    <p>Rozpocz??to operacj?? odzyskiwania dost??pu do konta.<br/>
                    Odbierz poczt?? email. W wiadomo??ci b??d?? dalesze informacje.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Wydarzenia wi??cej-->
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
                    Technicznie za?? wygl??da?? to b??dzie tak: <br>
                    Zbudujemy trzy makiety samolot??w PWS-A w skali 1:3 czyli rozpi??to???? skrzyde?? 2,9 metra a d??ugo???? kad??uba 2,3 metra. <br>
                    Dokumentacj?? techniczn?? opracuje firma ARCHETYPON z Jaworzna specjalizuj??ca si?? w modelowaniu 3D i animacjach.
                    Waga pojedynczego modelu to oko??o 6-8 kg. Modele chcemy po????czy?? 66 centymetrowymi odcinkami ta??m i ca??y taki zesp???? mierz??cy
                    w sumie blisko 10 metr??w powiesi?? w hallu g????wnym CH "GALENA" w Jaworznie. <br>
                    Zamierzamy wyda?? komiks, przewodnik dla m??odzie??y, gdzie opr??cz merytorycznej informacji b??d?? zdj??cia rysunki autorstwa doskona??ego
                    grafika Pana Jaros??awa Wr??bla. Znajdzie si?? tam te?? rozmowa z historykiem lotnictwa oraz liderem grupy akrobacyjnej ??ELAZNY, kt??ry
                    opowie o stopniu trudno??ci takiego pokazu. Mamy nadziej??, ??e dobra fabu??a  zach??ci m??odych ludzi do zag????bienia si?? dalej w temat.
                    Do komiksu do????czymy te?? model kartonowy PWS-A opracowany przez jedno z wiod??cych polskich wydawnictw modeli kartonowych.
                    Komiks ten b??dziemy adresowany dla dzieci z klas 4-8 szko??y podstawowej oraz m??odzie?? szk???? ??rednich miasta Jaworzna, kt??re b??dziemy
                    chcieli zaprosi?? na ciekawe zaj??cia pod samolotami.
                    B??dzie te?? kiosk multimedialny, gdzie osoba kt??ra podczas robienia zakup??w podniesie wzrok i zobaczy samoloty, a b??dzie chcia??a
                    si?? o nich czego?? dowiedzie?? b??d?? wyja??ni?? np. dziecku na ekranie monitora wszystkie informacje. <br>
                    Nad merytoryczn?? stron?? publikacji i zgodno??ci z faktami wsp????pracuje z nami Pan Adrian Rams z Muzeum Miasta Jaworzna,
                    profesor nadzwyczajny Andrzej Olejko oraz Muzeum Si?? Powietrznych w D??blinie.
                    Zamierzamy r??wnie?? przy wsp????pracy z Poloni?? na wyspach brytyjskich odnowi?? mogi???? p??k Jerzego Bajana.
                    <br>
                    Mo??na nas znale???? na Facebooku 100-lecie Polskich skrzyde?? "Tr??jka Bajana" zapraszamy do polubienia naszej strony.
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
                    <p>Opcja b??dzie uruchomiona niebawem.</p><br/>
                    <p>Tymczasem skontaktuj si?? z nami przy pomocy telefonu czy FB.</p>
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
                            rocznica zwyci??stwa
                        </h3>
                        <p class="carousel-position-two animate-delay carousel-subtitle-v1" style="margin-left: 5px;text-transform:none;" data-animation="animated fadeInDown">
                        Franciszka ??wirki i Stanis??awa Wigury
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
                            10-11 wrze??nia 2022
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
                        <!-- <a href="#portfolio" class="carousel-position-three animate-delay btn-brd-white" data-animation="animated fadeInUp">Czytaj wi??cej</a>-->
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
                            10-11 wrze??nia 2022
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
                            10-11 wrze??nia 2022
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
                            <h2>Bez formalno??ci</h2>
                            <p>Jeste??my grup?? lud??mi, kt??rych ????czy <br> wsp??lna pasja - modelarstwo.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services sm-margin-bottom-100">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="assets/onepage2/img/widgets/icon2.png" alt="">
                                </div>
                            </div>
                            <h2>Bez podzia????w</h2>
                            <p>Chocia?? wi??kszo???? z nas pasjonuje lotnictwo, <br> inne formy modelarstwa s?? przez nas akceptowane.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="assets/onepage2/img/widgets/icon3.png" alt="">
                                </div>
                            </div>
                            <h2>Pomys??owo???? i innowacja</h2>
                            <p>Dzi??ki wsp????pracy modelarzy realizacja  <br> nawet du??ych cel??w jest ??atwiejsza.</p>
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
                                <!-- Start Sekcja obs??ugi logowania-->
                                <div class="col-sm-4" id="logowanie">
                                    <h2 style="font-size:24px; text-align:left;">Zaloguj si??</h2>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Nazwa u??ytkownika">
                                    <p></p>
                                    <input type="password" id="userpass" name="userpass" class="form-control" placeholder="Has??o">
                                    <p></p>
                                    <button type="submit" class="btn-brd-white btn-block" id="zaloguj">Zaloguj</button>
                                    <p></p>
                                    <button type="submit" class="btn-danger btn-md btn-block" onclick="zarejestruj()">Zarejstruj si??</button>
                                    <p></p>
                                    <button type="submit" class="btn-brd-white btn-md btn-block" onclick="regulamin()">Regulamin</button>
                                    <p></p>
                                    <!-- <button type="submit" class="btn-brd-white btn-md btn-block" onclick="procbezp()">Procedury bezpiecze??stwa</button>
                                    <p></p> -->
                                    <button type="submit" id="skleroza" class="btn-danger btn-md btn-block" data-toggle="modal" data-target="#exampleModalCenter">Zapomnia??em has??a</button>
                                </div>
                                <!-- END Sekcja obs??ugi logowania-->
                                <!-- Start Sekcja obs??ugi danych personalnych-->
                                <div class="conteiner" id="rejestracja" style="display:none;">
                                    <h2 style="font-size:24px; text-align:left;">Rejestracja zawodnika</h2>
                                    <div class="col-6 col-md-4"><label for="imie" style="display:none;">Imi??*</label>
                                        <input type="text" id="imie" name="imie" class="form-control"  pattern="[a-zA-Z???????????????????????????????????? ]+" placeholder="Twoje imi??*">
                                        <p></p>
                                        <label for="nazwisko" style="display:none;">Nazwisko*</label>
                                        <input type="text" id="nazwisko" name="nazwisko" class="form-control"  pattern="[a-zA-Z???????????????????????????????????? ]+" placeholder="Twoje nazwisko*">
                                        <p></p>
                                        <label for="miasto" style="display:none;">Miejscowo????</label>
                                        <input type="text" id="miasto" name="miasto" class="form-control" placeholder="Miejscowo????">
                                        <p></p>
                                        <label for="rok_urodzenia" style="display:none;">Rok urodzenia*</label>
                                        <input type="text" id="rok_urodzenia" name="rok_urodzenia" class="form-control"  pattern="[0-9]+" placeholder="Rok urodzenia*">
                                        <p></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                    <label for="username_rej" style="display:none;">Nazwa u??ytkownika*</label>
                                        <input type="text" id="username_rej" name="username_rej" class="form-control"  pattern="[a-zA-Z???????????????????????????????????? ]+" placeholder="Nazwa u??ytkownika*">
                                        <p></p>
                                        <label for="userpass_rej" style="display:none;">Has??o*</label>
                                        <input type="password" id="userpass_rej" name="userpass_rej" class="form-control"  pattern="[a-zA-Z???????????????????????????????????? ]+" placeholder="Has??o*">
                                        <p></p>
                                        <label for="userpass2" style="display:none;">Powt??rz has??o*</label>
                                        <input type="password" id="userpass2" name="userpass2" class="form-control"  pattern="[a-zA-Z???????????????????????????????????? ]+" placeholder="Powt??rz has??o*">
                                        <p></p>
                                        <label for="email" style="display:none;">Adres e-mail*</label>
                                        <input type="email" id="email" name="email" class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="Adres e-mail*">
                                        <p></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <label for="klub" style="display:none;">Klub</label>
                                        <input type="text" id="klub" name="klub" class="form-control" pattern="[a-zA-Z???????????????????????????????????? ]+" placeholder="Klub lub modelarnia">
                                        <p></p>
                                        <label class="przelacznik" id="przelacznik">akceptuj?? regulamin*
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
                                <!-- END Sekcja obs??ugi danych personalnych-->
                                <!-- Start Sekcja obs??ugi modeli-->
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
                                    <button type="submit" id="modyfikujzawodnika" class="btn-brd-white btn-md btn-block" \>Zmie?? dane personalne</button>
                                    <button type="submit" id="wyloguj" class="btn-danger btn-md btn-block">Wyloguj</button>
                                </div>
                                <!-- END Sekcja obs??ugi modeli-->
                                <!-- Start Sekcja obs??ugi listy modeli-->
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
                                                            <input type="submit" id="model_delete" name="model_delete" value="Usu??" class="btn-brd-primary btn-sm btn-block" />
                                                        </td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <!-- END Sekcja obs??ugi listy modeli-->
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
                            <img src="assets/onepage2/img/clients/slpp.gif" alt="??wiatowe Stowarzyszenie Lotnik??w Polskich"></a>
                        </div>
                        <div class="item" data-quote="#client-quote-3">
                            <a href="https://www.um.jaworzno.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/jaworzno.gif" alt="Miasto Jaworzno"></a>
                        </div>
                        <div class="item" data-quote="#client-quote-4">
                            <a href="https://www.betlejem.org/" target="_blank">
                            <img src="assets/onepage2/img/clients/wspolnota.gif" alt="Wsp??lnota Betlejem"></a>
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
                            <img src="assets/onepage2/img/clients/swiatzkartonu.gif" alt="??wiat z kartonu"></a>
                        </div> -->
                        <div class="item" data-quote="#client-quote-11">
                            <a href="https://mdk.jaworzno.edu.pl/" target="_blank">
                            <img src="assets/onepage2/img/clients/mdk_jaworzno.png" alt="M??odzie??owy Dom Kultury Jaworzno"></a>
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
                            <img src="assets/onepage2/img/clients/bmzzszk??o.jpg" alt="Bran??owy Zwi??zek Zawodowy Szk??o"></a>
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
                            <img src="assets/onepage2/img/clients/fundacja.jpg" alt="Fundajca Energetyka Na Rzecz Polski Po??udniowej"></a>
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
                            <img src="assets/onepage2/img/clients/malymodelarz.gif" alt="Ma??y Modelarz"></a>
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
                            <img src="assets/onepage2/img/clients/rafal.jpg" alt="Muzeum statk??w"></a>
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
                            <img src="assets/onepage2/img/clients/lukgraph.gif" alt="LUKGRAPH ??ukasz Sznajder"></a>
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
                            <img src="assets/onepage2/img/clients/orzel.gif" alt="Ukrai??skie wydawnictwo Orze??"></a>
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
                            <img src="assets/onepage2/img/clients/marszalek.gif" alt="Marsza??ek Wojew??dztwa ??l??skiego"></a>
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
                            <img src="assets/onepage2/img/clients/halinski.jpg" alt="Wydawnictwo Hali??ski"></a>
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
                    <h2><strong>Tr??jka Bajana - Instalacja modelarska</strong></h2>
                </div>
                <div class="cube-portfolio">
                    <div class="row">
                        <div class="col-md-5 md-margin-bottom-50">
                            <div class="heading-left">
                                <h2>
                                    <strong>100-lat Polskich Si?? Powietrznych</strong>
                                    <br>

                                </h2>
                                <p>Chcia??bym zaprezentowa?? Pa??stwu szczeg????y i zaprosi?? do uczestnictwa w naszym przedsi??wzi??ciu. B??dzie nim budowa instalacji modelarskiej maj??cej uczci?? 100- lecie Polskich Si?? Powietrznych oraz posta?? Jaworznickiego pilota, Asa Polskich Si?? Powietrznych na zachodzie, kawalera Virtuti Militari, czterokrotnie odznaczonego Krzy??em Walecznych oraz wielu innych wysokich odznacze?? Brytyjskich i Alianckich: mjr pil. Karola Pniaka.</p>
                                <br><p>
                                Instalacja ta to r??wnie?? wspomnienie o p??k pilocie Jerzym Bajanie ikonie Polskiego lotnictwa wojskowego jak r??wnie?? cywilnego.
                                </p><br>
                                <p>
                                W okresie dwudziestolecia mi??dzywojennego Polskie lotnictwo wojskowe mimo, i?? bardzo m??ode rozwija??o si??
                                bardzo pr????nie, jednym ze sposob??w jakim to lotnictwo chcia??o pokaza?? spo??ecze??stwu swoj?? s??u??b?? by??o organizowanie
                                pokaz??w lotniczych z okazji ??wi??t pa??stwowych. Do tego wybierano najlepszych pilot??w kt??rzy organizowali si??
                                w kilku osobowe grupy. Jedn?? z najlepszych by??a tzw. "Tr??jka Krakowska" b??d?? te?? "Tr??jka Bajana" z drugiego pu??ku lotniczego
                                w Krakowie. Grup?? pod odw??dztwem p??k pil. Jerzego Bajana tworzy??o czterech pilot??w, ale wyst??powa??o tylko trzech.
                                W sk??ad grupy wchodzili por. pil. Bronis??aw Kosi??ski, plut. pil. Stanis??aw Macek oraz kapral pil. Karol Pniak.
                                Grupa ta zas??yn????a z akrobacji zespo??owej wykonywanej na trzech samolotach PWS-A, kt??rych skrzyd??a by??y po????czone dwu
                                metrowymi odcinkami ta??my parcianej od startu, a?? do l??dowania.<br>
                                Tak w wielkim skr??cie wygl??da aspekt historyczny tego co chcemy zrobi??.
                                </p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wydarzeniaWiecej">Czytaj wi??cej</button>
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
                            <h2>Je??eli chcesz</h2>
                            <p>si?? z nami skontaktowa??, wype??nij formularz i wy??lij go. <br> Odpowiemy jak tylko b??dzie to mo??liwe.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form">
                            <div class="form-wrap">
                                <div class="form-wrap-group">
                                    <input id="emailimienazw" type="text" placeholder="Twoje imi?? i nazwisko" class="form-control">
                                    <input id="emailtytul" type="text" placeholder="Tytu??" class="border-top-transparent form-control">
                                </div>
                                <div class="form-wrap-group border-left-transparent">
                                    <input id="emailadres" type="text" placeholder="Tw??j email" class="form-control">
                                    <input id="emailphone" type="text" placeholder="Tw??j telefon" class="border-top-transparent form-control">
                                </div>
                            </div>
                            <form >
                                <div id="g-captcha-wiadomosc"></div>
                            </form>
                            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                                async defer>
                            </script>
                        </div>
                        <textarea id="emailtresc" rows="8" name="message" placeholder="Tutaj napisz wiadomo????..." class="border-top-transparent form-control"></textarea>
                        <button id="wyslijwiadomosc" type="submit" class="btn-danger btn-md btn-block" data-toggle="modal" >Wy??lij</button>
                    </div>
                </div><!-- //end row -->
            </div>
        </div>
        <!-- End Footer -->
    </section>
    <!-- END KONTAKT SECTION -->

    <!-- BEGIN POLITYKA PRYWATNO??CI -->
    <section id="polityka">
            <!-- Polityka -->
            <div class="footer">
                <div class="container service-bg">
                    <div class="heading-left-light">
                        <h2>Polityka prywatno??ci.</h2>
                        <ol>
                            <li>Informacje og??lne
                                <p> Niniejsza polityka dotyczy Serwisu www, funkcjonuj??cego pod adresem url: <a href="http://www.sielata.com.pl">www.sielata.com.pl</a>
                                    Operatorem serwisu oraz Administratorem danych osobowych jest: SieLata. <br/>Operator jest Administratorem Twoich danych osobowych w odniesieniu do danych podanych dobrowolnie w Serwisie.
                                    Serwis wykorzystuje dane osobowe w nast??puj??cych celach:
                                    <ul>
                                        <li>Organizacji zawod??w modelarskich,</li>
                                        <li>statystyk u??ytkkowania strony internetowej.</li>
                                    </ul></p><p>
                                    Wykonanie przez Administratora danych osobowych prawnie ci??????cych na nim obowi??zk??w zgodnie z art. 6 ust. 1 lit. c) RODO w zakresie w jakim przewiduj?? to przepisy szczeg??lne.
                                    Serwis realizuje funkcje pozyskiwania informacji o u??ytkownikach i ich zachowaniu w nast??puj??cy spos??b:
                                    Poprzez dobrowolnie wprowadzone w formularzach dane, kt??re zostaj?? wprowadzone do system??w Operatora.
                                    Poprzez zapisywanie w urz??dzeniach ko??cowych plik??w cookie (tzw. ???ciasteczka???).
                                    </p>
                                    </li>
                            <li>Operator stosuje nast??puj??ce metody ochrony danych osobowych:
                                <ul>
                                    <li>Miejsca logowania i wprowadzania danych osobowych s?? chronione w warstwie transmisji (certyfikat SSL).
                                        Dzi??ki temu dane osobowe i dane logowania, wprowadzone na stronie, zostaj?? zaszyfrowane w komputerze
                                        u??ytkownika i mog?? by?? odczytane jedynie na docelowym serwerze.</li>
                                <li>Has??a u??ytkownik??w s?? przechowywane w postaci hashowanej. Funkcja hashuj??ca dzia??a jednokierunkowo - nie
                                        jest mo??liwe odwr??cenie jej dzia??ania, co stanowi obecnie wsp????czesny standard w zakresie przechowywania
                                        hase?? u??ytkownik??w.</li>
                                <li>Operator okresowo zmienia swoje has??a administracyjne.</li>
                                <li>W celu ochrony danych Operator regularnie wykonuje kopie bezpiecze??stwa.</li>
                                <li>Istotnym elementem ochrony danych jest regularna aktualizacja wszelkiego oprogramowania, wykorzystywanego
                                    przez Operatora do przetwarzania danych osobowych, co w szczeg??lno??ci oznacza regularne aktualizacje komponent??w programistycznych.
                                </li>
                                </ul>
                            </li>
                            <li>Hosting.
                                <p>Serwis jest hostowany (technicznie utrzymywany) na serwera operatora: hekko.pl
                                    Dane rejestrowe firmy hostingowej: H88 S.A. z siedzib?? w Poznaniu, Franklina Roosevelta 22, 60-829 Pozna??, wpisana do Krajowego Rejestru S??dowego przez S??d Rejonowy Pozna?? ??? Nowe Miasto i Wilda w Poznaniu, Wydzia?? VIII Gospodarczy Krajowego Rejestru S??dowego pod nr KRS 0000612359, REGON 364261632, NIP 7822622168, kapita?? zak??adowy 210.000,00 z?? w pe??ni wp??acony.
                                    Pod adresem https://hekko.pl mo??esz dowiedzie?? si?? wi??cej o hostingu i sprawdzi?? polityk?? prywatno??ci firmy hostingowej.
                                    Firma hostingowa:
                                </p>
                                <ul>
                                    <li>stosuje ??rodki ochrony przed utrat?? danych (np. macierze dyskowe, regularne kopie bezpiecze??stwa),</li>
                                    <li>stosuje adekwatne ??rodki ochrony miejsc przetwarzania na wypadek po??aru (np. specjalne systemy ga??nicze),</li>
                                    <li>stosuje adekwatne ??rodki ochrony system??w przetwarzania na wypadek nag??ej awarii zasilania (np. podw??jne tory zasilania, agregaty, systemy podtrzymania napi??cia UPS),</li>
                                    <li>stosuje ??rodki fizycznej ochrony dost??pu do miejsc przetwarzania danych (np. kontrola dost??pu, monitoring),</li>
                                    <li>stosuje ??rodki zapewnienia odpowiednich warunk??w ??rodowiskowych dla serwer??w jako element??w systemu przetwarzania danych (np. kontrola warunk??w ??rodowiskowych, specjalistyczne systemy klimatyzacji),</li>
                                    <li>stosuje rozwi??zania organizacyjne dla zapewnienia mo??liwie wysokiego stopnia ochrony i poufno??ci (szkolenia, wewn??trzne regulaminy, polityki hase?? itp.),</li>
                                    <li>powo??a??a Inspektora Ochrony Danych.</li>
                                </ul>
                            </li>
                            <li><p>Firma hostingowa w celu zapewnienia niezawodno??ci technicznej prowadzi logi na poziomie serwera. Zapisowi mog?? podlega??:</p>
                                <ul>
                                    <li>zasoby okre??lone identyfikatorem URL (adresy ????danych zasob??w ??? stron, plik??w),</li>
                                    <li>czas nadej??cia zapytania,</li>
                                    <li>czas wys??ania odpowiedzi,</li>
                                    <li>nazw?? stacji klienta ??? identyfikacja realizowana przez protok???? HTTP,</li>
                                    <li>informacje o b????dach jakie nast??pi??y przy realizacji transakcji HTTP,</li>
                                    <li>adres URL strony poprzednio odwiedzanej przez u??ytkownika (referer link) ??? w przypadku gdy przej??cie do Serwisu nast??pi??o przez odno??nik,/li>
                                    <li>informacje o przegl??darce u??ytkownika,</li>
                                    <li>informacje o adresie IP,</li>
                                    <li>informacje diagnostyczne zwi??zane z procesem samodzielnego zamawiania us??ug poprzez rejestratory na stronie,</li>
                                    <li>informacje zwi??zane z obs??ug?? poczty elektronicznej kierowanej do Operatora oraz wysy??anej przez Operatora.</li>
                                </ul>

                            </li>
                            <li>Twoje prawa i dodatkowe informacje o sposobie wykorzystania danych.
                                    <p>W niekt??rych sytuacjach Administrator ma prawo przekazywa?? Twoje dane osobowe innym odbiorcom, je??li b??dzie to niezb??dne do wykonania zawartej z Tob?? umowy lub do zrealizowania obowi??zk??w ci??????cych na Administratorze. Dotyczy to organ??w publicznych po przekazaniu odpowiednich zg??d.
                                    Twoje dane osobowe przetwarzane przez Administratora nie d??u??ej, ni?? jest to konieczne do wykonania zwi??zanych z nimi czynno??ci okre??lonych osobnymi przepisami. W odniesieniu do danych marketingowych dane nie b??d?? one przetwarzane w ten spos??b.
                                    Przys??uguje Ci prawo ????dania od Administratora:</p>
                                    <ul>
                                        <li>dost??pu do danych osobowych Ciebie dotycz??cych,</li>
                                        <li>ich sprostowania,</li>
                                        <li>usuni??cia,</li>
                                        <li>ograniczenia przetwarzania,</li>
                                        <li>oraz przenoszenia danych.</li>
                                    </ul>
                                    <p>Przys??uguje Ci prawo do z??o??enia sprzeciwu w zakresie przetwarzania wskazanego w pkt 3.3 c) wobec przetwarzania danych osobowych w celu wykonania prawnie uzasadnionych interes??w realizowanych przez Administratora, w tym profilowania, przy czym prawo sprzeciwu nie b??dzie mog??o by?? wykonane w przypadku istnienia wa??nych prawnie uzasadnionych podstaw do przetwarzania, nadrz??dnych wobec Ciebie interes??w, praw i wolno??ci, w szczeg??lno??ci ustalenia, dochodzenia lub obrony roszcze??.
                                    Na dzia??ania Administratora przys??uguje skarga do Prezesa Urz??du Ochrony Danych Osobowych, ul. Stawki 2, 00-193 Warszawa.
                                    Podanie danych osobowych jest dobrowolne, lecz niezb??dne do obs??ugi Serwisu.
                                    W stosunku do Ciebie mog?? by?? podejmowane czynno??ci polegaj??ce na zautomatyzowanym podejmowaniu decyzji, w tym profilowaniu w celu ??wiadczenia us??ug w ramach zawartej umowy oraz w celu prowadzenia przez Administratora marketingu bezpo??redniego.
                                    Dane osobowe nie s?? przekazywane od kraj??w trzecich w rozumieniu przepis??w o ochronie danych osobowych. Oznacza to, ??e nie przesy??amy ich poza teren Unii Europejskiej.</p>
                            </li>
                            <li>Informacje w formularzach.
                                    <ul>
                                        <li>Serwis zbiera informacje podane dobrowolnie przez u??ytkownika, w tym dane osobowe, o ile zostan?? one podane. S?? to takie dane jak: imi??, nazwisko, rok urodzenia, miasto zamieszkania oraz adres email.</li>
                                        <li>Serwis mo??e zapisa?? informacje o parametrach po????czenia (oznaczenie czasu, adres IP).</li>
                                        <li>Serwis, w niekt??rych wypadkach, mo??e zapisa?? informacj?? u??atwiaj??c?? powi??zanie danych w formularzu z adresem e-mail u??ytkownika wype??niaj??cego formularz. W takim wypadku adres e-mail u??ytkownika pojawia si?? wewn??trz adresu url strony zawieraj??cej formularz.</li>
                                        <li>Dane podane w formularzu s?? przetwarzane w celu wynikaj??cym z funkcji konkretnego formularza, np. w celu dokonania procesu obs??ugi zg??oszenia serwisowego lub kontaktu handlowego, rejestracji us??ug itp. Ka??dorazowo kontekst i opis formularza w czytelny spos??b informuje, do czego on s??u??y.</li>
                                    </ul>
                            </li>
                            <li>Logi Administratora.
                                    <p>Informacje zachowaniu u??ytkownik??w w serwisie mog?? podlega?? logowaniu. Dane te s?? wykorzystywane w celu administrowania serwisem.</p>
                            </li>
                            <li>Istotne techniki marketingowe.
                                    <p>Operator stosuje analiz?? statystyczn?? ruchu na stronie. Operator nie przekazuje do operatora tej us??ugi danych osobowych, a jedynie zanonimizowane informacje. Us??uga bazuje na wykorzystaniu ciasteczek w urz??dzeniu ko??cowym u??ytkownika. </p>
                            </li>

                            <li>Informacja o plikach cookies.

                                    <p>Serwis korzysta z plik??w cookies.
                                    Pliki cookies (tzw. ???ciasteczka???) stanowi?? dane informatyczne, w szczeg??lno??ci pliki tekstowe, kt??re przechowywane s?? w urz??dzeniu ko??cowym U??ytkownika Serwisu i przeznaczone s?? do korzystania ze stron internetowych Serwisu. Cookies zazwyczaj zawieraj?? nazw?? strony internetowej, z kt??rej pochodz??, czas przechowywania ich na urz??dzeniu ko??cowym oraz unikalny numer.
                                    Podmiotem zamieszczaj??cym na urz??dzeniu ko??cowym U??ytkownika Serwisu pliki cookies oraz uzyskuj??cym do nich dost??p jest operator Serwisu.
                                    Pliki cookies wykorzystywane s?? w nast??puj??cych celach:
                                        utrzymanie sesji u??ytkownika Serwisu (po zalogowaniu), dzi??ki kt??rej u??ytkownik nie musi na ka??dej podstronie Serwisu ponownie wpisywa?? loginu i has??a;
                                        realizacji cel??w zwi??zanych z organizacj?? zawod??w;
                                    W ramach Serwisu stosowane s?? dwa zasadnicze rodzaje plik??w cookies: ???sesyjne??? (session cookies) oraz ???sta??e??? (persistent cookies). Cookies ???sesyjne??? s?? plikami tymczasowymi, kt??re przechowywane s?? w urz??dzeniu ko??cowym U??ytkownika do czasu wylogowania, opuszczenia strony internetowej lub wy????czenia oprogramowania (przegl??darki internetowej). ???Sta??e??? pliki cookies przechowywane s?? w urz??dzeniu ko??cowym U??ytkownika przez czas okre??lony w parametrach plik??w cookies lub do czasu ich usuni??cia przez U??ytkownika.
                                    Oprogramowanie do przegl??dania stron internetowych (przegl??darka internetowa) zazwyczaj domy??lnie dopuszcza przechowywanie plik??w cookies w urz??dzeniu ko??cowym U??ytkownika. U??ytkownicy Serwisu mog?? dokona?? zmiany ustawie?? w tym zakresie. Przegl??darka internetowa umo??liwia usuni??cie plik??w cookies. Mo??liwe jest tak??e automatyczne blokowanie plik??w cookies Szczeg????owe informacje na ten temat zawiera pomoc lub dokumentacja przegl??darki internetowej.
                                    Ograniczenia stosowania plik??w cookies mog?? wp??yn???? na niekt??re funkcjonalno??ci dost??pne na stronach internetowych Serwisu.
                                    Pliki cookies zamieszczane w urz??dzeniu ko??cowym U??ytkownika Serwisu wykorzystywane mog?? by?? r??wnie?? przez wsp????pracuj??ce z operatorem Serwisu podmioty, w szczeg??lno??ci dotyczy to firm: Google (Google Inc. z siedzib?? w USA), Facebook (Facebook Inc. z siedzib?? w USA), Twitter (Twitter Inc. z siedzib?? w USA).</p>
                            </li>
                            <li>Zarz??dzanie plikami cookies ??? jak w praktyce wyra??a?? i cofa?? zgod???

                                    <p>Je??li u??ytkownik nie chce otrzymywa?? plik??w cookies, mo??e zmieni?? ustawienia przegl??darki. Zastrzegamy, ??e wy????czenie obs??ugi plik??w cookies niezb??dnych dla proces??w uwierzytelniania, bezpiecze??stwa, utrzymania preferencji u??ytkownika mo??e utrudni??, a w skrajnych przypadkach mo??e uniemo??liwi?? korzystanie ze stron www
                                    W celu zarz??dzania ustawienia cookies wybierz z listy poni??ej przegl??dark?? internetow??, kt??rej u??ywasz i post??puj zgodnie z instrukcjami:</p>
                                        <ul>
                                            <li>Edge</li>
                                            <li>Internet Explorer</li>
                                            <li>Chrome</li>
                                            <li>Safari</li>
                                            <li>Firefox</li>
                                            <li>Opera</li>
                                        </ul>

                                    <p>Urz??dzenia mobilne:</p>
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
                    <P>??2022 Geralt</P>
                </div>
            </div>
            <!-- End Footer Coypright -->
    </section>
    <!-- END POLITYKA PRYWATNO??CI -->

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
                  $('#username_rej').attr('placeholder', 'Nazwa u??ytkownika*');
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
                $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Wyst??pi?? b????d przy rejestracji.</br>Popraw lub uzupe??nij dane.</p>');
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
            $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Nie mo??na ju?? wprowadza?? zmian w modelach</p>');
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