$(document).ready(function () {

    var buffer = [];
    $("ul[id^='main-nav-'] > li > a").each(function(){
        var menu = $(this).attr('title');
        return buffer.push(menu);
    });
    console.log(buffer);


    $("#main-nav-muniguate li").mouseover(function() {
        $("#cf7 img").removeClass("opaque").addClass("img-responsive");

        var newImage = $(this).index();

        $("#cf7 img").eq(newImage).addClass("opaque");

        $("#main-nav-muniguate li").removeClass("selected");
        $(this).addClass("selected");
    });

    $("#main-nav-muniguate li").mouseout(function() {
        $("#cf7 img").removeClass("opaque").addClass("img-responsive");

        var newImage = $("#imgHero").index();

        $("#imgHero").eq(newImage).addClass("opaque");

        $("#main-nav-muniguate li").removeClass("selected");
        $("#imgHero").addClass("selected");
    });

    var anchoScreen = window.innerWidth;
    var limite = 768;
    var salto = "$('br[data-quit='quit']')";

    $(window).ready(function(){
        if (anchoScreen <= limite){
            $("br[data-quit='quit']").remove();
        }
    });

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        function aMovil(hash) {
            $(".navbar-collapse").collapse('hide');
            $('body').css('overflow', 'auto');
            $('#mmMain').removeClass('add-Padding');
        }
        var min = -10;
    }else {
        function aMovil(hash) {
            console.log('1');
        }
    }

    //Esta función lee la url y separa con una expresión regular las variables extras ejemplo, ?u=1&p=uniformes
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    //Trae la url actual del sitio: ejemplo, www.muniguate.com/emetra/
    var url = window.location.host + window.location.pathname;
    //Ubica el pathname actual del sitio, ejemplo /emetra/historia
    var pathname = window.location.pathname;
    //Separa y hace un arreglo con las posiciones del pathname, la unica posición que nos importa es la 1 que nos dice en que sitio estamos ubicados ejemplo, nameSite[1] = emetra
    var nameSite = pathname.split("/");
    //variable en url, indica si viene de un link de otra página del mismo sitio el parametro que regreso es la palabra externo
    var pExterno = getParameterByName('externo');
    //variable en url, indica el menu y el ancla en el que se hizo click, el parametro es click
    var pClick = getParameterByName('click');
    //Altura del header
    var headerH = $('.navbar-fixed-top').height() + 5;

    //función que identifica el click si es interno o es externo
    function ancla(hash) {
        //Variable que encuentra el valor del hash dentro del ancla
        var ancla = hash.split('#');
        //Valida si el hash es mayor a 0, quiere decir que esta en la página principal y no tiene ninguna variable extra
        if(hash.length > 0){
            if (url == "www.muniguate.com/"+ nameSite[1] +"/") {
                validar(hash);
                aMovil(hash);
            }
            if (url != "www.muniguate.com/"+ nameSite[1] +"/"){
                window.location = 'http://' + window.location.host + '/'+ nameSite[1] +'/' + '?externo=1&click='+ ancla[1];
            }
        }
    }

    function validar(hash) {
        //Encuentra el elemento en el DOM con el identificador y obtiene la posición del mismo con respecto al viewport 0,0
        var coordenadas = $(hash).offset();
        //Obtiene la posicion del top
        var element = coordenadas.top;
        var allElement = element - headerH;

        $('html, body').animate( {scrollTop : allElement}, 400 );
        //console.log(element);
    }

    function validarE(pClick) {
        var coordenadas = $('#'+pClick).offset();
        var element = coordenadas.top;
        var allElement = element - headerH;
        localStorage.clear();
        $('html, body').animate( {scrollTop : allElement}, 400 );
    }

    if (pExterno == 1){
        validarE(pClick);
        localStorage.clear();
    }

    $('.main-menu > ul > li  a').on('click', function() {
        //Activa función y envia el hash del ancla, ejemplo: #uniformes
        ancla(this.hash);
        localStorage.setItem('currentClick', this.title );
    });


    var currentClickMenu = (localStorage.getItem( 'currentClick' ));
    var validationLocalStorage = buffer.indexOf(currentClickMenu);
    //console.log( localStorage.getItem( 'currentClick' ) );

    //Obtengo de la etiqueta title el titulo del sitio y lo guardo en una variable

    var titleSite = $('title').text();

    //Valido si el titulo es distinto de null y que haga la función

    //Identifico y obtengo el contenedor de imagen y texto hero
    var structureContainer = document.getElementById('cf7');
    //Creo una variable que contiene el elemento que quiero insertar
    var structureTitle = document.createElement('div');
    //utilizo appenchild para insertar el div en la estructura
    structureContainer.appendChild(structureTitle);
    //Añado el atributo id al div creado
    structureTitle.setAttribute('id', 'structTitle');
    //obtengo el div creado por medio del atributo id para trabajar en el
    var titleS = document.getElementById('structTitle');
    //añado la clase que da el estilo al titulo
    if (titleSite.length < 15){
        titleS.classList.add('hero-txt');
    }else{
        titleS.classList.add('hero-txt', 'hero-txt-len');
    }

    //Almaceno el titulo del sitio actual
    /*var currentTitle = titleS.innerHTML = titleSite;*/
    var validateFunctionIf = titleSite;

    /* If quita el titulo principal de la imagen hero, esto se hizo solo para el sitio de desarrollo social */
    if (validateFunctionIf == 'Dirección de desarrollo social') {
        var currentTitle = titleS.innerHTML = '';
    }else{
        if(buffer[ validationLocalStorage ] == undefined){
            var currentTitle = titleS.innerHTML = titleSite;
        }else if (buffer[ validationLocalStorage ] != undefined){
            var currentTitle = titleS.innerHTML = buffer[ validationLocalStorage ];
        }
    }



    function addAndRemoveClass(){
        var currentText = $('#structTitle').text();
        if( currentText.length < 15){
            $('#structTitle').removeClass('hero-txt-len');
        } else if( currentText.length > 15){
            $('#structTitle').addClass('hero-txt-len');
        }
    }
    $("ul[id^='main-nav-'] > li > a").mouseover(function () {
        var currentHover = $(this).attr('title');
        titleS.innerHTML = currentHover;
        addAndRemoveClass();

    });
    $("ul[id^='main-nav-'] > li > a").mouseout(function () {
        titleS.innerHTML = currentTitle;
        addAndRemoveClass();
    });

    $('.escudo-municipal').on('click', function () {
        localStorage.clear();
    });
});

