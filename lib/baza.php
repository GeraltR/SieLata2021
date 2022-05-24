<?php
 require_once('stale.php');
 $user_id = 0;
 $user_name='';

class festiwal {
    public $serwer = 'localhost';
    public $uzytkownik = '22772_festiwal';
    public $haslo = '';
    public $nazwa_bazy = '22772_festiwal';
    public $dbcon;

    function __construct()
    {
      try {
         $this->haslo=$_SESSION['haslo_tajne'];
         $this->dbcon = new PDO('mysql:dbname='.$this->nazwa_bazy.';host='.$this->serwer,
                                $this->uzytkownik, $this->haslo,
                                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
         $this->dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     } catch (PDOException $e) {
         http_response_code(500);
         echo json_encode([
             'message' => 'Błąd podłączenia do dancyh: ' . $e->getMessage()
         ]);
     }
   }

   function close() {
     try {
      $this->dbcon->close();
     } catch (PDOException $e) {
         http_response_code(500);
         echo json_encode([
             'message' => 'Błąd podłączenia do dancyh: ' . $e->getMessage()
         ]);
      }

   }

   function DajWartoscTabeli($ATabela, $APola='*', $AWarunek='', $AGroup='', $AOrder='') {
      $sql = "SELECT ".$APola." FROM ".$ATabela.(($AWarunek!='') ? " WHERE ":"").$AWarunek.(($AGroup!='') ? " GROUP BY ".$AGroup : "").(($AOrder!='') ? " ORDER BY ".$AOrder : "");
      try {
          $wynik = $this->dbcon->prepare($sql);
          $wynik->execute();
          return $wynik;
      }
      catch (PDOException $e) {
          http_response_code(500);
          echo json_encode([
              'message' => 'Błąd DajWartoscTabeli: ' . $e->getMessage()
          ]);
      }

    }

    function WykonajSQL ($ASql, $ACoZwrocic=0) {
      try {
        $wynik = $this->dbcon->query($ASql);
        if (stripos($ASql,'insert') === 0) {
          $ACoZwrocic = $this->dbcon->lastInsertId();
        }
        return $ACoZwrocic;
      }
      catch (PDOException $e) {
          http_response_code(500);
          echo json_encode([
              'message' => 'Błąd WykonajZdanie: ' . $e->getMessage()
          ]);
      }
    }

    function Sprawdz($ATabela, $APole, $AWarunek='') {
      $sql = "SELECT ".$APole." FROM ".$ATabela.(($AWarunek!='') ? " WHERE ":"").$AWarunek." LIMIT 1";
      $sprawdz = 0;
      try {
         $wynik = $this->dbcon->query($sql);
         foreach ($wynik as $w) {
             $sprawdz = $w[$APole];
         }
         return $sprawdz;
      }
      catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    'message' => 'Błąd Sprawdz: ' . $e->getMessage()
                ]);
      }
    }

    function DajWiersz($ATabela, $APola='*', $AWarunek='', $AOrder='', $AGroup='') {
      $sql = "SELECT ".$APola." FROM ".$ATabela.(($AWarunek!='') ? " WHERE ":"").$AWarunek.(($AGroup!='') ? " GROUP BY ".$AGroup : "").(($AOrder!='') ? " ORDER BY ".$AOrder : "");
      try {
         $wynik = $this->dbcon->query($sql);

         return $wynik->fetch();
      }
      catch (PDOException $e) {
              http_response_code(500);
              echo json_encode([
                  'message' => 'Błąd DajWiersz: ' . $e->getMessage()
              ]);
      }
    }
    /*-----------------------
      funkcje dla użytkownika
    -------------------------*/

    function Zaloguj($AUserName, $AHaslo) {
      $haslo = md5($AHaslo);
      $wynik=$this->Sprawdz('uzytkownik', 'id', 'login="'.$AUserName.'" and haslo="'.$haslo.'"');
      return (int) $wynik;
    }

    function Zaloguj_Admina($AUserName, $AHaslo) {
      $haslo = md5($AHaslo);
      $wynik=$this->DajWiersz('uzytkownik', 'id, admin', 'login="'.$AUserName.'" and haslo="'.$haslo.'" and admin > 0');
      return $wynik;
    }

    function DajNazweUzytkownika($AId) {
      $wynik=$this->Sprawdz('uzytkownik', 'CONCAT_WS (" ",imie,nazwisko)', 'id='.$AId);
      return $wynik;
    }

    function CzyJestLogin ($AUserName) {
      $wynik=$this->Sprawdz('uzytkownik', 'id', 'login="'.$AUserName.'"');
      if (!isset($wynik)) $wynik=0;
      return $wynik;
    }

    function CzyJestOcena ($AIdMod, $AIdCri) {
      $sql = 'IdMod='.$AIdMod.' and IdSed='.$AIdCri;
      $wynik=$this->Sprawdz('zawodnicy', 'IdMod', $sql);
      if (!isset($wynik)) $wynik=1;
      return $wynik;
    }

    function WstawUzytkownika ($AIdUsr, $AImie, $ANazwisko, $ALogin, $AHaslo, $AEmail, $AMiasto, $ARok_urodzenia, $AKlub) {
      $haslo = md5($AHaslo);
      $kod = uniqid(rand());
      if (!isset ($AIdUsr))
        $AIdUsr = 0;
      if ($AIdUsr == 0)
         $sql = 'Insert into uzytkownik values ("","'.$AImie.'", "'.$ANazwisko.'", "'.$ALogin.'", "'.$haslo.'", "'.$AEmail.'", "'.$kod.'", NOW(), 1, "'.$AMiasto.'", '.$ARok_urodzenia.', "'.$AKlub.'", 0, "")';
      else $sql = 'update uzytkownik set imie="'.$AImie.'", nazwisko="'.$ANazwisko.'", haslo="'.$haslo.'", email="'.$AEmail.'", data = NOW(), miasto="'.$AMiasto.'", rokur='.$ARok_urodzenia.', klub="'.$AKlub.'" where id='.$AIdUsr;
      return $this->WykonajSQL($sql, $AIdUsr);
    }
    function WstawUzytkownikaBezHasla ($AIdUsr, $AImie, $ANazwisko, $ALogin, $AEmail, $AMiasto, $ARok_urodzenia, $AKlub, $AAdmin=0, $AHaslo) {
      $kod = uniqid(rand());
      if (!isset ($AIdUsr))
        $AIdUsr = 0;
      $dodatek='';
      if(!isset($AHaslo)){
        $AHaslo='';
      }
      if (strlen($AHaslo)){
        if ($AIdUsr == 0) {
          $dodatek=',haslo';
          $AAdmin= $AAdmin.' ,"'.md5($AHaslo).'"';
        }
        else {
          $dodatek=', haslo="'.md5($AHaslo).'" ';
        }
      }
      if ($AIdUsr == 0)
         $sql = 'Insert into uzytkownik (imie, nazwisko, login, email, kod, data, status, miasto, rokur, klub, admin'.$dodatek.')
                 values ("'.$AImie.'", "'.$ANazwisko.'", "'.$ALogin.'", "'.$AEmail.'", "'.$kod.'", NOW(), 1, "'.$AMiasto.'", '.$ARok_urodzenia.', "'.$AKlub.'", '.$AAdmin.')';
      else $sql = 'update uzytkownik set imie="'.$AImie.'", nazwisko="'.$ANazwisko.'", email="'.$AEmail.'", data = NOW(), miasto="'.$AMiasto.'", rokur='.$ARok_urodzenia.',
                   klub="'.$AKlub.'", admin='.$AAdmin.$dodatek.' where id='.$AIdUsr;
      return $this->WykonajSQL($sql, $AIdUsr);
    }

    function DajIdUzytkownika ($AIdMod){
      $wynik=$this->Sprawdz('model', 'IdUsr', 'id='.$AIdMod);
      return $wynik;
    }

    function Daj_Uzytkownika($AIdUsr){
      $sql = 'id='.$AIdUsr;
      $wynik=$this->DajWiersz('uzytkownik', 'id, imie, nazwisko, login, email, miasto, rokur, klub, kod', $sql);

      return $wynik;
    }

    function Daj_UnikalnyKod($ALogin){
      $sql='login="'.$ALogin.'"';
      $wynik=$this->DajWiersz('uzytkownik', 'kod,email', $sql);
      return $wynik;
    }

    function Zmien_Haslo($AKod, $AHaslo){
      $haslo=md5($AHaslo);
      $sql = 'update uzytkownik set haslo2="'.$haslo.'" where Kod="'.$AKod.'" and (haslo2="" or IsNull(haslo2))';
      $wynik = $this->WykonajSQL($sql);
      return $wynik;
    }

    function Aktywuj_Haslo($AKod){
      $kod = uniqid(rand());
      $sql = 'update uzytkownik set haslo=haslo2, data = NOW()  where kod="'.$AKod.'"';
      $wynik = $this->WykonajSQL($sql);
      $sql = 'update uzytkownik set kod="'.$kod.'", haslo2="" where kod="'.$AKod.'"';
      $wynik = $this->WykonajSQL($sql);
      return $wynik;
    }


    /*-------------------------------------
     funkcje obsługi modelu
    ---------------------------------------*/
    function Zmien_Model($AIdUsr, $AIdMod, $ANazwaMod, $ASkala, $AWydawca, $AIdKat){
      $ANazwaMod = htmlspecialchars(addslashes(strip_tags(trim($ANazwaMod))), ENT_QUOTES);
      $AWydawca = htmlspecialchars(addslashes(strip_tags(trim($AWydawca))), ENT_QUOTES);
      $ASkala = htmlspecialchars(addslashes(strip_tags(trim($ASkala))), ENT_QUOTES);
      $sql='';
      if (isset($AIdUsr)){
        if ($AIdUsr != 0){
          if (empty ($AIdMod)) {$AIdMod = 0;}
          if ($AIdMod == 0) {
            $konkurs = $this->DajWiersz('model', 'max(konkurs) as LP');
            if (empty($konkurs))
              {$LP = 0;}
            else $LP = $konkurs['LP'] + 1;
            if ($LP == null) $LP = 1;
            $sql = 'insert into model (IdUsr, IdKat, Nazwa, Producent, Skala, konkurs) values ('.$AIdUsr.','.$AIdKat.',"'.$ANazwaMod.
                  '", "'.$AWydawca.'", "'.$ASkala.'",'.$LP.')';
          }
          else {
            $sql = 'update model set IdKat='.$AIdKat.', Nazwa="'.$ANazwaMod.'", Producent="'.$AWydawca.'", Skala="'.$ASkala.'" where id = '.$AIdMod;
          }
        }
      }
      $this->WykonajSQL($sql);
    }

    function Daj_Model($AIdMod){
      $sql = 'model.id='.$AIdMod.' and model.IdKat = kategoria.idkat';
      $wynik=$this->DajWiersz('model, kategoria', 'model.id, model.IdKat, model.nazwa as nazwa, skala, producent, klasa,
                              CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) as katname, konkurs', $sql);

      return $wynik;
    }

    function Usun_Model($AIdMod){
      $sql = 'delete from model where id='.$AIdMod;
      $wynik = $this->WykonajSQL($sql);
      return $wynik;
    }

    /*-------------------------------------
      funkcje sędziowania
    ---------------------------------------*/
    function Dodaj_Ocene($AId, $APunkty, $AIdCri) {
      $sql = 'IdMod='.$AId.' and IdSed='.$AIdCri;
      $czyjest=$this->CzyJestOcena($AId, $AIdCri);
      if ($czyjest != 0) {
        $sql = 'update zawodnicy set wynik = '.$APunkty.', numer=0 where '.$sql;
      }
      else {
        $sql = 'insert into zawodnicy (IdMod, wynik, IdSed) values ('.$AId.', '.$APunkty.', '.$AIdCri.')';
      }
      $wynik=$this->dbcon->prepare($sql);
      $wynik->execute();
    }

    function Daj_Obecna_Ocene($AId, $AIdCri) {
      $sql = 'IdMod='.$AId.' and IdSed='.$AIdCri;
      $punkty=$this->Sprawdz('zawodnicy', 'wynik', $sql);
      if (!isset($punkty)) {
        $punkty=0;
      }
      if ($punkty == 0) {
        $punkty=$this->Sprawdz('zawodnicy', 'numer', $sql.' and numer = 4');
        if ($punkty == 4) {
          $wynik=$punkty;
        }
        else $wynik=0;
      }
      else {
        $wynik = $punkty;
      }
      return (int)$wynik;
    }

    function OcenaTekst($AWynik) {
      if ($AWynik == 4) {
        $punkty='W';
      }
      else {
        $punkty=$AWynik;
      }
      return $punkty;
    }

    function Ustaw_Wyroznienie($AId, $AIdCri) {
      $sql = 'IdMod='.$AId.' and IdSed='.$AIdCri;
      $wynik=$this->Sprawdz('zawodnicy', 'numer', $sql);
      if (isset ($wynik)) {
        if ($wynik == 4){
          $wyroznienie = 0;
        }
        else {
         $wyroznienie = 4;
        }
        $sql = 'update zawodnicy set numer = '.$wyroznienie.', wynik=0 where '.$sql;
      }
      else {
        $wyroznienie = 4;
        $sql = 'insert into zawodnicy (IdMod, numer, IdSed) values ('.$AId.', '.$wyroznienie.', '.$AIdCri.')';
      }
      $wynik=$this->dbcon->prepare($sql);
      $wynik->execute();
    }

    function IlePunktow($AIdKat, $AIdCri) {
      $sql = 'IdKat = '.$AIdKat.' and IdSed = '.$AIdCri.' and model.id = zawodnicy.IdMod';
      $zatwierzone = $this->DajWiersz('zawodnicy, model', 'sum(zawodnicy.wynik) ile', $sql);
      if (!isset($zatwierzone['ile'])) {
        $wynik = 0;
      }
      else {
        $wynik = $zatwierzone['ile'];
      }
      return (int)$wynik;
    }

    function CzyZatwierdzone($AIdKat, $AIdCri) {
      $sql = 'IdKat = '.$AIdKat.' and IdSed = '.$AIdCri.' and model.id = zawodnicy.IdMod';
      $zatwierzone = $this->DajWiersz('zawodnicy, model', 'max(flaga) ile', $sql);
      if (!isset($zatwierzone['ile'])) {
        $wynik = 0;
      }
      else {
        $wynik = $zatwierzone['ile'];
      }
      return (int)$wynik;
    }

    function Zatwierdz($AIdKat, $AIdCri) {
      $sql='insert into zawodnicy (IdMod, numer, Wynik, IdSed) select model.id, 0, 0, '.$AIdCri.' from model, uzytkownik where IdKat='.$AIdKat.' and '.
           ' model.IdUsr=uzytkownik.id and Year(now())-18 > rokur and '.
           'not exists (select * from zawodnicy where IdMod = model.id and IdSed='.$AIdCri.')';
      $this->WykonajSQL($sql);
      $sql='update zawodnicy, model set flaga = 1 where ';
      $sql.= 'IdKat = '.$AIdKat.' and IdSed = '.$AIdCri.' and model.id = zawodnicy.IdMod';
      $this->WykonajSQL($sql);
      $zatwierzone=$this->CzyZatwierdzone($AIdKat, $AIdCri);
      if (!isset($zatwierzone['ile'])) {
        $wynik = 0;
      }
      else {
        $wynik = $zatwierzone['ile'];
      }
      return (int)$wynik;
    }

    function CzyZatwierdzoneMiejsca($AIdKat) {
      $sql = 'IdKat = '.$AIdKat;
      $zatwierzone = $this->DajWiersz('wyniki', 'max(flaga) ile', $sql);
      if (!isset($zatwierzone['ile'])) {
        $wynik = 0;
      }
      else {
        $wynik = $zatwierzone['ile'];
      }
      return (int)$wynik;
    }

    function Daj_Obecne_Miejsce($AIdMod) {
      $sql = 'IdMod='.$AIdMod;
      $miejsce=$this->Sprawdz('wyniki', 'miejsce', $sql);
      if (!isset($miejsce)) {
        $miejsce=0;
      }
      else {
        $wynik = $miejsce;
      }
      return (int)$wynik;
    }

    function ustawMiejsce($AIdMod, $ARodzaj){
       $miejsce=$this->Daj_Obecne_Miejsce($AIdMod);
       if ($ARodzaj=='dodaj'){
          if ($miejsce >= 3){
            $miejsce = 3;
          }
          else {
            $miejsce = $miejsce + 1;
          }
       }
       else {
         if ($miejsce < 1) {
           $miejsce = 0;
         }
         else {
           $miejsce = $miejsce - 1;
         }
       }
       $sql='update wyniki set miejsce = '.$miejsce.' where IdMod='.$AIdMod.' and flaga=0';
       $this->WykonajSQL($sql);
    }

    function ustawWyroznienie($AIdMod){
      $miejsce=$this->Daj_Obecne_Miejsce($AIdMod);
      if ($miejsce == 4){
        $miejsce = 0;
      }
      else {
        $miejsce = 4;
      }
      $sql='update wyniki set miejsce = '.$miejsce.' where IdMod='.$AIdMod.' and flaga=0';
      $this->WykonajSQL($sql);
   }

    function zatwierdzMiejsca($AIdKat){
      $sql = 'update wyniki A set flaga=1 where IdKat = '.$AIdKat.
              ' and exists (select 1 from wyniki B where B.IdKat = A.IdKat and B.Miejsce > 0)';
      $wynik = $this->WykonajSQL($sql);
      return (int)$wynik;
    }

    function przeniesDoKategorii($AZrodlo, $ACel)
    {
      $sql = "update model, uzytkownik set model.IdParent = model.IdKat where model.IdUsr = uzytkownik.id
              and Year(now())-18 > rokur and model.IdParent is null and model.IdKat=$AZrodlo";
      $wynik = $this->WykonajSQL($sql);
      $sql =  "update model, uzytkownik set model.IdKat = $ACel where model.IdUsr = uzytkownik.id
               and Year(now())-18 > rokur and model.IdParent is not null and model.IdKat = $AZrodlo";
      $wynik = $this->WykonajSQL($sql);
      return (int)$wynik;
    }

    /*------------------------------------
      funkcje inne
    --------------------------------------*/
    function WstaNagrodeSpecjalna($ANazwa, $AOpis,$ARodzaj){
      $sql='insert into nagrody (nazwa_nagrody,info,rodzaj) values ("'.$ANazwa.'", "'.$AOpis.'",'.$ARodzaj.')';
      $wynik = $this->WykonajSQL($sql);
      return $wynik;
    }

    /*------------------------------------
      funkcje informacyjne
    -------------------------------------*/
    function Daj_IloscZawodnikow($AKogo=''){
      $group='';
      if ($AKogo=='zawodnikow' || stripos($AKogo, 'now()')>0){
        if ($AKogo=='zawodnikow') {
          $AKogo='';
        }
        else $AKogo = ' and '.$AKogo;
        $sql='EXISTS (select 1 from model where model.IdUsr = uzytkownik.id)'.$AKogo;
        $tabele='uzytkownik';
      }
      else {
        $sql='model.IdUsr = uzytkownik.id and model.IdKat = kategoria.idkat';
        if ($AKogo != '')
        $sql=$sql.' and '.$AKogo;
        $tabele='model, uzytkownik, kategoria';
      }
      $wynik=$this->DajWartoscTabeli($tabele, 'count(*) ilosc', $sql, $group);
      $ilosc=$wynik->fetch();
      return $ilosc['ilosc'];
    }

    function Zrob_Wyniki($AKlasa){
      $sql = 'SELECT IdSed FROM model,zawodnicy, kategoria where model.id=zawodnicy.IdMod and kategoria.idkat=model.IdKat
              and kategoria.klasa="'.$AKlasa.'" group by IdSed order by IdSed';
      $sprawdz = 0;
      $i=1;
      $wynik = $this->dbcon->query($sql);
      foreach ($wynik as $w) {
          $sql = 'SELECT IdMod, zawodnicy.wynik, IdKat FROM zawodnicy, model WHERE zawodnicy.IdMod = model.id and IdSed='.$w['IdSed'].
                 ' and flaga=1 order by konkurs';
          $Pole='wynik_'.$i;
          $zawodnicy=$this->dbcon->query($sql);
          foreach ($zawodnicy as $z) {
            $sprawdz = $this->Sprawdz('wyniki', 'IdMod', 'IdMod='.$z['IdMod']);
            if ($sprawdz==0){
              $sql='INSERT INTO wyniki (IdMod, IdKat, '.$Pole.') values ('.$z['IdMod'].', '.$z['IdKat'].', '.$z['wynik'].')';
            }
            else {
              $sql='UPDATE wyniki set '.$Pole.'='.$z['wynik'].' WHERE IdMod='.$z['IdMod'];
            }
            $this->WykonajSQL($sql);
          }
          $i=$i+1;
      }
      $sql='UPDATE wyniki set suma=wynik_1+wynik_2+wynik_3+wynik_4+wynik_5+wynik_6';
      $this->WykonajSQL($sql);
      return $sprawdz;
    }
}


?>