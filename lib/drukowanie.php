<?php
require_once('baza.php');

class drukowanie {

  function __construct(){

  }

  function DajNaglowek() {
    $wynik = '<div id="kartka" style="page-break-after: always; text-align: center;"><table>
                <thead>
                    <tr>
                        <th class="duze" colspan="5">KARTA DLA ORGANIZATORA</th>
                        <th class="duze" colspan="5">KARTA POD MODEL</th>
                        <th  class="duze" colspan="5">KARTA ODBIORU MODELU</th>
                    </tr>
                    <tr><th class="male" colspan="5" rowspan="2">XII Festiwal Modelarski Jaworzno</br>10 - 11 wrzesień 2022</th>
                        <th class="male" colspan="5" rowspan="2">XII Festiwal Modelarski Jaworzno</br>10 - 11 wrzesień 2022</th>
                        <th class="male" colspan="5" rowspan="2">XII Festiwal Modelarski Jaworzno</br>10 - 11 wrzesień 2022</th>
                    </tr>
                <thead><tbody>';
     return $wynik;
  }

  function DajSekOne(){
      $wynik = '<td>Numer startowy</br><p>[NS]</p></td><td colspan="3">Klasa modelu</br><p class="pmale">[KM]</p></td>
                <td>Kategoria wiekowa</br><p>[KW]</p></td>';//x3
      return $wynik;
  }

  function DajSekTwo(){
      $wynik = '<td colspan="5">Nazwa modelu</br><p class="pleft">[NazwaModelu]</p></td>'; //3x
      return $wynik;
  }

  function DajSekZawodnika(){
    $wynik = '<td colspan="5">Imię i nazwisko</br><p class="pleft">[Zawodnik]</p></td>'; //1x
    return $wynik;
  }

  function DajSekProdISkala(){
      $wynik = '<td colspan="4">Producent/wydawnictwo</br><p class="pleft">[Producent]</p></td><td colspan="1">Skala<p>[Skala]</p></td>';//2x
      return $wynik;
  }

  function DajStopke(){
      $wynik = '</tbody><tfoot>
                    <tr>
                        <td colspan="5">Klub, miejscowość<p class="pleft">[KlubMiasto]</p></td>
                        <td colspan="5" class="bigtd">PROSIMY NIE DOTYKAC MODELI</td>
                        <td colspan="5" class="tstopka">Prosimy o okazanie przy odbieraniu modelu</td>
                    </tr>
                </tfoot>
                </table>
                <div style="margin-top: 5px;">
                <div style="width:47%;text-align:right;float:left;">
                <p style="margin-right: 5px;margin-top:10px;font-size:16px;">©2022</p>
                </div>
                <div style="width:50%;text-align:left;float:left;">
                <img style="text-align:left;" src="../assets/onepage2/img/sielata_logo_druk_new_bw.gif" alt="SieLata">
                </div>
                </div>
                </div>';
       return $wynik;
  }

  function DajKategorieWiek($AWiek){
    if ($AWiek < 14) $wynik = 'młodzik';
    if ($AWiek > 14 && $AWiek <= 18) $wynik = 'junior';
    if ($AWiek > 18) $wynik = 'senior';
    return $wynik;
  }

