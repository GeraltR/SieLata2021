<?php
require_once('baza.php');

class kontrolka {

  function __construct(){

  }

  function klasy_lookup($ARodzaj='P') {
    $lookup='';
    $dbcon = new festiwal;
    $wynik = $dbcon->DajWartoscTabeli('kategoria', 'idkat,symbol,nazwa', 'klasa="'.$ARodzaj.'"', '', 'symbol');
    foreach ($wynik as $w) {
       if ($w['symbol']==='000')
         $lookup='<option value="">'.$w['symbol'].' '.$w['nazwa'].'</option>';
       else $lookup=$lookup.'<option value="'.$w['idkat'].'">'.$w['symbol'].' '.$w['nazwa'].'</option>';

    }
    //$dbcon->close();
    return $lookup;
  }

  function seniorzy_ocenianie($AKategoria, $AIdCri) {
    $dbcon = new festiwal;
    $tabela ='<table class="table table-striped table-sm btn-table" id="seniorzyTable">';
    $tabela.='<thead class="table table-striped table-sm btn-table"><tr><th colspan="5">Seniorzy</th></tr><thead>';
    $tabela.='<thead class="table table-striped table-sm btn-table"><tr><th style="font-size:10px">Zawod.</th><th>#</th><th>Nazwa modelu</th>'.
              '<th>Ocena</th><th>Punktuj</th></tr><thead><tbody>';
    $wynik = $dbcon->DajWartoscTabeli('model, uzytkownik',
                                      'model.id, model.nazwa, model.IdUsr, model.konkurs, IdKat',
                                      'model.IdUsr = uzytkownik.id and Year(now())-18 > rokur and IdKat='.$AKategoria,
                                      '',
                                      'IdUsr, nazwa');
    $zatwierdzone=$dbcon->CzyZatwierdzone($AKategoria, $AIdCri);
    if ($zatwierdzone === 0) {
      $czyzatwierdzone = '';
    }
    else {
      $czyzatwierdzone = 'style="display:none;"';
    }
    $idkat=$AKategoria;
    foreach ($wynik as $w) {
      $miejsce= $dbcon->Daj_Obecna_Ocene($w['id'], $AIdCri);
      $ocena=$dbcon->OcenaTekst($miejsce);

      $przycisk='<td><button type="submit" class="btn btn-info btnfiltr" '.$czyzatwierdzone.' onclick="dodajOcene('.$w['id'].')">';
      $przycisk.='Punktuj</button></td>';
      $tabela.='<tr><th scope="row">'.$w['IdUsr'].'</th><td>'.$w['konkurs'].'</td><td>'.$w['nazwa'].'<td>'.$ocena.'</td>'.$przycisk.'</tr>';
      $idkat=$w['IdKat'];
    }
    $tabela.='<tbody><tfoot><tr class="warning"><td colspan=5><button id="btnZatwierdz" type="submit" class="btn-danger btn-block" '.$czyzatwierdzone.
             'onclick="zatwierdz('.$idkat.','.$AIdCri.')">Zatwierdzam</button></td></tr><tfoot></table>';
    return $tabela;
  }

  function modele_zawodnika($AIdUsr) {
    $dbcon = new festiwal;
    $tabela = '<table class="table table-striped table-sm btn-table" id="modele_zawodnika">';
    $tabela = $tabela.'<thead class="table table-striped table-sm btn-table"><tr><th scope="col">#</th><th scope="col">Nazwa modelu</th><th scope="col">skala</th><th scope="col">Klasa</th><th scope="col"></th></tr></thead><tbody>';
    $wynik = $dbcon->DajWartoscTabeli('model, kategoria',
                                      'model.id, model.konkurs, model.nazwa, model.IdUsr, model.skala, CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) kateg',
                                      'model.IdKat = kategoria.idkat and IdUsr='.$AIdUsr,
                                      '',
                                      'model.konkurs');
    foreach ($wynik as $w) {
      $przycisk = '<td>
                      <input type="hidden"  id="model_id" name="model_id" value="' . $w['id'] . '" />
                      <button type="submit" class="btn-brd-white btn-block" onclick="model_zmien('.$w['id'].')">Edytuj</button>
                      <p></p>
                      <button type="submit" class="btn btn-danger btn-block" onclick="model_usun('.$w['id'].')">Usuń</button>
                   </td>';
      $tabela = $tabela.'<tr><th scope="row">'.$w['konkurs'].'</th><td>'.$w['nazwa'].'</td><td>'.$w['skala'].'<td>'.$w['kateg'].'</td>'.$przycisk.'</tr>';
    }
    $tabela = $tabela.'<tbody></table>';
    return $tabela;
  }

