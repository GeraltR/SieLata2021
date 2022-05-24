<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" class="has-sticky-footer">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Panel administracyjny Festiwal Jaworzno</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-essentials.min.css" rel="stylesheet">
    <link href="../css/moje.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../sielata_ico.png"/>
</head>

<body class="fill" style="margin-bottom: 20px;">
    <input type="hidden" id="admin_id" value=0/>
    <input type="hidden" id="admin_name" value=""/>
    <input type="hidden" id="admin" value=0/>
    <input type="hidden" id="idusr" value="0"/>
    <div class="container container-smooth mt-xs-4 mb-xs-4" >
        <header role="banner">
            <nav class="navbar navbar-default" role="navigation" id="naglowek">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-header" href="#"><img class="navbar-brand" src="../assets/onepage2/img/sielata_logo_53.gif" alt="SieLata"></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" id="KtoNazwa" class="dropdown-toggle" data-toggle="dropdown">Zalogowano <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a id="mnuWyloguj" href="#">Wyloguj</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Cuś będzie</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div class="modal fade" id="komunikatBlad" tabindex="-1" role="dialog" aria-labelledby="komunikatBladTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header" id="modalBlad">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
            <div class="modal fade" id="komunikatDobry" tabindex="-1" role="dialog" aria-labelledby="komunikatDobryTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="komunikatDobryLongTitle">INFORMACJA</h5>
                    </div>
                    <div class="modal-body" id="komunikatInformacja">
                        <p id="komunikatDobry-p">Zatwierdzono poprawnie.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                    </div>
                    </div>
                </div>
            </div>
        </header>
        <main role="main" class="page-main">
            <!-- Pryzciski menu -->
            <aside role="complementary" class="page-sidebar break-xs">
                <div class="list-group ">
                    <button type="submit" class="btn btn-primary btn-block" id="btnEksportCSV">Eksportuj do csv</button>
                    <button type="submit" class="btn btn-primary btn-block" id="btnListaZawodnikow">Lista zawodników</button>
                    <button type="submit" class="btn btn-primary btn-block" id="btnOcenianie">Ocenianie</button>
                    <button type="submit" class="btn btn-primary btn-block" id="btnNagrodySpecjalne">Nagrody specjalne</button>
                    <button type="submit" class="btn btn-primary btn-block" id="btnListaWynikow">Lista wyników</button>
                    <button type="submit" class="btn btn-primary btn-block" id="btnWprowadzanieZawod">Wprowadzanie Zawodników</button>
                    <button type="submit" class="btn btn-primary btn-block" id="btnDrukowanieDyplomow">Drukowanie dyplomów</button>
                </div>
            </aside>

            <div class="page-content pl-sm-4" >
                <div class="container" id="ListyDrukowanie" style="display:none;">
                   <div class="col-9 col-xs-9" id="ListyDrukowanieWewn">
                        <div class="form-inline" style="margin-bottom:5px;">
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDMlodzik">Młodzik
                                <input type="checkbox" id="cbLDMlodzik" name="cbLDMlodzik">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDJunior">Junior
                                <input type="checkbox" id="cbLDJunior" name="cbLDJunior">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDSenior">Seniorzy
                                <input type="checkbox" id="cbLDSenior" name="cbLDSenior">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDKarton">Karton
                                <input type="checkbox" id="cbLDKarton" name="cbLDKarton">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDPlastik">Plastik
                                <input type="checkbox" id="cbLDPlastik" name="cbLDPlastik">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-inline" style="margin-bottom:5px;">
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDid">ID
                                <input type="checkbox" id="cbLDid" name="cbLDid">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDNumer">Numer
                                <input type="checkbox" id="cbLDNumer" name="cbLDNumer">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDNazwaMod">Model
                                <input type="checkbox" id="cbLDNazwaMod" name="cbLDNazwaMod">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDKlasa">Klasa
                                <input type="checkbox" id="cbLDKlasa" name="cbLDKlasa">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDKto">Imię i Nazwisko
                                <input type="checkbox" id="cbLDKto" name="cbLDKto">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDWiek">Wiek
                                <input type="checkbox" id="cbLDWiek" name="cbLDWiek">
                                <span class="checkmark"></span>
                            </label>
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDGrupa">Grupa
                                <input type="checkbox" id="cbLDGrupa" name="cbLDGrupa">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group row">
                            <div class="col-3" style="float:left;margin:3px 3px 3px 15px">
                            <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="lbLDZapisz">Zapisz w:
                                <input type="checkbox" id="cbLDZapisz" name="cbLDZapisz">
                                <span class="checkmark"></span>
                            </label>
                            </div>
                            <div class="col-6">
                              <input class="col-lg-6" type="text" id="nazwapliku" value="Lista.csv" style="margin:3px 3px 3px 0px;">
                            </div>
                            <div class="col-2">
                              <button type="submit" id="btnEksportCSVWykonaj" class="btn btn-default">Wykonaj</button>
                            </div>
                        </div>

                        <table class="table table-striped table-responsive-md btn-table" id="exp2csvTable" style="display:none;">
                        </table>
                   </div>
                </div>
                <div class="container"id="ocenianie" style="display:none;">
                    <div class="col-8 col-xs-8">
                        <select class="form-control" id="rodzaj" name="rodzaj">
                                <option value="k">karton</option>
                                <option value="p">plastik</option>
                        </select>
                        <p></p>
                        <select class="form-control form-control-lg" id="kategoria" name="kategoria" onchange="pokazModeleWKategorii(this.value)">
                        </select>
                        <p></p>
                        <div class="col-8 col-x-8">
                          <button type="submit" class="btn btn-info btnfiltr" id="btnprzeniesdokategori" onclick="przeniesDoKategorii()">Przenieś powyższą kategorię do poniższej kategorii</button>
                          <select class="form-control form-control-sm" id="przeniesdokateorii" name="przeniesdokateorii" >
                          </select>
                        </div>
                        <p></p>
                    </div>
                    <div class="col-8 col-xs-8 table-responsive" id="seniorzy">
                        <table class="table table-striped table-hover table-sm" id="seniorzyTable"></table>
                    </div>
                </div>
                <div class="container"id="nagrodySpecjalne" style="display:none;">
                    <div class="col-8 col-xs-8">
                        <select class="form-control form-control-lg" id="looknagrodySpecjalne" onchange="pokazNagrody()">
                        </select>
                        <p></p>
                        <select class="form-control form-control-lg" id="lookNazwaNagrody">
                            <option value="0">Nagroda specjalna</option>
                            <option value="1">Dyplom</option>
                            <option value="2">Wyróżnienie</option>
                        </select>
                        <p></p>
                        <div class="form-group">
                            <label for="dodajNagrodeSpecjalna" style="display:none;" >Dodaj Nagrodę Specjalną</label>
                            <input type="text" id="dodajNagrodeSpecjalna" name="dodajNagrodeSpecjalna" class="form-control form-group" placeholder="Dodaj Nagrodę Specjalną">
                            <label for="dodajOpisNagrodeSpecjalna" style="display:none;" >Opis Nagrody Specjalnej</label>
                            <input type="text" id="dodajOpisNagrodeSpecjalna" name="dodajOpisNagrodeSpecjalna" class="form-control form-group" placeholder="Opis Nagrody Specjalnej">
                            <button type="submit" id="btnwstawNagrodeSpecjalna" class="btn-brd-white btn-md">Dodaj nową nagrodę</button>
                            <button type="submit" id="btnukryjWyszukiwanie" class="btn-brd-white btn-md">Ukryj wyszukiwanie</button>
                        </div>
                        <p></p>
                        <div class="col-12 col-xs-12 table-responsive">
                            <label for="szukajzawodnika" style="display:none;" >Szukaj zawodnika</label>
                            <input type="text" id="szukajzawodnika" name="szukajzawodnika" class="form-control" placeholder="szukaj zawodnika">
                            <p></p>
                            <div class="row">
                                <table class="table table-striped table-responsive-md btn-table" id="listaznalezionychzawodnikow" style="display:none;">
                                </table>
                            </div>
                            <div class="row">
                               <table class="table table-striped table-responsive-md btn-table" id="modele_nagrodySpec">
                               </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-xs-8 table-responsive" id="tabNagrodySpecjalne">
                        <table class="table table-striped table-hover table-sm" id="NagrodySpecjalneTable"></table>
                    </div>
                </div>
                <div class="ddd" id="info_dlaAdmina" style="display:none;">
                    <table class="table table-striped table-sm btn-table" id="info_dlaAdminaTable"></table>

                    <div class="form-group przelacznik-inline">
                        <label class="przelacznik przelacznikInv przelacznik-inline" id="labSenior">senior
                            <input type="checkbox" id="cbseniorzy" name="cbseniorzy">
                            <span class="checkmark"></span>
                        </label>
                        <label class="przelacznik przelacznikInv przelacznik-inline" id="labMlodJun">młodzik i junior
                            <input type="checkbox" id="cbmlodjun" name="cbmlodjun">
                            <span class="checkmark"></span>
                        </label>
                        <label class="przelacznik przelacznikInv przelacznik-inline" id="labKarton">karton
                            <input type="checkbox" id="cbkarton" name="cbkarton">
                            <span class="checkmark"></span>
                        </label>
                        <label class="przelacznik przelacznikInv przelacznik-inline" id="labPlastik">plastik
                            <input type="checkbox" id="cbplastik" name="cbplastik">
                            <span class="checkmark"></span>
                        </label>
                        <button type="submit" class="btn btn-info btnfiltr" id="btnListaFiltr">Odśwież listę</button>
                        <button type="submit" class="btn btn-info btnfiltr" onclick="kartaPrint(0)">Drukuj listę</button>
                        <p></p>

                    </div>
                    <form class="form-inline">
                    <div class="form-group przelacznik-inline">
                        <div class="input-group col-2">
                        <span class="input-group-addon">Sortowanie wg</span>
                        <select class="form-control przelacznik-inline" id="info_AdminFiltr" onchange="infoAdminFiltruj()" style="width:auto;">
                            <option value="0">numeru</option>
                            <option value="1">kategoria, numer</option>
                            <option value="2">nazwisko, imie, numer</option>
                            <option value="3">kategoria</option>
                            <option value="4">wiek, kategoria, nazwisko, imie</option>
                        </select>
                        </div>
                        <div class="input-group col-2" stle="margin-left:20px;">
                            <span class="input-group-addon">Zacznij od</span>
                            <input type="text" class="form-control" id="kartaOdNumeru" value="1" style="width:60px;">
                        </div>
                    </div>
                    </form>
                    <p></p>
                    <table class="table table-striped table-sm btn-table" id="info_AdminListaZawodnikow"></table>
                </div>
                <p></p>
                <div class="container" id="lista_wynikow" style="display:none;">
                    <div class="col-9 col-xs-9">
                        <form class="form" id="filtrListyWynikow" method="POST" novalidate>
                            <select class="form-control form-control-lg" id="wynikrodzajmodelu" name="wynikrodzajmodelu" style="color: #000000">
                                <option value="K">Karton</option>
                                <option value="P">Plastik</option>
                            </select>
                            <p></p>
                            <select class="form-control form-control-lg" id="wynikkategoriamodelu" name="wynikkategoriamodelu" style="color: #000000">
                            </select>
                            <p></p>

                        </form>

                        <p></p>
                        <div class="form-inline">
                            <button type="submit" id="oblicz" class="btn btn-default form-inline btn-danger btn-inline">Oblicz</button>
                            <button type="submit" id="wynikiAll" class="btn btn-default form-inline btn-inline">Wszystko</button>
                            <!-- <label class="przelacznik przelacznikInv przelacznik-inline btn-inline" id="cbNieZero">Nie pokazuj modeli bez punktów
                                <input type="checkbox" id="cbNieZero" name="cbNieZero">
                                <span class="checkmark"></span>
                            </label> -->
                        </div>
                        <p></p>
                        <table class="table table-striped table-responsive-md btn-table" id="wyniki_zawodow" style="display:none;">
                                <thead><tr><th scope="col">#</th><th scope="col">Nazwa modelu</th><th scope="col">1</th><th scope="col">2</th><th scope="col">3</th><th scope="col">4</th>
                                           <th scope="col">5</th><th scope="col">6</th><th>+</th><th>-</th></tr></thead>
                                <tbody>
                                </tbody>
                        </table>
                    </div>
                </div>
                <p></p></br>
                <div class="container" id="wprowadzanie_zawodnika" style="display:none;">
                    <div class="row">
                    <h2 style="font-size:24px; text-align:left;">Rejestracja zawodnika</h2>
                    </div>
                    <div class="col-6 col-xs-6"><label for="imie" style="display:none;">Imię*</label>
                        <input type="text" id="imie" name="imie" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Imię*">
                        <p></p>
                        <label for="nazwisko" style="display:none;">Nazwisko*</label>
                        <input type="text" id="nazwisko" name="nazwisko" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Nazwisko*">
                        <p></p>
                        <div class="row">
                            <table class="table table-striped table-responsive-md btn-table" id="dane_zawodnika" style="display:none;">

                            </table>
                        </div>
                        <p></p>
                        <label for="miasto" style="display:none;">Miejscowość</label>
                        <input type="text" id="miasto" name="miasto" class="form-control" placeholder="Miejscowość">
                        <p></p>
                        <label for="rok_urodzenia" style="display:none;">Rok urodzenia*</label>
                        <input type="text" id="rok_urodzenia" name="rok_urodzenia" class="form-control"  pattern="[0-9]+" placeholder="Rok urodzenia*">
                        <p></p>
                        <label for="username_adminrej" style="display:none;">Nazwa użytkownika</label>
                        <input type="text" id="username_adminrej" name="username_adminrej" class="form-control"  pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Nazwa użytkownika*">
                        <p></p>
                        <label for="email" style="display:none;">Adres e-mail*</label>
                        <input type="email" id="email" name="email" class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="Ares e-mail*">
                        <p></p>
                        <label for="klub" style="display:none;">Klub</label>
                        <input type="text" id="klub" name="klub" class="form-control" pattern="[a-zA-ZąĄććęęłŁńŃóÓśŚżŻŹŹ ]+" placeholder="Klub lub modelarnia">
                        <p></p>
                        <select class="form-control form-control-lg" id="uprawnieniaZawodnika" name="uprawnieniaZawodnika" style="color: #000000">
                             <option value="0">Zawodnik</option>
                             <option value="2">Sędzia</option>
                             <option value="1">Administrator</option>
                        </select>
                        <p></p>
                        <label for="userpassword_rej" style="display:none;">Hasło</label>
                        <input type="password" id="userpassword_rej" name="userpassword_rej" class="form-control"  placeholder="Hasło">
                        <button id="userpassword_btn" type="submit" class="btn-danger btn-block" >Ustaw hasło</button>
                        <p></p>
                        <button id="dodajzawodnika" type="submit" class="btn-brd-white btn-block" >Zapisz</button>
                        <p></p>
                        <button id="idzdomodeli" type="submit" class="btn-brd-white btn-block" >Idź do modeli zawodnika</button>
                        <p></p>
                        <button id="nowyzawodnik" type="submit" class="btn-danger btn-block" >Nowy zawodnik</button>
                    </div>

                    <div class="form-row">
                        <span id="nameError" style="display:none;"></span>
                        <span id="message" style="align:left; display:none;"></span><br />
                    </div>
                </div>
                <div class="container" id="dodaj_modele" style="display:none;">
                    <div class="col-8 col-xs-8" id="konto">
                        <label id="zawodnik"></label>
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
                </div>
                <div class="row" id="wyniki" style="display:none">
                  <button id="btnDrukujDyplomy" type="submit" class="btn-primary btn-block" onclick="drukujDyplom(0,0,3)"> Wszystkie dyplomy </button>
                  <button id="btnDrukujDyplomyMlodzik" type="submit" class="btn-secondary btn-block" onclick="drukujDyplom(0,0,5)"> Dyplomy dla mlodzikow i juniorów </button>
                  <button id="btnDrukujDyplomyListe" type="submit" class="btn-secondary btn-block" onclick="DrukujListeMlodzikJunior()"> Drukuj listę młodzików i juniorów </button>
                </div>
                <p></p></br>
            </div>
        </main>
    </div>

    <footer role="contentinfo" class="footer">

        <div class="text-center text-small">
            ©2021 Geralt
        </div>
    </footer>
    <!-- Layout End -->
    <a href="#naglowek" title="Scroll to Top" class="
		hidden-xs
		btn
		btn-lg
		btn-primary
		btn-circle
		action-btn" data-toggle="scroll" data-spy="affix" data-offset-top="100"> <i class="glyphicon glyphicon-chevron-up"></i>
    </a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-essentials.min.js"></script>
    <script src="../js/table2csv.min.js"></script>
    <!-- moje skrypty -->
    <script src='../js/zawody.js' type="text/javascript"></script>

</body>

</html>