  function DrukowanieKart($ACzySenior='n', $ACzyJunMlo='n', $ACzyKarton='n', $ACzyPlastik='n', $ASort=0, $AIdMod=0, $AOdNumeru=1) {
    $dbcon = new festiwal;

    $sql=' and konkurs >= '.$AOdNumeru;
    $order='';

    if ($AIdMod==0) {
        if ($ACzySenior=='t') {
            $sql.=' and Year(now())-18 > rokur';
        }
        if ($ACzyJunMlo=='t') {
            $sql.=' and Year(now())-18 <= rokur';
        }
        if ($ACzyKarton=='t') {
            $sql.=' and kategoria.klasa="K" ';
        }
        if ($ACzyPlastik=='t') {
            $sql.=' and kategoria.klasa="P"';
        }
    }
    else $sql=' and model.id='.$AIdMod;
    switch ($ASort) {
        case '0': $order='model.konkurs';
                break;
        case '1': $order='kategoria.symbol, model.konkurs';
                break;
        case '2': $order='uzytkownik.nazwisko, uzytkownik.imie, model.konkurs';
                break;
        case '3': $order='kategoria.symbol, ocena';
                break;
    }
    $tabela='';
    $wynik = $dbcon->DajWartoscTabeli('model, kategoria, uzytkownik',
                                        'model.id, model.konkurs, model.nazwa nazwaM, model.IdUsr, model.skala, model.Producent, '.
                                        'CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) kateg, kategoria.symbol,'.
                                        'CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) nazwaU, uzytkownik.rokur, '.
                                        '0 ocena, Year(now())-uzytkownik.rokur wiek,  '.
                                        'CONCAT_WS (" ", uzytkownik.klub, uzytkownik.miasto) klubmiasto',
                                        'model.IdKat = kategoria.idkat and model.IdUsr=uzytkownik.id '.$sql,
                                        '',
                                        $order);
    $k=$wynik->rowCount(); $i=0;
    foreach ($wynik as $w) {
        $i=$i+1;
        $nag= $this->DajNaglowek();
        if ($k==$i){
           $nag=str_replace('style="page-break-after: always;"', '', $nag);
        }
        $daneOne= $this->DajSekOne();
        $daneTwo=$this->DajSekTwo();
        $zawodnik=$this->DajSekZawodnika();
        $prodIskala=$this->DajSekProdISkala();
        $foot=$this->DajStopke();

        $daneOne=str_replace('[NS]', $w['konkurs'], $daneOne);
        $daneOne=str_replace('[KM]', $w['kateg'], $daneOne);
        $daneOne=str_replace('[KW]', $this->DajKategorieWiek($w['wiek']), $daneOne);
        $daneTwo=str_replace('[NazwaModelu]', $w['nazwaM'], $daneTwo);
        $zawodnik=str_replace('[Zawodnik]', $w['nazwaU'], $zawodnik);
        $prodIskala=str_replace('[Producent]', $w['Producent'], $prodIskala);
        $prodIskala=str_replace('[Skala]', $w['skala'], $prodIskala);
        $foot=str_replace('[KlubMiasto]', $w['klubmiasto'], $foot);
        $tabela.= $nag.'<tr>'.$daneOne.$daneOne.$daneOne.'</tr><tr>'.$daneTwo.$daneTwo.$daneTwo.'</tr><tr>'.$zawodnik.$prodIskala.$prodIskala.'</tr>'.$foot;
        $tabela.='<p></p>';
    }

    $wynik ='<div id="kartystartowe">'.$tabela.'</div>';
    return $wynik;
  }

