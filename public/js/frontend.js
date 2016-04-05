/**
 * Created by Pixsens on 2016-03-17.
 */
var root = location.protocol + '//' + location.host;

jQuery( document ).ready(function($){
/*
    $('#b').mouseover(function(){
        $('#a').css('background-color', 'rgba(0,0,0,0.5)');
    })
    $('#b').mouseout(function(){
        $('#a').css('background-color', 'transparent').removeAttr('style');
    })
*/
    /********* pazymet pasirinkta paslauga ********/

    $('.sidebar-icon .icon-image').on('click', function() {
        $('.sidebar-icon .icon-image').removeClass('background-color-selected');
        $(this).addClass('background-color-selected');
    });

    /********** HOVER MENU VISIBLE ************/

    $('#miestai, #c').mouseover(function(){
        $('#c').show();
        $('header').css('background-color', 'rgba(0,0,0,0.7)');
        $('#miestai').css('border-bottom', '3px solid white');
    });
    $('#miestai, #c').mouseout(function(){
        $('#c').hide();
        $('header').css('background-color', 'transparent');
        $('#miestai').css('border-bottom', '3px solid transparent');
    })

    $('#paslaugos, #b').mouseover(function(){
        $('#b').show();
        $('header').css('background-color', 'rgba(0,0,0,0.7)');
        $('#paslaugos').css('border-bottom', '3px solid white');
    });
    $('#paslaugos, #b').mouseout(function(){
        $('#b').hide();
        $('header').css('background-color', 'transparent');
        $('#paslaugos').css('border-bottom', '3px solid transparent');
    })


    $('#kontaktai, #d').mouseover(function(){
        $('#d').show();
        $('header').css('background-color', 'rgba(0,0,0,0.7)');
        $('#kontaktai').css('border-bottom', '3px solid white');
    });
    $('#kontaktai, #d').mouseout(function(){
        $('#d').hide();
        $('header').css('background-color', 'transparent');
        $('#kontaktai').css('border-bottom', '3px solid transparent');
    })

    $('#apiemus, #e').mouseover(function(){
        $('#e').show();
        $('header').css('background-color', 'rgba(0,0,0,0.7)');
        $('#apiemus').css('border-bottom', '3px solid white');
    });
    $('#apiemus, #e').mouseout(function(){
        $('#e').hide();
        $('header').css('background-color', 'transparent');
        $('#apiemus').css('border-bottom', '3px solid transparent');
    })


    $(".hover-button").hover(function() {
        $(this).toggleClass("hovered-button");
    });

        /************ SMALLER MENUS IN THE HEADER BUTTONS ***************/

    $(".hover-menu.paslaugos-menu .hover-button")
        .on('mouseenter', function() {
            $(this).find('ul.city-list').addClass('visible');
        })
        .on( "mouseleave", function() {
            $(this).find('ul.city-list').removeClass('visible');
        });

    $(".hover-menu.miestai-menu .hover-button")
        .on('mouseenter', function() {
            $(this).find('ul.city-list').addClass('visible');
        })
        .on( "mouseleave", function() {
            $(this).find('ul.city-list').removeClass('visible');
        });


        /************* MENU ITEMS HOVER BOTTOM LINE *****************/

    $('header').mouseover(function() {
        if ($('#b').is(':visible') == true) {
            $('.paslaugos-button').css('border-bottom', '2px solid white');
        }
    });

    /************** PASLAUGU SARASAS TOGGLE **************/

    $('.category-facilities').each(function(){
        $(this).on('click', function(){
            var id = $(this).attr('data-id');
            $('.paslaugu-sarasas').hide();
            $('input[name="category"]').val(id);
            $('#category-search').html($('.category-'+id+' .category-name').html());
            $('.facilities-'+id).toggle();
            fillSearchFacilities(id);
        });
    });

    $('.paslaugu-sarasas input').on('click', function(){
        fillSearchFacilities($('input[name="category"]').val());
    });

    function fillSearchFacilities(category_id){
        var facilities = $('#facilities-search');
        facilities.html('');
        $('.facilities-'+category_id+' .facilities-container').each(function(){
            if($(this).find('input').is(':checked')){
                facilities.append('<p>'+$(this).find('label').html()+'</p>');
            }
        });
    }

    $('.patvirtinti').on('click', function(){
        $('.paslaugu-sarasas').hide();
    });

    /******** Miesteliu sarasas toggle **************/

    $('.miesteliu-trigger').each(function() {
       $(this).on('click', function(){
           $('.miesteliu-sarasas').show();
       })
    });

    /************** CUSTOM SCROLLBAR **************/

    $(".nano").nanoScroller();

    /*** slider **/

    function sliderOn1() {
    jQuery('#slider1').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#pirmadienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};
function sliderOn2() {
    jQuery('#slider2').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#antradienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};
function sliderOn3() {
    jQuery('#slider3').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#treciadienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};
function sliderOn4() {
    jQuery('#slider4').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#ketvirtadienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};
function sliderOn5() {
    jQuery('#slider5').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#penktadienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};
function sliderOn6() {
    jQuery('#slider6').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#sestadienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};
function sliderOn7() {
    jQuery('#slider7').slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 1020 ],
        slide: function( event, ui ) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if(hours1.length < 10) hours1= '0' + hours;
            if(minutes1.length < 10) minutes1 = '0' + minutes;

            if(minutes1 == 0) minutes1 = '00';

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if(hours2.length < 10) hours2= '0' + hours;
            if(minutes2.length < 10) minutes2 = '0' + minutes;

            if(minutes2 == 0) minutes2 = '00';

            jQuery('#sekmadienisslider').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
        }
    });
};

    sliderOn1();
    sliderOn2();
    sliderOn3();
    sliderOn4();
    sliderOn5();
    sliderOn6();
    sliderOn7();

    /*** Uzdaryti paslaugu sarasa ***/
    $('.header-of-headers span').on('click', function() {
        $('.paslaugu-sarasas').hide();
    })

    /*********** MAIN MAP *************/

    $("#myimg").mapster({
        stroke: false,
        strokeColor: "000",
        strokeWidth: 1,
        fill: true,
        fillColor: 'c9eafe',
        fillOpacity: 0.4,
        isSelectable: false
    });

    $('#lithuania area').each(function() {
        $(this).on('click', function(){
            window.location.href=root+'/imones/'+$(this).attr('data-name');
        });
    });
    $('#region area').each(function() {
        $(this).on('click', function(){
            window.location.href=root+'/imones/'+$(this).attr('href');
        });
        $(this).qtip({
            content: {
                text: function(event, api) {
                    return $.ajax({
                        url: root + '/tooltip/' + $(this).attr('data-name')
                    });
                }
            },
            style: {
                classes: 'qtip-dark'
            },
            show: {
                solo: true
            },
            position: {
                target: 'mouse',
                adjust: { x: 15 },
                at: 'center left',
                my: 'center left'
            },
            hide: {
                fixed: true,
                delay: 300
            }
        });
    });

    // Close messages button
    $('button.close').on('click', function(){
        $('div.alert').remove();
    });

    /********* FORM SUBMIT ********/


    $( "form" ).submit(function( event ) {
        $( ".sidebar-icon .icon-image" ).each( function() {
            if ( $(this).hasClass('background-color-selected') === true  ) {
                $('form').unbind('submit').submit();
            } else {
                $('p.litred').show();
                event.preventDefault();
            }
        });
    });

    /** rajonai bold on hover  ***/

    $('.main-map area').each( function(){
        var rajono_slug = $(this).attr('data-name');
        $(this).hover(function() {
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('list-style', 'inside');
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('font-weight', '700');
        },
            function() {
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('list-style', 'none');
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('font-weight', '500');
            })
    });
    $('..mikrorajonai li').each( function(){
        var li_slug = $(this).attr('data-name');
        $(this).hover(function() {
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('list-style', 'inside');
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('font-weight', '700');
            },
            function() {
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('list-style', 'none');
                $('.mikrorajonai li[data-name=' + rajono_slug + ']').css('font-weight', '500');
            })
    });





    /*$('form.filter-form').on('submit', function(e){
        var category_id = $('input[name="category"]').val();
        var query = '';
        if(category_id){
            $('.facilities-'+category_id+' .facilities-container').each(function(){
                var input = $(this).find('input');
                if(input.is(':checked')) {
                    query += ((query == '' ? '' : ',') + input.attr('data-name'));
                }
            });
        }
        $(this).find('input[name="facilities"]').val(query);
    });*/

});
//# sourceMappingURL=frontend.js.map