  function modele_zawodnikaAdmin($AIdUsr){
    $tabela = $this->modele_zawodnika($AIdUsr);
    $tabela = str_replace('model_delete', 'model_print', $tabela);
    $tabela = str_replace('model_usun', 'kartaPrint', $tabela);
    $tabela = str_replace('value="Usuń"', 'value="Karta"', $tabela);
    $tabela = str_replace('Usuń', 'Karta', $tabela);
    return $tabela;
  }

  function info_dlaAdmina (){
    $dbcon = new festiwal;
    $tabela = '<table class="table table-striped table-sm btn-table" id="info_dlaAdminaTable">';
    $tabela = $tabela.'<thead class="table table-striped table-sm btn-table"><tr><th colspan="2" scope="col" style="text-align:center;">Statystyka</th></tr></thead><tbody>';
    $iloscAll=$dbcon->Daj_IloscZawodnikow();
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych modeli</th><td>'.$iloscAll.'</td></tr>';
    $iloscKar=$dbcon->Daj_IloscZawodnikow('kategoria.klasa="K"');
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych modeli w kategorii karton</th><td>'.$iloscKar.'</td></tr>';
    $iloscPlas=$dbcon->Daj_IloscZawodnikow('kategoria.klasa="P"');
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych modeli w kategorii plastik</th><td>'.$iloscPlas.'</td></tr>';
    $iloscZaw=$dbcon->Daj_IloscZawodnikow('zawodnikow');
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych zawodników</th><td>'.$iloscZaw.'</td></tr>';
    $iloscZaw=$dbcon->Daj_IloscZawodnikow('(Year(now())-uzytkownik.rokur) < 14');
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych młodzików</th><td>'.$iloscZaw.'</td></tr>';
    $iloscZaw=$dbcon->Daj_IloscZawodnikow('(Year(now())-uzytkownik.rokur) between 14 and 17');
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych juniorów</th><td>'.$iloscZaw.'</td></tr>';
    $iloscZaw=$dbcon->Daj_IloscZawodnikow('(Year(now())-uzytkownik.rokur) > 17');
    $tabela = $tabela.'<tr><th scope="row">Zarejestrowanych seniorów</th><td>'.$iloscZaw.'</td></tr>';
    $tabela = $tabela.'<tbody></table>';
    return $tabela;
  }

  function infoAdminaListaZawodnikow($ACzySenior='n', $ACzyJunMlo='n', $ACzyKarton='n', $ACzyPlastik='n', $ASort=0) {
    $dbcon = new festiwal;
    $tabela = '<table class="table table-striped table-sm btn-table" id="info_AdminListaZawodnikow">';
    $tabela = $tabela.'<thead class="table table-striped table-sm btn-table"><tr><th class="th-LP" scope="col">#</th><th scope="col">Imie i nazwisko</th>'.
              '<th scope="col">Model</th><th scope="col">Klasa</th><th scope="col">Wydawca</th><th scope="col">Miasto</th><th>id</th></tr></thead><tbody>';
    $sql='';
    $order='';

    if ($ACzySenior=='t') {
      $sql.=' and Year(now())-17 > rokur';
    }
    if ($ACzyJunMlo=='t') {
      $sql.=' and Year(now())-17 <= rokur';
    }
    if ($ACzyKarton=='t') {
      $sql.=' and kategoria.klasa="K" ';
    }
    if ($ACzyPlastik=='t') {
      $sql.=' and kategoria.klasa="P"';
    }

    switch ($ASort) {
      case '0': $order='model.konkurs';
                break;
      case '1': $order='kategoria.symbol, model.konkurs';
                break;
      case '2': $order='uzytkownik.nazwisko, uzytkownik.imie, model.konkurs';
                break;
      case '3': $order='kategoria.symbol, ocena';
                break;
      case '4': $order='wiek,kategoria.symbol,uzytkownik.nazwisko, uzytkownik.imie';
                break;
    }
    $wynik = $dbcon->DajWartoscTabeli('model, kategoria, uzytkownik',
                                      'model.id, model.konkurs, model.nazwa nazwaM, model.IdUsr, model.skala, model.Producent, '.
                                      'CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) kateg, kategoria.symbol,'.
                                      'CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) nazwaU, uzytkownik.rokur, '.
                                      'Year(now())-uzytkownik.rokur wiek, miasto ',
                                      'model.IdKat = kategoria.idkat and model.IdUsr=uzytkownik.id '.$sql,
                                      '',
                                      $order);
    foreach ($wynik as $w) {
      $tabela.='<tr><th scope="row" class="th-LP">'.$w['konkurs'].'</th><td class="th-Nazwisko" data-toggle="tooltip" title="'.$w['wiek'].' lat">'.$w['nazwaU'].'</td><td '.
               'class="th-NazwaMod" data-toggle="tooltip" title="'.$w['Producent'].'">'.$w['nazwaM'].
               '<td clas="th-Klas" data-toggle="tooltip" title="'.$w['kateg'].'">'.$w['symbol'].'</td><td class="th-Produc">'.
               '<button type="submit" class="btn btn-info btnfiltr" onclick="kartaPrint('.$w['id'].')">Drukuj</button></td><td>'.
               $w['miasto'].'</td><td>'.$w['IdUsr'].'</td></tr>';
    }
    $tabela = $tabela.'<tbody></table>';
    $json=file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=Paris+BC&destinations=Jaworzno&mode=bicycling&sensor=false");
    $json=json_decode($json,true);
    $distance=$json["rows"][0]["elements"][0]["distance"]["value"];
    $tabela.='<p>'.$distance.'</p>';
    return $tabela;
  }