  function DrukowanieDyplomu($AIdMod, $ANagroda, $ARodzaj=0){
    $zawodnik='';
    $model='';
    $nazwaNagrody='';
    $info='';
    $wynik='';
    $dbcon = new festiwal;
    $nagrodzone = $dbcon->DajWartoscTabeli('model, uzytkownik',
                                      'model.nazwa nazwaM, CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) nazwaU',
                                      'model.IdUsr=uzytkownik.id and model.id='.$AIdMod);
    foreach($nagrodzone as $n)
    {
        $zawodnik=$n['nazwaU'];
        $model=$n['nazwaM'];
    }
    //nagrody specjalne
    if ($ARodzaj==1){
      $nagrodaSpec=$dbcon->DajWartoscTabeli('nagrody', 'nazwa_nagrody, info', 'id='.$ANagroda);
      foreach($nagrodaSpec as $ns){
        $nazwaNagrody=$ns['nazwa_nagrody'];
        $info=$ns['info'];
      }
    }
    //Dyplomy i wyróżnienia z miejscem
    if ($ARodzaj>1 & $ARodzaj<4){
        $nagroda=$dbcon->DajWartoscTabeli('wyniki,kategoria', 'miejsce,CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) kateg',
                                              'miejsce>0 and wyniki.IdKat= kategoria.IdKat and IdMod='.$AIdMod, '', 'kategoria.klasa, kategoria.symbol, miejsce');
        foreach($nagroda as $n){
            $nazwaNagrody=$n['miejsce'];
            $info=$n['kateg'];
        }
    }
    //Dyplomy dla młodzików i juniorów
    if ($ARodzaj == 5) {
        $nazwaNagrody='';
        $info='udział w XII Festiwalu Modelarskim w Jaworznie';
    }
    //odstęp od góry
    for ($i = 1; $i <= 13; $i++){
        $wynik.='</br>';
    }
    if($ARodzaj==1) {
        $wynik.='<p id="naglowek">DYPLOM</p>';
        $wynik.='</br>';
        $wynik.='<p id="nagroda">'.$nazwaNagrody.'</p>';
        $wynik.='</br>';
        $wynik.='<p id="rodzaj">'.$info.'</p>';
        $wynik.='</br></br>';
        $wynik.='<p id="zawodnik">'.$zawodnik.'</p>';
        $wynik.='<p id="model">'.$model.'</p>';
    }
    if($ARodzaj>1 & $ARodzaj!=5){
        if ($nazwaNagrody!=4){
          $wynik.='<p id="naglowek">DYPLOM</p>';
        }
        else {
            $wynik.='<p id="naglowek">WYRÓŻNIENIE</p>';
        }
        $wynik.='</br>';
        $wynik.='<p>dla</p>';
        $wynik.='<p id="zawodnik">'.$zawodnik.'</p>';
        if ($nazwaNagrody!=4){
          $wynik.='<p id="nagroda">'.$nazwaNagrody.' miejsce</p>';
        }
        $wynik.='</br><p>za</p>';
        $wynik.='<p id="model">'.$model.'</p>';
        $wynik.='</br><p>w kategorii</p>';
        $wynik.='<p id="rodzaj">'.$info.'</p>';
    }
    else {
        if ($ARodzaj==5){
            $wynik.='<p id="naglowek">DYPLOM</p>';
            $wynik.='</br></br>';
            $wynik.='<p>dla</p>';
            $wynik.='<p id="zawodnik">'.$zawodnik.'</p>';
            $wynik.='</br><p>za</p>';
            $wynik.='<p id="rodzaj">'.$info.'</p>';

        }
    }
    $wynik.='</div>';
    return $wynik;
  }

  function DrukowanieDyplomow($AIdMod, $ANagroda, $ARodzaj=0){
    $i=0;
    $wynik='<div id="Dyplom" style="width:100%">';
    if ($ARodzaj==3){
       $dbcon=new festiwal;
       $nagroda=$dbcon->DajWartoscTabeli('wyniki,kategoria', 'IdMod', 'miejsce>0 and wyniki.IdKat=kategoria.idkat', '', 'kategoria.klasa, kategoria.symbol, miejsce');
       $k=$nagroda->rowCount();
       foreach ($nagroda as $n) {
           $wynik.=$this->DrukowanieDyplomu($n['IdMod'], $ANagroda, $ARodzaj);
           if ($i < $k){
            $wynik.='<p id="nowa_strona" style="page-break-after: always;">  </p>';
           }
           $i++;
       }
    }
    else {
       if ($ARodzaj==5){ //lista dla mlodzikow i juniorow
        $dbcon=new festiwal;
        $nagroda=$dbcon->DajWartoscTabeli('uzytkownik, model, kategoria', 'max(model.Id) IdMod',
                 'uzytkownik.id = model.IdUsr and model.IdKat = kategoria.idkat and uzytkownik.rokur + 17 >= 2022',
                 'uzytkownik.id', 'kategoria.klasa, kategoria.symbol, model.konkurs');
        $k=$nagroda->rowCount();
        foreach ($nagroda as $n) {
            $wynik.=$this->DrukowanieDyplomu($n['IdMod'], $ANagroda, $ARodzaj);
            if ($i < $k){
             $wynik.='<p id="nowa_strona" style="page-break-after: always;">  </p>';
            }
            $i++;
        }
       }
       else {
           $wynik.=$this->DrukowanieDyplomu($AIdMod, $ANagroda, $ARodzaj);
       }
    }
    $wynik.='</div>';
    return $wynik;
  }

