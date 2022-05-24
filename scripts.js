function CzyMozna(){
    const currentDate = new Date();
    const rok=currentDate.getFullYear();
    const miesiac=currentDate.getMonth()+1;
    var dzien=currentDate.getUTCDate();
    const godzina=currentDate.getHours();
    const minuta=currentDate.getMinutes();
    const dzisiaj = new Date(rok, miesiac, dzien, godzina, minuta);
    const wynikitermin = new Date(2021,9,12,12,55,0);
    if (dzisiaj >= wynikitermin){
        return false;
    }
    else {
        return true;
    }
 }
 function KoniecRejestracji(){
    const currentDate = new Date();
    const rok=currentDate.getFullYear();
    const miesiac=currentDate.getMonth()+1;
    var dzien=currentDate.getUTCDate();
    const godzina=currentDate.getHours();
    const minuta=currentDate.getMinutes();
    const dzisiaj = new Date(rok, miesiac, dzien, godzina, minuta);
    const termin = new Date(2021,9,10,20,00,0);
    if (dzisiaj >= termin){
         return true;
    }
    else {
       return false;
    }
 }
$(document).ready(function(){
    const currentDate = new Date();
    const rok=currentDate.getFullYear();
    const miesiac=currentDate.getMonth()+1;
    var dzien=currentDate.getUTCDate();
    const godzina=currentDate.getHours();
    const minuta=currentDate.getMinutes();
    const dzisiaj = new Date(rok, miesiac, dzien, godzina, minuta);
    const wynikitermin = new Date(2021,9,12,12,55,0);
    if (dzisiaj >= wynikitermin){
        $('#btn-carousel-about').text('Wyniki');
        $('#btn-carousel-portfolio').text('Wyniki');
        $('#btn-carousel-clients').text('Wyniki');
        $('#zawodnik').hide();
        $('#czekamynawyniki').hide();
        $('#wyniki').show();
        $('#loader').show();
        $.ajax({
            type:'POST',
            url:'ajax_wyniki.php',
            success:function(html){
                $('#loader').hide();
                $('#wyniki').html(html);
            }
        })
    }
    else {
        const termin = new Date(2021,9,10,20,0,0);
        if (dzisiaj > termin & dzisiaj < wynikitermin) {
            $('#btn-carousel-about').text('Wyniki');
            $('#btn-carousel-portfolio').text('Wyniki');
            $('#btn-carousel-clients').text('Wyniki');
            $('#zawodnik').hide();
    //          $('#logowanie')
            $('#wyniki').hide();
            $('#czekamynawyniki').show();
        }
        else {
            $('#btn-carousel-about').text('Rejestracja');
            $('#btn-carousel-portfolio').text('Rejestracja');
            $('#btn-carousel-clients').text('Rejestracja');
            $('#zawodnik').show();
            $('#czekamynawyniki').hide();
            $('#wyniki').hide();
        }

    }


    $('#rodzajmodelu').show (function() {
        var rodzaj = $('#rodzajmodelu').val();
        $.ajax({
              type:'POST',
              url:'ajax_kategorie.php',
              data:'rodzaj_id='+rodzaj,
              success:function(html){
                $('#kategoriamodelu').html(html);}
              });
    });

    $('#zrezygnujRejZaw').click(function(){
        var idusr = $('#idusr').val();
        if (idusr != null && idusr != 0){
            $('#rejestracja').hide(0);
            $.ajax({
                type:'POST',
                url:'ajax_pusty.php',
                dataType:'json',
                data:'Id='+idusr,
                success:function(dane){
                    var idusr = dane.uzytkownik.id;
                    if (idusr != null && idusr != 0){
                        $('#konto').show(0);
                        $('#idusr').val(idusr);
                        $('#modele_zawodnika').show(0);
                        $('#modele_zawodnika').html (modele_zawodnka (idusr));
                    }
                    else {
                        $('#logowanie').show(0);
                        $('#rejestracja').hide(0);
                        $('#konto').hide(0);
                    }
                },
                error:function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#loader').hide(0)
                    $('#nameError').text(errorThrown+textStatus)
                    $('#nameError').show(0);
                }
            })
        }
        else {
            $('#logowanie').show(0);
            $('#rejestracja').hide(0);
            $('#konto').hide(0);
        }
    });

    $('#modyfikujzawodnika').click(function(){
        if (!CzyMozna()){
            $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Nie można już wprowadzać zmian w zawodnikach</p>');
            $('#komunikatBlad').modal();
        }
        else {
            var idusr = $('#idusr').val();
            if (idusr != null && idusr != 0) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax_dajzawodnika.php',
                    dataType: 'json',
                    data: 'IdUsr='+idusr,
                    success: function(dane){
                        $('#rejestracja').show(0);
                        $('#konto').hide(0);
                        $('#modele_zawodnika').hide(0);
                        $('#imie').val(dane.uzytkownik.imie);
                        $('#nazwisko').val(dane.uzytkownik.nazwisko);
                        $('#username_rej').val(dane.uzytkownik.login);
                        $('#username_rej').attr ('placeholder', dane.uzytkownik.login);
                        $('#username_rej').attr('disabled', 'false');
                        $('#userpass_rej').val('');
                        $('#userpass2').val('');
                        $('#email').val(dane.uzytkownik.email);
                        $('#miasto').val(dane.uzytkownik.miasto);
                        $('#rok_urodzenia').val(dane.uzytkownik.rokur);
                        $('#klub').val(dane.uzytkownik.klub);
                        $('#akceptuje').attr ('checked', 'checked');
                        $('#idusr').val(dane.uzytkownik.id);
                    }
                });
            };
        }
    });

    $('#dodajzawodnika').click(function(){
        if (KoniecRejestracji()){
            $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Nie można już się rejestrować</p>');
            $('#komunikatBlad').modal();
        }
        else {
            var response = grecaptcha.getResponse(widgetRejestruj);
            //if (document.location.hostname.toLowerCase != 'LOCALHOST')
            // response = 'ala';
            if(response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Bez tego się nie uda.</span>';
            }
            else {
                $('#loader').fadeIn('normal');
                $('#rejestracja').hide(0);
                $('#nameError').text('').hide(0);
                $('#message').text('').hide(0);
                $.ajax({
                    type: 'POST',
                    url: 'ajax_dodajzawodnika.php',
                    dataType: 'json',
                    data: {
                        idusr: $('#idusr').val(),
                        imie: $('#imie').val(),
                        nazwisko: $('#nazwisko').val(),
                        username_rej: $('#username_rej').val(),
                        userpass_rej: $('#userpass_rej').val(),
                        userpass2: $('#userpass2').val(),
                        email: $('#email').val(),
                        miasto: $('#miasto').val(),
                        rok_urodzenia: $('#rok_urodzenia').val(),
                        klub: $('#klub').val(),
                        akceptuje: $('#akceptuje').attr('checked')
                    },
                    success: function(data){
                        var blad = '';
                        $('#loader').hide(0);
                        $('#nameError').show(500);
                        if(data.error_imie.exists==true){
                            $('#imie').attr('style','border: solid 2px red');
                            blad = data.error_imie.message;
                            $('#nameError').show(0);
                        }
                        else{
                            $('#imie').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if(data.error_nazwisko.exists==true){
                            $('#nazwisko').attr('style','border: solid 2px red');
                            blad = blad + ' ' + data.error_imie.message;
                            $('#nameError').show(0);
                        }
                        else {
                            $('#nazwisko').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if(data.error_username_rej.exists==true){
                            $('#username_rej').attr('style','border: solid 2px red');
                            blad = blad + ' ' + data.error_username_rej.message;
                            $('#nameError').show(0);
                        }
                        else {
                            $('#username_rej').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if(data.error_userpass_rej.exists==true){
                            $('#userpass_rej').attr('style','border: solid 2px red');
                            blad = blad + ' ' + data.error_userpass_rej.message;
                            $('#nameError').show(0);
                        }
                        else {
                            $('#userpass_rej').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if(data.error_userpass2.exists==true){
                            $('#userpass2').attr('style','border: solid 2px red');
                            blad = blad + ' ' + data.error_userpass2.message;
                            $('#nameError').show(0);
                        }
                        else {
                            $('#userpass2').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if(data.error_email.exists==true){
                            $('#email').attr('style','border: solid 2px red');
                            blad = blad + ' ' + data.error_email.message;
                            $('#nameError').show(0);
                        }
                        else {
                            $('#email').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if(data.error_rok_urodzenia.exists==true){
                            $('#rok_urodzenia').attr('style','border: solid 2px red');
                            blad = blad + ' ' + data.error_rok_urodzenia.message;
                            $('#nameError').show(0);
                        }
                        else {
                            $('#rok_urodzenia').attr('style','border: solid 2px lightgreen');
                            $('#message').text(data.message);
                            $('#message').show(0);
                        }
                        if (data.error_akceptuje.exists == true) {
                            $('#przelacznik').attr('style','border: solid 2px red');
                            blad = blad + ' należy przeczytać i zaakceptować regulamin.';
                            $('#nameError').show(0);
                        }
                        else {
                            $('#przelacznik').attr('style','border: solid 2px lightgreen');
                            $('#nameError').show(0);
                        }
                        $('#loader').hide(0);
                        if (blad.length > 1) {
                            if (data.error_username_rej.typ === 0) {
                                $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Błąd rejestracji.</br>Uzupełnij lub popraw dane.</p>');
                                $('#komunikatBlad').modal();
                            }
                            else {
                                $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Błąd rejestracji.</br>Wybrany login jest zajęty</p>');
                                $('#komunikatBlad').modal();
                                $('#username_rej').attr('style','border: solid 2px red');
                            }
                            $('#logowanie').hide(0);
                            $('#rejestracja').show(0);
                            $('#konto').hide(0);
                        }
                        else {
                            var idusr = $('#idusr').val();
                            if (idusr != null && idusr != 0){
                                $('#konto').show(0);
                                $('#rejestracja').hide(0);
                                $('#idusr').val(idusr);
                                $('#lbzawodnik').html ('<label id="lbzawodnik">Zalogowano jako: ' + $('#imie').val() + ' ' + $('#nazwisko').val()+'</label>');
                                $('#modele_zawodnika').show(0);
                                $('#modele_zawodnika').html (modele_zawodnka (idusr));
                            }
                            else {
                                $('#logowanie').show(0);
                                document.getElementById('username').value = username_rej.value;
                                document.getElementById('userpass').value = userpass_rej.value;
                                $('#rejestracja').hide(0);
                                $('#konto').hide(0);
                            }
                        }
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                        $('#loader').hide(0)
                        $('#nameError').text(errorThrown)
                        $('#nameError').show(0);
                    }

                });
            }
        }
        return false;
    });



    $('#zaloguj').click(function() {
        var username = document.getElementById("username").value;
        var userpass = document.getElementById("userpass").value;
        $.ajax({
            type:'POST',
            url:'ajax_user.php',
            dataType: 'json',
            data:'username='+username+'&userpass='+userpass,
            success: function(data){
                if (data.uzytkownik.id != 0) {
                    $('#logowanie').hide(0);
                    $('#rejestracja').hide(0);
                    $('#zawodnik').show();
                    $('#konto').show(0);
                    $('#informacje').show();
                    //console.log(data);
                    $('#idusr').val(data.uzytkownik.id);
                    $('#lbzawodnik').html ('<label id="lbzawodnik">Zalogowano jako: ' + $('#imie').val() + ' ' + $('#nazwisko').val()+'</label>');
                    modele_zawodnka (data.uzytkownik.id);
                    $('#modele_zawodnika').show(0);
                    //document.getElementById('modele_zawodnika').innerHTML = data.uzytkownik.modele;
                    $('#modele_zawodnika').html (data.uzytkownik.modele);
                }
                else {
                    $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Błąd logowania.</br>'+
                      data.error.message+'</p>');
                    $('#komunikatBlad').modal();
                }
            },
            error: function (){
                $('#logowanie').show(0);
                $('#rejestracja').hide(0);
                $('#konto').hide(0);
                $('#idusr').val(0);
                $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Wewnętrzny błąd logowania.</p>');
                $('#komunikatBlad').modal();
            }
        });
    });

    $('#wyloguj').click(function() {
        $.ajax({
            type:'POST',
            url:'wyloguj.php',
            dataType: 'json',
            data:'username='+username+'&userpass='+userpass,
            success: function(data){
                $('#logowanie').show(0);
                $('#rejestracja').hide(0);
                $('#konto').hide(0);
                $('#modele_zawodnika').hide(0);
                $('#imie').val('');
                $('#nazwisko').val('');
                $('#username_rej').removeAttr('disabled');
                $('#username_rej').attr('placeholder', 'Nazwa użytkownika*');
                $('#username_rej').val('');
                $('#userpass_rej').val('');
                $('#userpass2').val('');
                $('#email').val('');
                $('#miasto').val('');
                $('#rok_urodzenia').val('');
                $('#klub').val('');
                $('#akceptuje').attr ('checked', 'unchecked');
                $('#idusr').val(0);
            },
            error: function (){
                $('#logowanie').show(0);
                $('#rejestracja').hide(0);
                $('#konto').hide(0);
                $('#modele_zawodnika').hide(0);
                $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Wewnętrzny błąd wylogowania.</p>');
                $('#komunikatBlad').modal();
            }
        });
    });


    $(function() {
        $(document).on('change', '[name="rodzajmodelu"]' , function(){
          var rodzaj = $('#rodzajmodelu').val();
          $.ajax({
                type:'POST',
                url:'ajax_kategorie.php',
                data:'rodzaj_id='+rodzaj,
                success:function(html){
                  $('#kategoriamodelu').html(html);}
                });
        });
    });


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
    }

    $('#wstawmodel').click(function() {
        if (!CzyMozna()){
            $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Nie można już wprowadzać zmian w modelach</p>');
            $('#komunikatBlad').modal();
        }
        else {
            var idmod = $('#modelid').val();
            var rodzajmod = $('#rodzajmodelu').val();
            var nazwamod = $('#nazwamod').val();
            var skala = $('#skala').val();
            var wydawca = $('#wydawca').val();
            var idusr = $('#idusr').val();
            var idkat = $('#kategoriamodelu').val();
            if (nazwamod.length > 0 && idkat > 0){
                $.ajax({
                    type:'POST',
                    url:'ajax_dodajmodel.php',
                    dataType: 'json',
                    data:'idmod='+idmod+'&rodzajmodelu='+rodzajmod+'&nazwamod='+nazwamod+'&skala='+skala+'&wydawca='+wydawca+'&idusr='+idusr+'&idkat='+idkat,
                    success: function(data){
                        $('#modelid').val(0);
                        $('#nazwamod').val('');
                        $('#wydawca').val('');
                        $('#skala').val('');
                        $('#idusr').val(data.uzytkownik.id);
                        $('#modele_zawodnika').show(0);
                        $('#modele_zawodnika').html (data.uzytkownik.modele);
                        $('#komunikatRejestracja-p').html('<p id="komunikatRejestracja-p">'+
                        'Twój model został prawidłowo zgłoszony.</br>Możesz dodać kolejny lub zakończyć rejestrację klikając w <b>Wyloguj</b>.</p>');
                        $('#komunikatRejestracyjny').modal();
                    },
                    error: function (){
                        $('#logowanie').show(0);
                        $('#rejestracja').hide(0);
                        $('#konto').hide(0);
                        $('#modele_zawodnika').hide(0);
                        $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Wewnętrzny błąd wprowadzania modelu.</p>');
                        $('#komunikatBlad').modal();
                    }
                });
            }
            else {
                if (idkat <= 0) {
                    $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Należy wybrać kategorię.</p>');
                    $('#komunikatBlad').modal();
                }
                else {
                    $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">Należy wpisać nazwę modelu.</p>');
                    $('#komunikatBlad').modal();
                }
            }
        }
    })

    function modele_zawodnka (AIdUsr){
        var idusr =0;
        if (AIdUsr == undefined)
           idusr = $('#idusr').val();
        else idusr = AIdUsr;
        $.ajax({
              type:'POST',
              url: 'ajax_pokazmodele.php',
              data: 'idusr='+idusr,
              success: function (html){
                $('#modele_zawodnika').html(html);
                $('#modele_zawodnika').show(0);
              },
              error: function() {
                $('#modele_zawodnika').html('<table id="modele_zawodnika" style="display:none;"></table>');
              }
        })
    }

    $('#wyslijwiadomosc').click(function(){
        var response = grecaptcha.getResponse(widgetWiadomosc);
        if(response.length == 0) {
            $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">W formularzu rejestracji zaznacz "Nie jestem robotem".</p>');
            $('#komunikatBlad').modal();
        }
        else {
            var eodkogo=$('#emailimienazw').val();
            var eadres=$('#emailadres').val();
            var etytul=$('#emailtytul').val();
            var ephone=$('#emailphone').val();
            var etresc=$('#emailtresc').val();
            $.ajax({
                type:'POST',
                url:'ajax_mailaslij.php',
                data:'adres='+eadres+'&odkogo='+eodkogo+'&temat='+etytul+'&phone='+ephone+'&tresc='+etresc,
                success:function(dane){
                    if (dane.wynik == 0) {
                        $('#emailimienazw').val('');
                        $('#emailadres').val('');
                        $('#emailtytul').val('');
                        $('#emailphone').val('');
                        $('#emailtresc').val('');
                        $('#komunikatRejestracja-p').html('<p id="komunikatRejestracja-p">'+dane.komunikat);
                        $('#komunikatRejestracyjny').modal();
                    }
                    else {
                        $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">'+dane.komunikat);
                        $('#komunikatBlad').modal();
                    }

                },
                error: function(){
                    $('#konunikatTekstBlad-p').html('<p id="konunikatTekstBlad-p">'+dane.komunikat);
                    $('#komunikatBlad').modal();
                }

            });
            grecaptcha.reset(widgetWiadomosc);
        }
    })


    $('#skleroza').click(function(){
      var username=$('#username').val();
      $.ajax({
          type:'POST',
          url:'ajax_skleroza.php',
          data:'username='+username,
          success:function(dane){
            $('#komunikat p').text (dane.komunikat);
          }
      })
    })
});