  function szukajZawodnika($ANazwa) {
    $dbcon = new festiwal;
    $tabela = '<table class="table table-striped table-hover table-sm" id="dane_zawodnika">';
    $tabela = $tabela.'<thead><tr><th>Imię i nazwisko</th><th>Login</th><th>Miasto</th><th>Data rej.</th><th>Wybierz</th></tr><thead><tbody>';
    $wynik = $dbcon->DajWartoscTabeli('uzytkownik', 'id, CONCAT_WS (" ",imie,nazwisko) imienzw, login, miasto, data', 'nazwisko like "'.$ANazwa.'%"',
                                      '', 'nazwisko, imie');
    foreach ($wynik as $w) {
      $tabela.='<tr><th scope="row">'.$w['imienzw'].'</th><td>'.$w['login'].'</td><td>'.$w['miasto'].'</td><td>'.$w['data'].'</td><td>'.
      '<button type="submit" class="btn btn-info btnfiltr" onclick="wybierzZawodnika('.$w['id'].')">Wybierz</button></td></tr>';
    }
    $tabela.='<tbody></table>';
    return $tabela;
  }

  function szukajZawodnikafull($ANazwa) {
    $dbcon = new festiwal;
    $tabela = '<table class="table table-striped table-hover table-sm" id="dane_zawodnika">';
    $tabela = $tabela.'<thead><tr><th class="th-LP" scope="col">#</th><th>Imię i nazwisko</th><th>Miasto</th><th>Model</th><th>Klasa</th><th class="th-LP">Wiek</th><th>Wybierz</th></tr><thead><tbody>';
    $wynik = $dbcon->DajWartoscTabeli('uzytkownik, model, kategoria', 'model.id, CONCAT_WS (" ",imie, nazwisko) imienzw, konkurs, login, miasto,
                                       model.nazwa nazwamod, CONCAT_WS (" ", kategoria.klasa, kategoria.symbol, kategoria.nazwa) nazwakat, '.
                                       '(Year(now()) - rokur) wiek',
                                      'uzytkownik.id=model.IdUsr and model.IdKat=kategoria.idkat and (konkurs like "'.$ANazwa.'%" or imie like "'.
                                      $ANazwa.'%" or nazwisko like "'.$ANazwa.'%" or miasto like "'.$ANazwa.'%" or model.nazwa like "%'.$ANazwa.'%")',
                                      '', 'konkurs, nazwisko, imie');
    foreach ($wynik as $w) {
      $tabela.='<tr><th class="th-LP" scope="col">'.$w['konkurs'].'</th><th scope="row">'.$w['imienzw'].'</th><td>'.$w['miasto'].'</td><td>'.
                $w['nazwamod'].'</td><td>'.$w['nazwakat'].'</td><td class="th-LP" scope="col">'.$w['wiek'].'</td><td>'.
      '<button type="submit" class="btn btn-info btnfiltr" onclick="nagrodzZawodnika('.$w['id'].')">Wybierz</button></td></tr>';
    }
    $tabela.='<tbody></table>';
    return $tabela;
  }

