//Sterowanie widocznością gridów
function UkryjKontrolki(){
    $('#info_dlaAdmina').hide();
    $('#info_AdminFiltr').hide();
    $('#lista_wynikow').hide();
    $('#rodzaj').hide();
    $('#kategoria').hide();
    $('#ocenianie').hide();
    $('#seniorzy').hide();
    $('#wprowadzanie_zawodnika').hide();
    $('#modele_zawodnika').hide();
    $('#dodaj_modele').hide();
    $('#nagrodySpecjalne').hide();
    $('#ListyDrukowanie').hide();
    $('#wyniki').hide();

}
function UkryjPrzyciski(){
    $('#btnEksportCSV').hide();
    $('#btnListaZawodnikow').hide();
    $('#btnOcenianie').hide();
    $('#btnListaWynikow').hide();
    $('#btnNagrodySpecjalne').hide();
    $('#btnWprowadzanieZawod').hide();
    $('#btnDrukowanieDyplomow').hide();
}

//Filtrowanie listy zaworników
function infoAdminFiltruj() {
    var czysenior='n';
    var czymlodz='n';
    var czykarton='n';
    var czyplastik='n';
    if ($('#cbseniorzy').is(':checked')) {
        czysenior='t';
    }
    if ($('#cbmlodjun').is(':checked')) {
        czymlodz='t';
    }
    if ($('#cbkarton').is(':checked')) {
        czykarton='t';
    }
    if ($('#cbplastik').is(':checked')) {
        czyplastik='t';
    }
    $.ajax({
        type: 'POST',
        url:'ajax_infoAdminaListaZawodnikow.php',
        data:{czyseniorzy: czysenior,
              czymodzicy: czymlodz,
              czykarton: czykarton,
              czyplastik: czyplastik,
              jakiorder: $("#info_AdminFiltr").val()
             },
        success:function(html){
            $('#info_AdminListaZawodnikow').html(html);
        }

    })
}

//Wydruk karty startowej
function kartaPrint(AIdMod){
    var czysenior='n';
    var czymlodz='n';
    var czykarton='n';
    var czyplastik='n';
    if ($('#cbseniorzy').is(':checked')) {
        czysenior='t';
    }
    if ($('#cbmlodjun').is(':checked')) {
        czymlodz='t';
    }
    if ($('#cbkarton').is(':checked')) {
        czykarton='t';
    }
    if ($('#cbplastik').is(':checked')) {
        czyplastik='t';
    }
    var jakiorder = $("#info_AdminFiltr").val();
    var odnumeru = $('#kartaOdNumeru').val();
    //window.location
    window.open('drukujks.php?czysenior='+czysenior+'&czymlodz='+czymlodz+'&czykarton='+czykarton+'&czyplastik='+czyplastik+
                      '&jakiorder='+jakiorder+'&idmod='+AIdMod+'&odnumeru='+odnumeru, '_blank');
}
//Wydruk dyplomu
function drukujDyplom(AIdMod,ANagroda,ARodzajNag){
   window.open('dyplom.php?idmod='+AIdMod+'&nagroda='+ANagroda+'&rodzaj='+ARodzajNag);
};

function DrukujListeMlodzikJunior(){
    window.open('lista.php?jaka=MlodzikJunior');
}