  function DajNaglowekListy(){
    $wynik = '<div id="Lista" style="page-break-after: always; text-align: center; width:50%;"><table class="table table-striped" style="padding: 15px;width:50%">
                <h3>Lista młodzik i junior</h3>
                <thead>
                    <tr>
                        <th style="text-align: center;" >Nazwisko i imie</th>
                        <th style="text-align: center;" > </th>
                        <th style="text-align: center;" >Rok urodzenia</th>
                        <th style="text-align: center;" > </th>
                        <th style="text-align: center;" >Kategoria</th>
                    </tr>
                </thead><tbody>';
    return $wynik;
  }

  function DajStopkeListy(){
      $wynik = '</tbody>
                </table>
                </div>';
      return $wynik;
  }

  function DajNaglowekListyWynikow(){
    $wynik = '<div id="Lista" style="page-break-after: always; text-align: center; width:50%;"><table class="table table-striped" style="padding: 15px;width:70%">
                <h3>Lista seniorów nagrodzonych (bez nagród specjalnych)</h3>
                <thead>
                    <tr style="border: 1px solid #dddddd;">
                        <th style="text-align: center;" >Klasa</th>
                        <th style="text-align: center;" >Kategoria</th>
                        <th style="text-align: center;" >Miejsce</th>
                        <th style="text-align: center;" >Nazwisko i imie</th>
                        <th style="text-align: center;" >Nr startowy</th>
                        <th style="text-align: center;" >Nazwa modelu</th>
                    </tr>
                </thead><tbody>';
    return $wynik;
  }

  function DrukowanieListy ($ARodzaj){
    $tabela=''; $i=0;
    $wynik=$this->DajNaglowekListy();
    //lista młodzików i juniorów
    $dbcon=new festiwal;
    $lista = $dbcon->DajWartoscTabeli('model, kategoria, uzytkownik',
            'kategoria.klasa,'.
            'CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) nazwaU, uzytkownik.rokur, '.
            'Year(now())-uzytkownik.rokur wiek,  '.
            'CONCAT_WS (" ", uzytkownik.klub, uzytkownik.miasto) klubmiasto',
            'model.IdKat = kategoria.idkat and model.IdUsr=uzytkownik.id and uzytkownik.rokur+17 >= 2022',
            'uzytkownik.imie, uzytkownik.nazwisko, kategoria.klasa, uzytkownik.klub, uzytkownik.miasto,uzytkownik.rokur',
            'uzytkownik.nazwisko, uzytkownik.imie');
    $td='<td style="text-align: center;">';
    foreach ($lista as $w) {
        $i=$i+1;
        $tabela.= '<tr>'.$td.$w['nazwaU'].'</td>'.$td.'</td>'.$td.$w['rokur'].'</td>'.$td.'</td>'.$td.$w['klasa'].'</td></tr>';

    }
    $tabela.='<p></p>';
    $wynik.= $tabela;
    $wynik.=$this->DajStopkeListy();
    $wynik.='<br /><br />';

    $tabela='';
    $wynik.=$this->DajNaglowekListyWynikow();

    $td='<td style="text-align: center;width:50px;">';
    $tdimieNazwisko='<td style="text-align: center;width:250px;">';
    $lista = $dbcon->DajWartoscTabeli('wyniki,kategoria, model, uzytkownik',
             'kategoria.klasa, kategoria.symbol, wyniki.miejsce, CONCAT_WS (" ", uzytkownik.imie, uzytkownik.nazwisko) nazwaU, model.konkurs, model.Nazwa',
             'miejsce>0 and wyniki.IdKat=kategoria.idkat and model.Id = wyniki.IdMod and model.IdUsr = uzytkownik.id', '',
             'kategoria.klasa, kategoria.symbol, miejsce');

    foreach ($lista as $s) {
        $tabela.= '<tr style="border: 1px solid #dddddd;">'.$td.$s['klasa'].'</td>'.$td.$s['symbol'].'</td>'.$td.$s['miejsce'].'</td>'.$tdimieNazwisko.$s['nazwaU'].'</td>'.$td.$s['konkurs'].'</td>'.$td.$s['Nazwa'].'</td></tr>';

    }
    $tabela.='<p></p>';
    $wynik.= $tabela;
    $wynik.=$this->DajStopkeListy();

    return $wynik;
}

}

