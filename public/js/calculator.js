// function toggleVozac() {
//   $('#vozac-detaljno').animate({
//         //left: "+=50",
//         height: "0"
//         }, 1000, function() {
//         // Animation complete.
//     });
//     $('#vozac-detaljno').html("");
//     $('html, body').stop().animate({
//         scrollTop: $('#vozaci').offset().top
//     }, 1000, 'easeInOutExpo');
// }

(function ($) {

    //new WOW().init();

    jQuery(window).load(function() { 
        jQuery("#preloader").delay(100).fadeOut("slow");
        jQuery("#load").delay(100).fadeOut("slow");
    });

    // twitter tooltip
    $("#header [title]").tooltip({ placement: 'bottom' })
    $("[title]").tooltip();


    // //jQuery to collapse the navbar on scroll
    // $(window).scroll(function() {
    //  if ($(".navbar").offset().top > 50) {
    //      $(".navbar-fixed-top").addClass("top-nav-collapse");
    //  } else {
    //      $(".navbar-fixed-top").removeClass("top-nav-collapse");
    //  }
    // });

    //jQuery for page scrolling feature - requires jQuery Easing plugin
    // $(function() {
    //  $('.navbar-nav li a').bind('click', function(event) {
    //      var $anchor = $(this);
    //      $('html, body').stop().animate({
    //          scrollTop: $($anchor.attr('href')).offset().top
    //      }, 1500, 'easeInOutExpo');
    //      event.preventDefault();
    //  });
    //  $('.page-scroll a').bind('click', function(event) {
    //      var $anchor = $(this);
    //      $('html, body').stop().animate({
    //          scrollTop: $($anchor.attr('href')).offset().top
    //      }, 1500, 'easeInOutExpo');
    //      event.preventDefault();
    //  });
    // });

    //JQuery ajax za vozaci detaljno
    // $('.ajax-detaljno').click(function(e) {
    //  $('#vozac-detaljno').animate({
    //      //left: "+=50",
    //      height: "toggle"
    //      }, 0, function() {
    //      // Animation complete.
    //  });
    //  // Dohvati broj pod kojim se nalazi u bazi
    //  var sluz_broj = $(this).data("sluzbeniBroj");
    //  //console.log(sluz_broj);
    //  $.ajax({
    //      url: '/_core/vozac_detaljno.php?id='+sluz_broj,
    //      data: {
    //          format: 'html'
    //      },
    //      error: function() {
    //          $('#vozac-detaljno').html('<p>Dogodila se neka greÅ¡ka</p>');
    //      },
    //      dataType: 'html',
    //      success: function(data) {
    //          var $body = $('<div class="well row">').html(data);
    //          $('#vozac-detaljno').html($body).animate({
    //              //left: "+=50",
    //              height: "toggle"
    //              }, 2000, function() {
    //              // Animation complete.
    //          });
    //          $('html, body').stop().animate({
    //          scrollTop: $('#vozac-detaljno').offset().top-70
    //      }, 1000, 'easeInOutExpo');
    //      },
    //      type: 'GET'
    //  });
    // });
    
    //$( document ).on( "click", "#calc_submit", function(evt) {
    $('#calculator').submit(function(evt) {
        //console.log('jeee');

        evt.preventDefault();

       // console.log($('#calc_end').val());

        if ($('#calc_start').val().length > 0 && $('#calc_end').val().length > 0) {

           // var language = $( 'input[name=_lang]' ).val();


            var site = document.location.origin;
            // Send data to server through the Ajax call
            //console.log($('#calc_start').val());
            //console.log($('#calc_end').val());
            $.post({
                url: '/price/calculate',
                data: {
                    "_token": $( 'input[name=_token_calculate]' ).val(),
                    action : 'requestCalc', 
                    calc_start : $('#calc_start').val(),
                    calc_end :   $('#calc_end').val(),
                    tarifa:  $('input[name=tarifa]:checked').val(),
                    lang: $( 'input[name=_lang]' ).val(),
                },

               // type: "POST",
                async: "true",
                dataType: "json",
                beforeSend: function() {
                    // $('#preloader').show();
                    //console.log($('#calc_start'));
                },
                complete: function() {
                    // $('#preloader').hide(); // This will hide Ajax spinner
                    //console.log("2");
                },
                success: function (msg) {
                    //console.log("3");
                    if (msg!=0) {
                        if(msg.language == "_en") {
                            var driveDistance = "Distance:";
                            var driveTime = "Time:";
                            var drivePrice = "Price:";

                        } else if(msg.language == "_ru" ) {
                            var driveDistance = "Расстояние:";
                            var driveTime = "Время:";
                            var drivePrice = "Цена:";

                        } else {
                            var driveDistance ="Razdaljina:";
                            var driveTime = "Vreme:";
                            var drivePrice = "Cena:";
                        }
                        // Sakri formu i prikazi
                        // console.log(msg.language);
                        // console.log(msg.distance);
                        // console.log(msg.duration);
                        $("#calc_result_message").html('' +
                            '    <p>' + driveDistance +
                            '    <strong>'+msg.distance+'</strong>,' +
                            '    ' + driveTime +
                            '    <strong>'+msg.duration+'</strong>,' +
                            '    ' + drivePrice +
                            '    <strong style="color:red">'+msg.price+' &euro;</strong></p>' +
                            '<div id="map_direction"></div>' +
                            // '</dl>' + 
                            '<script type="text/javascript">' +
                            '  var rendererOptions = { draggable: true };' +
                            '  var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);' +
                            '  var directionsService = new google.maps.DirectionsService();' +
                            '  var map;' +
                            '  var podgorica = new google.maps.LatLng(42.474599, 19.269096);' +
                            '  $(function(){' +
                            '     var mapOptions = {' +
                            '        zoom: 12,' +
                            '        center: podgorica' +
                            '      };' +
                            '      map = new google.maps.Map(document.getElementById("map_direction"), mapOptions);' +
                            '      directionsDisplay.setMap(map);' +
                            '      directionsDisplay.setPanel(document.getElementById("directionsPanel"));' +
                            '      calcRoute();' +
                            '  });' +
                            '  function calcRoute() {' +
                            '    var request = {' +
                            '      origin: \''+ msg.start +'\',' +
                            '      destination: \'' + msg.end + '\',' +
                            '      travelMode: google.maps.TravelMode.DRIVING' +
                            '    };' +
                            '    directionsService.route(request, function(response, status) {' +
                            '      if (status == google.maps.DirectionsStatus.OK) {' +
                            '        directionsDisplay.setDirections(response);' +
                            '      }  ' +
                            '    });' +
                            '  }' +
                            '</script>').show('slow');
                    }
                    else
                        $("#form_calc_poruka").html('<div class="alert alert-danger" role="alert"><p><i class="fa fa-exclamation-circle"></i> Neuspesno izracunavanje cene</p></div>').show('slow');
                    setTimeout(function() {
                            $("#form_calc_poruka").slideToggle('slow').html('');
                    }, 15000);
                },
                error: function (jqXHR,exception) {
                    var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        $('#form_calc_poruka').html(msg);
                    // This callback function will trigger on unsuccessful action               
                    $("#form_calc_poruka").html('<div class="alert alert-danger" role="alert"><p><i class="fa fa-exclamation-circle"></i> Neuspesno povezivanje</p></div>').show('slow');
                }
            });                  
        } else {
            if ($('#calc_start').val().length < 5) $("#calc_start").addClass("error");
            if ($('#calc_end').val().length < 5) $("#calc_end").addClass("error");
            $("#form_calc_poruka").html('<div class="alert alert-danger" role="alert"><p><i class="fa fa-exclamation-circle"></i> Morate popuniti sva polja</p></div>').show('slow');
        }
        
    });

})(jQuery);