//Ustawia rodzaj i kategorię modelu
function ustaw_kategorie(AJakie, ACo){
    $.ajax({
        type:'POST',
        url:'../ajax_kategorie.php',
        data:'rodzaj_id='+AJakie,
        success:function(html){
          $('#kategoriamodelu').html(html);
          $('#kategoriamodelu').val(ACo);
        }
        });
};
//formularz wprowadzania modeli zawodnika
function modele_zawodnka (AIdUsr){
    var idusr =0;
    if (AIdUsr == undefined)
       idusr = $('#idusr').val();
    else idusr = AIdUsr;
    $.ajax({
          type:'POST',
          url: '../ajax_pokazmodele.php',
          data: 'idusr='+idusr+'&admin=tak',
          success: function (html){
            $('#dodaj_modele').show(0);
            $('#modele_zawodnika').html(html);
            $('#modele_zawodnika').show(0);
          },
          error: function() {
            $('#modele_zawodnika').html('<table id="modele_zawodnika" style="display:none;"></table>');
          }
    })
}
//Obsługa formularza z modelem
function model_zmien(AIdMod){
    var idmod = 0;
    if (AIdMod == undefined)
      idmod = $('#modelid')
    else idmod = AIdMod;
    $.ajax({
       type: 'POST',
       url: '../ajax_model.php',
       data: 'idmod='+idmod,
       success: function(dane){
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

function wybierzZawodnika(AIdUsr){
    $('#idusr').val(AIdUsr);
    $.ajax({
        type: 'POST',
        url: '../ajax_dajzawodnika.php',
        data: 'IdUsr='+$('#idusr').val(),
        success: function(dane){
            $('#dane_zawodnika').hide();
            $('#imie').val(dane.uzytkownik.imie);
            $('#nazwisko').val(dane.uzytkownik.nazwisko);
            $('#username_adminrej').val(dane.uzytkownik.login);
            $('#email').val(dane.uzytkownik.email);
            $('#miasto').val(dane.uzytkownik.miasto);
            $('#rok_urodzenia').val(dane.uzytkownik.rokur);
            $('#klub').val(dane.uzytkownik.klub);
        }
    });
}

function nagrodzZawodnika(AIdUsr){
    var idnag = $('#looknagrodySpecjalne').val();
    $.ajax({
        type:'POST',
        url:'../admin/ajax_nagrodaspecjalna4model.php',
        data:{
            idusr: AIdUsr,
            idnag: idnag
        },
        success: function(dane){
           $('#modele_nagrodySpec').html(dane);
        }
    })
}

function obliczWyniki(AKategoria, ACzyoblicz='tak'){
    $.ajax({
        type:'POST',
        url:'../admin/ajax_obliczWyniki.php',
        data:{
            kategoria: AKategoria,
            oblicz: ACzyoblicz
        },
        success: function(html){
            $('#wyniki_zawodow').show();
            $('#wyniki_zawodow').html(html);
        }
    })
}
function wynik_dodaj(AIdMod, AIdKat){
  $.ajax({
      type:'POST',
      url:'../admin/ajax_ustawMiejsce.php',
      data:{
          idmod: AIdMod,
          idkat: AIdKat,
          rodzaj: 'dodaj'
      },
      success: function(html){
        $('#wyniki_zawodow').show();
        $('#wyniki_zawodow').html(html);
      }
  })
}
function wynik_minus(AIdMod, AIdKat){
    $.ajax({
        type:'POST',
        url:'../admin/ajax_ustawMiejsce.php',
        data:{
            idmod: AIdMod,
            idkat: AIdKat,
            rodzaj: 'odejmij'
        },
        success: function(html){
            $('#wyniki_zawodow').show();
            $('#wyniki_zawodow').html(html);
        }
    })
}
function wynik_wyroznij(AIdMod, AIdKat){
    $.ajax({
        type:'POST',
        url:'../admin/ajax_ustawMiejsce.php',
        data:{
            idmod: AIdMod,
            idkat: AIdKat,
            rodzaj: 'wyroznienie'
        },
        success: function(html){
            $('#wyniki_zawodow').show();
            $('#wyniki_zawodow').html(html);
        }
    })
}

function zatwierdzMiejsca(AIdKat) {
    $.ajax({
        type:'POST',
        url:'../admin/ajax_zatwierdzMiejsca.php',
        data:{
            idkat: AIdKat,
            kategoria: $('#wynikrodzajmodelu').val()
        },
        success: function(html){
            $('#wyniki_zawodow').show();
            $('#wyniki_zawodow').html(html);
        }
    })
}

//******************************************************************************* */
//*                         Skrypty wewnątrz dokumentu                            */
//******************************************************************************* */
$(document).ready(function(){
    UkryjPrzyciski();
    $.ajax({
        type:'POST',
        url:'../admin/ajax_kto.php',
        success:function(dane){
            if (dane.admin.id != 0){
                $('#admin_id').val(dane.admin.id);
                $('#admin_name').val(dane.admin.nazwa);
                $('#admin').val(dane.admin.upraw);
                $('#KtoNazwa').html('Zalogowany jako: '+dane.admin.nazwa+'<b class="caret">');
                if (dane.admin.upraw != 1) {
                   UkryjPrzyciski();
                   $('#btnOcenianie').show();
                }
                else {
                    $('#btnEksportCSV').show();
                    $('#btnListaZawodnikow').show();
                    $('#btnOcenianie').show();
                    $('#btnNagrodySpecjalne').show();
                    $('#btnListaWynikow').show();
                    $('#btnWprowadzanieZawod').show();
                    $('#btnDrukowanieDyplomow').show();
                }
            }
            else {
                UkryjPrzyciski();
                window.location='index.php';
            }
        }
    })

    $('#mnuWyloguj').click(function(){
        $('#admin_id').val('');
        $('#admin_name').val('');
        $('#admin').val('');
        $('#KtoNazwa').html('Niezalogowany');
        $.ajax({
            url:'ajax_wyloguj.php',
            success:function(){
              UkryjKontrolki();
              window.location='index.php';
            }
        })
    })

    //Pokazano Papier lub karton do oceny
    $('#rodzaj').show (function(){
        UkryjKontrolki();
        var rodzaj = $('#rodzaj').val();
        $.ajax({
              type:'POST',
              url:'../ajax_kategorie.php',
              data:'rodzaj_id='+rodzaj,
              success:function(html){
                $('#kategoria').html(html);
                $('#przeniesdokateorii').html(html);
            }
        });
    })
    //Pokazano Papier lub karton do wprowadzania
    $('#rodzajmodelu').show (function(){
        //UkryjKontrolki();
        var rodzaj = $('#rodzajmodelu').val();
        $.ajax({
              type:'POST',
              url:'../ajax_kategorie.php',
              data:'rodzaj_id='+rodzaj,
              success:function(html){
                $('#kategoriamodelu').html(html);
            }
        });
    })
    //Pokazano Papier lub Karton do obliczania i pokazywania list wyników
    $('#wynikrodzajmodelu').show(function(){
        var rodzaj=$('#wynikrodzajmodelu').val();
        $.ajax({
            type:'POST',
            url:'../ajax_kategorie.php',
            data:'rodzaj_id='+rodzaj,
            success:function(html){
                $('#wynikkategoriamodelu').html(html);
                $('#wyniki_zawodow').hide();
            }
        });
    })

    //Wybrano Papier lub Karton w ocenianiu
    $('#rodzaj').change(function(){
        var rodzaj=$('#rodzaj').val();
        $.ajax({
            type:'POST',
            url:'../ajax_kategorie.php',
            data:'rodzaj_id='+rodzaj,
            success:function(html){
                $('#kategoria').html(html);
                $('#przeniesdokateorii').html(html);
            }
        });
    })
    //Wybrano Papier lub Karton do wprowadzania
    $('#rodzajmodelu').change(function(){
        var rodzaj=$('#rodzajmodelu').val();
        $.ajax({
            type:'POST',
            url:'../ajax_kategorie.php',
            data:'rodzaj_id='+rodzaj,
            success:function(html){
                $('#kategoriamodelu').html(html);}
        });
    })
    //Wybrano Papier lub Karton do obliczania i pokazywania list wyników
    $('#wynikrodzajmodelu').change(function(){
        var rodzaj=$('#wynikrodzajmodelu').val();
        $.ajax({
            type:'POST',
            url:'../ajax_kategorie.php',
            data:'rodzaj_id='+rodzaj,
            success:function(html){
                $('#wynikkategoriamodelu').html(html);
                obliczWyniki($('#wynikrodzajmodelu').val(),'nie');
            }
        });
    })
    //odswież widok listy miejsc zawodników wg klasy
    $('#wynikkategoriamodelu').change(function(){
        if ($('#wynikkategoriamodelu').val() != 0){
            $.ajax({
                type:'POST',
                url:'../admin/ajax_ustawMiejsce.php',
                data:{
                    idmod: 0,
                    idkat: $('#wynikkategoriamodelu').val()
                },
                success: function(html){
                    $('#wyniki_zawodow').show();
                    $('#wyniki_zawodow').html(html);
                }
            })
        }
        else {
            $('#wyniki_zawodow').hide();
        }
    })

    //Pokaz listy rejestracji
    $('#btnListaZawodnikow').click(function(){
        UkryjKontrolki();
        $('#info_dlaAdmina').show();
        $('#info_AdminFiltr').show();
        $.ajax({
            type:'POST',
            url:'ajax_info_dlaAdmina.php',
            success:function(html){
                $('#info_dlaAdminaTable').html(html);
                infoAdminFiltruj();
            }
        })
    })

    //Przycisk filtrowania listy zawodników
    $('#btnListaFiltr').click(function(){
        infoAdminFiltruj();
    })

    //czyszczenie idusr rejestrowanego
    $('#zrezygnujRejZaw').click(function(){
      $('#idusr').val(0);
      UkryjKontrolki();

    })

    //Pokaż panel dla sędziów
    $('#btnOcenianie').click(function(){
        UkryjKontrolki();
        $('#ocenianie').show();
        $('#rodzaj').show();
        $('#kategoria').show();
        $('#seniorzy').show();
    })

    //Dodaj nagrodę specjalną
    $('#btnwstawNagrodeSpecjalna').click(function(){
        $.ajax({
            type:'POST',
            url:'../admin/ajax_dodajNagrodeSpecjalna.php',
            data:{
                nazwa:$('#dodajNagrodeSpecjalna').val(),
                opis: $('#dodajOpisNagrodeSpecjalna').val(),
                rodzaj: $('#lookNazwaNagrody').val()
            },
            success: function(dane){
               $('#looknagrodySpecjalne').html(dane.widok);
               $('#dodajNagrodeSpecjalna').val('');
               $('#dodajOpisNagrodeSpecjalna').val('');
            }
        })
    })

    //Nagrody Specjalne
    $('#btnNagrodySpecjalne').click(function(){
        UkryjKontrolki();
        $.ajax({
            type:'POST',
            url:'../admin/ajax_dodajNagrodeSpecjalna.php',
            success: function(dane){
                $('#looknagrodySpecjalne').html(dane.widok);
                $('#modele_nagrodySpec').html(dane.lista);
            }
        })
        $('#nagrodySpecjalne').show();
    })

    $('#btnukryjWyszukiwanie').click(function(){
        $('#listaznalezionychzawodnikow').hide();
        $('#szukajzawodnika').val('');
    })

    //wprowadzanie nagród pokaż
    $('#btnListaWynikow').click(function(){
        UkryjKontrolki();
        $('#lista_wynikow').show();

    })

    //obliczanie listy wyników
    $('#oblicz').click(function(){
        obliczWyniki($('#wynikrodzajmodelu').val());
    })
    $('#wynikiAll').click(function(){
        obliczWyniki($('#wynikrodzajmodelu').val());
    })


    //***** SEKCJA REJESTRACJI ZAWODNIKOW */
    //Pokazywanie formularza do Rejestracji zawodnika
    $('#btnWprowadzanieZawod').click(function(){
        UkryjKontrolki();
        $('#wprowadzanie_zawodnika').show();
        if ($('#admin').val()==1){
            $('#uprawnieniaZawodnika').show();
            $('#userpassword_rej').show();
            $('#userpassword_rej').val('');
        }
        else{
            $('#uprawnieniaZawodnika').hide();
            $('#uprawnieniaZawodnika').val(0);
            $('#userpassword_rej').hide();
            $('#userpassword_rej').val('');
        }
    })
    //Wstaw lub zmień dane zawodnka
    $('#dodajzawodnika').click(function(){
        UkryjKontrolki();
        $.ajax({
            type: 'POST',
            url: '../admin/ajax_admindodajzawodnika.php',
            data: {
                idusr: $('#idusr').val(),
                imie: $('#imie').val(),
                nazwisko: $('#nazwisko').val(),
                username_rej: $('#username_adminrej').val(),
                email: $('#email').val(),
                miasto: $('#miasto').val(),
                rok_urodzenia: $('#rok_urodzenia').val(),
                klub: $('#klub').val(),
                admin: $('#uprawnieniaZawodnika').val(),
                haslo: $('#userpassword_rej').val()
            },
            success: function(data){
                var blad = '';
                if(data.error_imie.exists==true){
                    $('#imie').attr('style','border: solid 2px red');
                    blad = data.error_imie.message;
                }
                else{
                    $('#imie').attr('style','border: solid 2px lightgreen');
                }
                if(data.error_nazwisko.exists==true){
                    $('#nazwisko').attr('style','border: solid 2px red');
                }
                else {
                    $('#nazwisko').attr('style','border: solid 2px lightgreen');
                }
                if(data.error_rok_urodzenia.exists==true){
                    $('#rok_urodzenia').attr('style','border: solid 2px red');
                }
                else {
                    $('#rok_urodzenia').attr('style','border: solid 2px lightgreen');
                }
                if (blad.length > 1) {
                    if (data.error_username_rej.typ === 0)
                    alert ('Formularz nie jest wypełniony prawidłowo.')
                    else {
                        alert ('Wybrany login jest zajęty');
                        $('#username_adminrej').attr('style','border: solid 2px red');
                    }
                    $('#wprowadzanie_zawodnika').show(0);
                }
                else {
                    var idusr = data.uzytkownik.idusr;
                    if (idusr != null && idusr != 0){
                        $('#idusr').val(idusr);
                        $('#modele_zawodnika').show(0);
                        $('#zawodnik').html('Rejestracja dla: ' + data.uzytkownik.nazwa);
                        modele_zawodnka (idusr);
                    }
                    else {
                        $('#idusr').val(0);
                        $('#zawodnik').html('Zupełnie nikt');
                        $('#modele_zawodnika').show(0);
                    }
                }
            }
        });
    });
    //Wyszukiwanie po nazwisku
    $('#nazwisko').keyup(function(){
        var szukane = $('#nazwisko').val();
        if (szukane.length > 1) {
            $.ajax({
                type: 'POST',
                url: '../admin/ajax_filtrzawodnika.php',
                data: 'nazwisko='+szukane,
                success: function(html){
                    $('#dane_zawodnika').show();
                    $('#dane_zawodnika').html(html);
                }
            })
        }
        else $('#dane_zawodnika').hide();
    })

    //wyszukiwanie po wszystkim
    $('#szukajzawodnika').keyup(function(){
        var szukane = $('#szukajzawodnika').val();
        if (szukane.length > 0) {
            $.ajax({
                type:'POST',
                url:'../admin/ajax_filtrzawodnika_full.php',
                data: {szukaj:szukane},
                success: function(html){
                    $('#listaznalezionychzawodnikow').show();
                    $('#listaznalezionychzawodnikow').html(html);
                }
            })
        }
    })

    //przejdź do modeli wybranego zawodnika
    $('#idzdomodeli').click(function(){
       UkryjKontrolki();
       modele_zawodnka($('#idusr').val());
    })

    //czyszczenie informacji o obrabianym zawodniku
    $('#nowyzawodnik').click(function(){
        $('#idusr').val(0);
        $('#imie').val('');
        $('#imie').attr('style','border: solid 1px #ccc');
        $('#nazwisko').val('')
        $('#nazwisko').attr('style','border: solid 1px #ccc');
        $('#rok_urodzenia').val('');
        $('#rok_urodzenia').attr('style','border: solid 1px #ccc');
        $('#miasto').val('');
        $('#klub').val('');
        $('#username_adminrej').attr('style', 'border: solid 1px #ccc');
        $('#username_adminrej').val('');
        $('#email').val('');
        $('#uprawnieniaZawodnika').val(0);
    })
    //************************** KONIEC SEKCJI FORMULARZA ZAWODNIKA */

    //Zapisywanie modelu dla zawodnika
    $('#wstawmodel').click(function() {
        $.ajax({
            type:'POST',
            url:'../ajax_dodajmodel.php',
            data:{idmod:$('#modelid').val(),
                  rodzajmodelu:$('#rodzajmodelu').val(),
                  nazwamod:$('#nazwamod').val(),
                  skala:$('#skala').val(),
                  wydawca:$('#wydawca').val(),
                  idusr:$('#idusr').val(),
                  idkat:$('#kategoriamodelu').val(),
                  admin:'tak'
            },
            success: function(data){
                $('#modelid').val(0);
                $('#nazwamod').val('');
                $('#wydawca').val('');
                $('#skala').val('');
                $('#idusr').val(data.uzytkownik.id);
                $('#modele_zawodnika').show(0);
                $('#modele_zawodnika').html (data.uzytkownik.modele);
            },
            error: function (){
                alert('Błąd działania!');}
            });
    })
    $('#btnEksportCSV').click(function(){
        UkryjKontrolki();
        $('#ListyDrukowanie').show();
    })
    $('#btnEksportCSVWykonaj').click(function(){
        var czymlodzik='n';
        var czyjunior='n';
        var czysenior='n';
        var czykarton='n';
        var czyplastik='n';
        if ($('#cbLDMlodzik').is(':checked'))
           czymlodzik='t';
        if ($('#cbLDJunior').is(':checked'))
           czyjunior='t';
        if ($('#cbLDSenior').is(':checked'))
           czysenior='t';
        if ($('#cbLDKarton').is(':checked'))
           czykarton='t';
        if ($('#cbLDPlastik').is(':checked'))
           czyplastik='t';
        var pola = '';
        if ($('#cbLDid').is(':checked')) {
            if (pola.indexOf('model.id,') < 0) {
                pola=pola.concat('model.id,');
            }
        }
        else {
            pola=pola.replace('model.id,', '');
        }
        if ($('#cbLDNumer').is(':checked')) {
            if (pola.indexOf('model.konkurs,') < 0) {
                pola=pola.concat('model.konkurs,');
            }
        }
        else {
            pola=pola.replace('model.konkurs,', '');
        }
        if ($('#cbLDNazwaMod').is(':checked')) {
            if (pola.indexOf('model.nazwa nazwamod,') < 0) {
                pola=pola.concat('model.nazwa nazwamod,');
            }
        }
        else {
            pola=pola.replace('model.nazwa nazwamod,', '');
        }
        if ($('#cbLDKlasa').is(':checked')) {
            if (pola.indexOf('kategoria.symbol') < 0) {
                pola=pola.concat('CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) nazwakat,');
            }
        }
        else {
            pola=pola.replace('CONCAT_WS (" ", kategoria.symbol, kategoria.nazwa) nazwakat,', '');
        }
        if ($('#cbLDKto').is(':checked')) {
            if (pola.indexOf('imie') < 0) {
                pola=pola.concat('CONCAT_WS (" ",imie, nazwisko) imienzw,');
            }
        }
        else {
            pola=pola.replace('CONCAT_WS (" ",imie, nazwisko) imienzw,', '');
        }
        if ($('#cbLDWiek').is(':checked')) {
            if (pola.indexOf('rokur') < 0) {
                pola=pola.concat('Year(Now())-rokur wiek,');
            }
        }
        else {
            pola=pola.replace('Year(Now())-rokur wiek,', '');
        }
        if ($('#cbLDGrupa').is(':checked')) {
            if (pola.indexOf('kategoria.klasa,') < 0) {
                pola=pola.concat('kategoria.klasa,');
            }
        }
        else {
            pola=pola.replace('kategoria.klasa,', '');
        }
        if (pola.length > 1) {
          pola=pola.substr(0, pola.length-1);
        }
        else{
          pola='id,konkurs'
        }
        $.ajax({
            type:'POST',
            url:'../admin/ajax_exportcsv.php',
            data:{
                czymlodzik: czymlodzik,
                czyjunior: czyjunior,
                czysenior: czysenior,
                czykarton: czykarton,
                czyplastik: czyplastik,
                pola: pola
            },
            success: function(dane){
                $('#exp2csvTable').html(dane);
                $('#exp2csvTable').show();
                if ($('#cbLDZapisz').is(':checked')) {
                    $('#exp2csvTable').table2csv({
                        filename: $('#nazwapliku').val()
                    });
                }
            }
        })
    })
    $('#cbLDMlodzik').change(function(){
        var nazwa=$('#nazwapliku').val();
        var m=nazwa.indexOf('mlodzik');
        var k=nazwa.length;
        if ($('#cbLDMlodzik').is(':checked')) {
            if (m < 6) {
                nazwa=nazwa.substring(0,5)+'_mlodzik'+nazwa.substring(5);
            }
        }
        else {
            nazwa=nazwa.replace('_mlodzik', '');
        }
        $('#nazwapliku').val(nazwa);
    })
    $('#cbLDJunior').change(function(){
        var nazwa=$('#nazwapliku').val();
        var m=nazwa.indexOf('junior');
        var k=nazwa.length;
        if ($('#cbLDJunior').is(':checked')) {
            if (m < 6) {
                nazwa=nazwa.substring(0,5)+'_junior'+nazwa.substring(5);
            }
        }
        else {
            nazwa=nazwa.replace('_junior', '');
        }
        $('#nazwapliku').val(nazwa);
    })
    $('#cbLDSenior').change(function(){
        var nazwa=$('#nazwapliku').val();
        var m=nazwa.indexOf('senior');
        var k=nazwa.length;
        if ($('#cbLDSenior').is(':checked')) {
            if (m < 6) {
                nazwa=nazwa.substring(0,5)+'_senior'+nazwa.substring(5);
            }
        }
        else {
            nazwa=nazwa.replace('_senior', '');
        }
        $('#nazwapliku').val(nazwa);
    })
    $('#cbLDKarton').change(function(){
        var nazwa=$('#nazwapliku').val();
        var m=nazwa.indexOf('karton');
        var k=nazwa.length;
        if ($('#cbLDKarton').is(':checked')) {
            if (m < 6) {
                nazwa=nazwa.substring(0,5)+'_karton'+nazwa.substring(5);
            }
        }
        else {
            nazwa=nazwa.replace('_karton', '');
        }
        $('#nazwapliku').val(nazwa);
    })
    $('#cbLDPlastik').change(function(){
        var nazwa=$('#nazwapliku').val();
        var m=nazwa.indexOf('plastik');
        var k=nazwa.length;
        if ($('#cbLDPlastik').is(':checked')) {
            if (m < 6) {
                nazwa=nazwa.substring(0,5)+'_plastik'+nazwa.substring(5);
            }
        }
        else {
            nazwa=nazwa.replace('_plastik', '');
        }
        $('#nazwapliku').val(nazwa);
    })
    $('#btnDrukowanieDyplomow').click(function(){
        UkryjKontrolki();
        $.ajax({
            type:'POST',
            url:'../ajax_wyniki.php',
            data:{
              czydyplom:'tak'
            },
            success:function(html){
                $('#wyniki').show();
                $('#wyniki').html(html);
            }
        })
    })
})

function pokazModeleWKategorii(AKategoria) {
    $.ajax({
            type:'POST',
            url:'../ajax_modelewkategorii.php',
            data:{kategoria_id:AKategoria,
                  idcri: $('#admin_id').val()
            },
            success:function(html){
                $('#seniorzyTable').html(html);
            }
    });
}

function przeniesDoKategorii(){
    $.ajax({
        type:'POST',
        url:'../ajax_przeniesdokategorii.php',
        data:{
          kategoria_target:$('#przeniesdokateorii').val(),
          kategoria_source:$('#kategoria').val()
        },
        success: function(html){
          $('#kategoria').val(html);
          pokazModeleWKategorii(html);
          $('#przeniesdokateorii').val('1');
        }
    })
}

function dodajOcene(AIdMod){
    $.ajax({
        type:'POST',
        url:'../ajax_dodajOcene.php',
        data:{
            model_id: AIdMod,
            idcri: $('#admin_id').val(),
            kategoria_id:$('#kategoria').val()
        },
        success: function(html){
            $('#seniorzyTable').html(html);
        }
    })
}

function dodajWyroz(AIdMod){
    $.ajax({
        type:'POST',
        url:'../ajax_dodajWyroznienie.php',
        data:{
            model_id: AIdMod,
            idcri: $('#admin_id').val(),
            kategoria_id:$('#kategoria').val()
        },
        success: function(html){
            $('#seniorzyTable').html(html);
        }
    })
}

function zatwierdz(AIdKat, AIdCri) {
    $.ajax({
        type:'POST',
        url:'../admin/ajax_zatwierdzocene.php',
        data: {
            idkat: AIdKat,
            idcri: AIdCri
        },
        success: function(data){
            if (data.zatwierdzone==1) {
                $('#btnZatwierdz').hide();
                $('#seniorzyTable').html(data.widok);
                $('#komunikatDobry-p').html('Zatwierdzono poprawnie.');
                $('#komunikatDobry').modal();
            }
            else {
                if (data.zatwierdzone == 0) {
                    $('#konunikatTekstBlad-p').html('Błąd zatwierzania.</br>Coś poszło nie tak.');
                    $('#komunikatBlad').modal();
                }
                else {
                    $('#konunikatTekstBlad-p').html('Zbyt dużo przyznanych punktów.</br>Suma przyznanych punktów nie może przekraczać 6.');
                    $('#komunikatBlad').modal();
                }
            }
        }
    })
}