  function modeleNagrodzoneSpecjalnie(){
    $dbcon = new festiwal;
    $tabela = '<table class="table table-striped table-hover table-sm" id="modele_nagrodySpec">';
    $tabela = $tabela.'<thead><tr><th class="th-LP" scope="col">#</th><th>Imię i nazwisko</th><th>Miasto</th><th>Model</th><th>Klasa</th><th class="th-LP">Wiek</th><th>Drukuj</th></tr><thead><tbody>';
    $wynik = $dbcon->DajWartoscTabeli('uzytkownik, model, kategoria,nagrodzone,nagrody',
                                      'model.id, CONCAT_WS (" ",imie, nazwisko) imienzw, konkurs, login, miasto, model.nazwa nazwamod,
                                      CONCAT_WS (" ", kategoria.klasa, kategoria.symbol, kategoria.nazwa) nazwakat, (Year(now()) - rokur) wiek,
                                      nazwa_nagrody, info, nagrodzone.IdNag',
                                      'uzytkownik.id=model.IdUsr and model.IdKat=kategoria.idkat and model.id=nagrodzone.IdMod and nagrodzone.IdNag=nagrody.id',
                                      '', 'nagrody.id, konkurs, nazwisko, imie');
    foreach ($wynik as $w) {
      $tabela.='<tr><td class="tr-nagroda" colspan="7">'.$w['nazwa_nagrody'].'</td></tr>';
      $tabela.='<tr><th class="th-LP" scope="col">'.$w['konkurs'].'</th><th scope="row">'.$w['imienzw'].'</th><td>'.$w['miasto'].'</td><td>'.
                $w['nazwamod'].'</td><td>'.$w['nazwakat'].'</td><td class="th-LP" scope="col">'.$w['wiek'].'</td><td>'.
      '<button type="submit" class="btn btn-info btnfiltr" onclick="drukujDyplom('.$w['id'].','.$w['IdNag'].', 1)">Drukuj</button></td></tr>';
    }
    $tabela.='<tbody></table>';
    return $tabela;
  }