/************************************************************************************************************************************************************************************************************/
(function($){
    $(document).ready(

        function(){
            // Comprobar si estamos, al menos, 100 px por debajo de la posición top
            // para mostrar o esconder el botón volver arriba
            $(window).scroll(function(){
                if ( $(this).scrollTop() > 100 ) {
                    $('.scroll-to-top').fadeIn();
                } else {
                    $('.scroll-to-top').fadeOut();
                }
            });

            // al hacer click, animar el scroll hacia arriba
            $('.scroll-to-top').click( function( e ) {
                e.preventDefault();
                $('html, body').animate( {scrollTop : 0}, 800 );
            });

            // Widget estructura HTML Categorías
            //Crea e inserta el div que contendra el ul
            $('.wrapper-title-list').after('<div class="wrapper-list"></div>');
            //Identifica solo el ul directo de categorías recientes y le añade una clase
            $('.col-md-3 > div[id^="categories-"] > ul').addClass('ul-cat');
            //Selecciona la clase recien creada y la mueve al div con la clase .wrapper-list
            $('.ul-cat').appendTo('.col-md-3 > div[id^="categories-"] > .wrapper-list');
            //Inserta un div vacio despues de la etiqueta a que es la animación del link
            $('.cat-item > a').after('<div></div>');

            // Widget estructura HTML Entradas recientes
            //Identifica solo el ul directo de entradas recientes y le añade una clase
            $('.col-md-3 > div[id^="recent-posts-"] > ul').addClass('ul-ent');
            //Selecciona la clase recien creada y la mueve al div con la clase .wrapper-list
            $('.ul-ent').appendTo('.col-md-3 > div[id^="recent-posts-"] > .wrapper-list');
            //Añade la clase ent-item al ul
            $('.ul-ent li').addClass('ent-item');
            //Inserta un div vacio despues de la etiqueta a que es la animación del link
            $('.ent-item > a').after('<div></div>');

        });

    $("h3[class='widget-title']").after( "<div></div>" );
    /* If mobile browser, prevent click on parent nav item from redirecting to URL */
    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
        $(window).on('scroll', function () {
            if ($(this).scrollTop() >= 1) {
                $('#mmMain').addClass('navbar-fijado-top scroll-top-mm navbarB');
                $('div[data-header="background"]').addClass('data-back');
                $('#navB').addClass('navbar-toggle-scroll');
                // $('main').css('margin-top', '70px');
                $('.escudo-municipal img').css('max-width','125px');
                $('div[data-header="background"]').css('padding-bottom', '1em');
            } else {
                $('#mmMain').removeClass('navbar-fijado-top scroll-top-mm navbarB').addClass('navbar');
                $('div[data-header="background"]').removeClass('data-back');
                $('#navB').removeClass('navbar-toggle-scroll');
                $('.escudo-municipal img').css('max-width','175px');
                $('div[data-header="background"]').css('padding-bottom', '2em');
                // $('main').css('margin-top', '0');
            }

        });
    }else{
        (function($){
            $(document).ready(function(){
                var titleVeryLong = document.getElementById("structTitle").textContent.length;
                if(titleVeryLong > 20){
                    document.getElementById("structTitle").style.fontSize = "22px";
                }
            });
        })(jQuery);
    }
})(jQuery);


(function($){
    $(document).ready(function(){
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);

//Agregar paddding
$(function () {
    $('#navB').on('click', function (e) {

        var menuItem = $( e.currentTarget );

        if (menuItem.attr( 'aria-expanded') === 'true') {
            $(this).attr( 'aria-expanded', 'false');
            e.preventDefault();
            $('body').css('overflow', 'auto');
            $('#mmMain').removeClass('add-Padding');
        } else {
            $(this).attr( 'aria-expanded', 'true');
            e.preventDefault();
            $('body').css('overflow', 'hidden');
            $('#mmMain').addClass('add-Padding');
        }
    });
});