  function wynikiLista($AKategoria='', $AIdKat=0){
    if ($AKategoria != '') {
      $sql=' and kategoria.klasa="'.$AKategoria.'"';
    }
    else {
      $sql='';
    }
    if ($AIdKat != 0) {
      $sql= ' and wyniki.IdKat='.$AIdKat;
    }
    $dbcon = new festiwal;
    $oldKat='';
    $tabela='<table class="table table-striped table-hover table-sm" id="wyniki_zawodow">';
    $tabela.='<thead><tr><th>#</th><th scope="col">Nazwa modelu</th><th scope="col">1</th><th scope="col">2</th><th scope="col">3</th>
              <th scope="col">4</th><th scope="col">5</th><th class="td-suma">&sum;</th><th class="td-miejsce">&there4;</th><th>+</th><th>-</th><th>W</th></tr></thead><tbody>';
    $wynik = $dbcon->DajWartoscTabeli('uzytkownik, model, kategoria, wyniki',
                                      'model.id, model.nazwa as nazwamod, konkurs, CONCAT_WS (" ",kategoria.klasa,kategoria.symbol, kategoria.nazwa) as nazwakat,
                                      wynik_1, wynik_2, wynik_3, wynik_4, wynik_5, wynik_6, suma, miejsce, wyroznienie, kategoria.idkat',
                                      'uzytkownik.id=model.IdUsr and model.IdKat=kategoria.idkat and model.id=wyniki.IdMod'.$sql,
                                      '', 'kategoria.idkat ASC, suma DESC, konkurs');
    foreach ($wynik as $w) {
      if ($w['nazwakat'] != $oldKat) {
        $tabela.='<tr><td class="tr-nagroda" colspan="12">'.$w['nazwakat'].'</td></tr>';
        $oldKat=$w['nazwakat'];
      }
      if ($w['miejsce'] < 4){
        $miejsce=$w['miejsce'];
      }
      else {
        $miejsce='W';
      }
      $zatwierdzone=$dbcon->CzyZatwierdzoneMiejsca($w['idkat']);
      if ($zatwierdzone === 0) {
        $czyzatwierdzone = '';
      }
      else {
        $czyzatwierdzone = 'style="display:none;"';
      }
      if ($zatwierdzone===0){
         $przyciski='<td><input type="hidden"  id="wynikmodel_id" name="model_id" value="0" />
                  <input type="submit" id="wynik_dodaj" name="wynik_dodaj" value="+" class="btn-brd-primary btn-sm btn-block" onclick="wynik_dodaj('.$w['id'].','.$w['idkat'].')"/>
                  </td><td><input type="submit" id="wynik_odejmij" name="wynik_odejmij" value="-" class="btn-brd-primary btn-sm btn-block" onclick="wynik_minus('.$w['id'].','.$w['idkat'].')"/>
                  </td><td><input type="submit" id="wynik_wyroz" name="wynik_wyroz" value="W" class="btn-brd-primary btn-sm btn-block" onclick="wynik_wyroznij('.$w['id'].','.$w['idkat'].')"/></td>';
      }
      else {
        $przyciski='<td></td><td></td><td></td>';
      }
      $tabela.='<tr id="modelwliscie" name="modelwliscie"  data-toggle="tooltip" title="'.$w['id'].'" ><td>'.$w['konkurs'].'</td><td>'.$w['nazwamod'].'</td>'.
                '<td>'.$w['wynik_1'].'</td><td>'.$w['wynik_2'].'</td><td>'.$w['wynik_3'].'</td><td>'.$w['wynik_4'].'</td><td>'.$w['wynik_5'].
                '</td><td class="td-suma">'.$w['suma'].'</td><td class="td-miejsce">'.$miejsce.'</td>'.$przyciski.'</tr>';
    }
    if (isset($w['idkat'])){
      $tabela.='<tbody><tfoot><tr class="warning"><td colspan=12><button id="btnZatwierdz" type="submit" class="btn-danger btn-block" '.$czyzatwierdzone.
      'onclick="zatwierdzMiejsca('.$w['idkat'].')">Zatwierdzam</button></td></tr><tfoot></table>';
    }
    else {
      $tabela='<table class="table table-striped table-hover table-sm" id="wyniki_zawodow" style="display:none;"></table>';
    }
    return $tabela;
  }

  function nagrodyspec_lookup() {
    $lookup='';
    $dbcon = new festiwal;
    $wynik = $dbcon->DajWartoscTabeli('nagrody', 'id,nazwa_nagrody', '', '', 'nazwa_nagrody');
    foreach ($wynik as $w) {
       $lookup=$lookup.'<option value="'.$w['id'].'">'.$w['nazwa_nagrody'].'</option>';
    }
    return $lookup;
  }

  function dodajNagrodeZaModel($AIdMod, $AIdNag){
    $sql= 'IdMod='.$AIdMod.' and IdNag='.$AIdNag;
    $dbcon= new festiwal;
    $wynik = $dbcon->Sprawdz('nagrodzone', $sql);
    if ($wynik==0) {
      $sql='insert into nagrodzone (IdMod, IdNag) values ('.$AIdMod.','.$AIdNag.')';
      $dbcon->WykonajSQL($sql);
    }
    return $this->modeleNagrodzoneSpecjalnie();
  }

  function tabla2CSV($APola, $AWarunek){
      if (strlen($AWarunek) > 0) {
       $AWarunek.= ' and ';
      }
      $AWarunek.= 'model.IdKat=kategoria.idkat and model.IdUsr=uzytkownik.id';
      $dbcon= new festiwal;
      $rezultat = $dbcon->DajWartoscTabeli('model,kategoria,uzytkownik', $APola, $AWarunek, ' imienzw',  'kategoria.klasa, kategoria.Symbol,uzytkownik.id,konkurs');
      $tabela='<table class="table table-striped table-responsive-md btn-table" id="exp2csvTable">';
      $k= $rezultat->columnCount();
      foreach ($rezultat as $w) {
        $tabela.='<tr>';
        for($i = 0; $i < $k; ++$i) {
           $tabela.='<td>'.$w[$i].'</td>';
        }
        $tabela.='</tr>';
      }
      $tabela.='</table>';
      return $tabela;
    }

  function Nagrody_specjalne($ACzyDyplom=''){
    $tabela='<table class="table table-responsive-md table-sm" id="dyplomy_specjalne">';
    $dbcon=new festiwal;
    $nagrody=$dbcon->DajWartoscTabeli('nagrody,nagrodzone', 'nagrody.id, nazwa_nagrody, info, IdMod', 'nagrody.id=nagrodzone.IdNag',
                                      'nagrody.id, nazwa_nagrody, info', 'id');
    foreach($nagrody as $n){
        $tabela.='<thead><tr><th id="nazwanagrody" colspan="3" scope="row">'.$n['nazwa_nagrody'].'</th></tr></thead><tbody>';
        $sql= 'nagrodzone.IdNag='.$n['id'].' and nagrodzone.IdMod=model.id and model.IdUsr=uzytkownik.id';
        $pola='model.nazwa NazwaMod, CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) kto, rokur';
        $dyplomy = $dbcon->DajWartoscTabeli('nagrodzone, model, uzytkownik', $pola, $sql, '', 'rokur desc');
        if ($ACzyDyplom == 'tak') {
          $przycisk='<td><button id="btnDrukujDyplomMiejsce" type="submit" class="btn-info btn-block" onclick="drukujDyplom('.$n['IdMod'].
                    ','.$n['id'].',1)">Dyplom</button></td>';
        }
        else {
          $przycisk='<td></td>';
        }
        foreach ($dyplomy as $d) {
          $tabela.='<tr><td id="zawodnik_dyplom_nazwisko">'.$d['kto'].'</td><td id="zawodnik_dyplom_model">'.$d['NazwaMod'].'</td>'.$przycisk.'</tr>';
        }
        $tabela.='<tr><td colspan="3"> </td></tr></tbody>';
    }
    $tabela.='</table>';
    return $tabela;
  }

  function Nagrody_klasy($ACzyDyplom=''){
    $tabela='<table class="table table-responsive-md table-sm" id="dyplomy_klasy">';
    $dbcon=new festiwal;
    $nagrody=$dbcon->DajWartoscTabeli('wyniki,kategoria', 'wyniki.IdKat, CONCAT_WS (" ",kategoria.symbol, kategoria.nazwa) as nazwakat, kategoria.klasa',
                                      'wyniki.IdKat=kategoria.idkat and miejsce > 0',
                                      'wyniki.IdKat, kategoria.symbol, kategoria.nazwa, kategoria.klasa',
                                      'kategoria.klasa asc,kategoria.symbol,miejsce');
    foreach($nagrody as $n){
        if ($n['klasa']==='P') {
          $klasa='plastik';
        }
        else {
          $klasa='karton';
        }
        $tabela.='<thead><tr><th id="nazwanagrody" colspan="3" scope="row">'.$n['nazwakat'].' - '.$klasa.'</th></tr></thead><tbody>';
        //$tabela.='<tr><td id="dla" colspan="2">dla:</td></tr>';
        $sql= 'model.IdKat='.$n['IdKat'].' and miejsce > 0 and model.IdUsr=uzytkownik.id and model.id=wyniki.IdMod';
        $pola='model.id, wyniki.miejsce, model.nazwa NazwaMod, CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) kto, rokur';
        $dyplomy = $dbcon->DajWartoscTabeli('model, uzytkownik, wyniki', $pola, $sql, '', 'wyniki.miejsce');
        foreach ($dyplomy as $d) {
          if ($d['miejsce']==4){
          $miejsce= 'Wyróżnienie';
          }
          else {
            $miejsce= $d['miejsce'];
          }
          if ($ACzyDyplom == 'tak') {
            $przycisk='<td><button id="btnDrukujDyplomMiejsce" type="submit" class="btn-info btn-block" onclick="drukujDyplom('.$d['id'].
                      ',0,2)">Dyplom</button></td>';
          }
          else {
            $przycisk='<td>'.$miejsce.'</td>';
          }
          $tabela.='<tr><td id="zawodnik_dyplom_nazwisko">'.$d['kto'].'</td><td id="zawodnik_dyplom_model">'.$d['NazwaMod'].'</td>'.$przycisk.'</tr>';
        }
        $tabela.='<tr><td colspan="3"> </td></tr></tbody>';
    }
    $tabela.='</table>';
    return $tabela;
  }
}

?>