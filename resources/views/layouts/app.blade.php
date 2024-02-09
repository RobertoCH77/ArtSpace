<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ArtSpace') }}</title>

    <link rel="icon" href="{{ asset('imagenes/logo-simple/artspace-logo.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- estilos de jquery ui --}}
    <link rel="stylesheet" href="{{ asset('vendor\jquery-ui-1.13.2\jquery-ui.min.css') }}">

    {{-- estilos font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    @livewireStyles

    <style>
        a {
            text-decoration: none;
        }

        .wrappers {
            overflow: hidden;
        }

        .wrappers img {
            transition: scale 400ms;
        }

        .wrappers:hover img {
            scale: 115%;
            /* 120% */
        }

        /* icono play */
        .video-indicator {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.993);
            padding: 3px;
            border-radius: 50%;
            font-size: 36px;
            color: black;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .video-indicator:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .video-indicator i {
            display: block;
        }

        /* fin icono play */

        /* btn scroll */
        @keyframes pulsate {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        #scrollUp {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-image: url("{{ asset('imagenes/scrollUp/scrollUp.png') }}");
            background-size: cover;
            border-radius: 50%;
            animation: pulsate 2s infinite;
            /* 2s de duración, se repite infinitamente */
        }

        /* fin btn scroll */

        /* pie de pagina */
        .row {
            margin: 0 auto;
            zoom: 1;
        }

        .developer-info {
            text-align: center;
            margin-bottom: 40px;
        }

        /*regla para centrar verticalmente la imagen en .developer-info */
        .developer-info img {
            display: block;
            margin: 0 auto;
        }

        .row:before,
        .row:after {
            content: "";
            display: table;
        }

        .row:after {
            clear: both;
        }

        ul {
            margin: 15px 0;
            list-style: none;
        }

        .section-footer {
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            width: 100%;
            text-rendering: optimizeLegibility;
        }

        .nav-footer {
            list-style: none;
            float: left;
            margin: 50px 0;
            margin-left: 15%;
        }

        .nav-footer li {
            margin-top: 10px;
        }

        .nav-footer li a {
            text-decoration: none;
            color: #e5e7eb;
            font-size: 18px;
            font-family: lato, Arial, Helvetica, sans-serif;
            font-style: normal;
            font-weight: 400;
        }

        .i-icon {
            color: #e5e7eb;
        }

        .social-links {
            list-style: none;
            float: right;
            margin-top: 20vh;
        }

        .social-links li {
            display: inline-block;
            margin-left: 20px;
            margin-top: 20px;
        }

        .social-links ul li a {
            font-size: 30px;
        }

        .i-github {
            color: rgb(255, 255, 255);
        }

        .i-twitter {
            color: rgb(255, 255, 255);
        }

        .i-facebook {
            color: rgb(59, 59, 152);
        }

        .i-google {
            color: rgb(219, 50, 54);
        }

        .i-linkedin {
            color: rgb(37, 211, 102);
        }

        .i-instagram {
            color: rgb(125, 37, 125);
        }

        .nav-footer li a:hover,
        .nav-footer li a:active {
            color: rgb(177, 173, 173);
        }

        h4 {
            text-align: center;
            font-family: cursive, lato, Arial, Helvetica, sans-serif;
            font-size: 35px;
            font-weight: 400;
            margin-bottom: 40px;
            color: rgb(8, 150, 3);
        }

        cite {
            margin: 20px auto;
            font-size: 25px;
            font-family: lato, Arial, Helvetica, sans-serif;
            font-weight: 400;
            font-style: normal;
            color: #fff;
        }

        cite img {
            height: 80px;
            width: 80px;
            border-radius: 50%;
            border: 2px solid #fff;
            vertical-align: middle;
        }

        h5 {
            text-align: center;
            font-family: cursive, lato, Arial, Helvetica, sans-serif;
            font-size: 15px;
            font-weight: 400;
            margin-bottom: 40px;
            color: #e5e7eb;
        }

        .section-say {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(../images/heritage-site/pasupatinath.jpeg);
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            padding-top: 40px;
        }

        .their-say {
            padding: 40px 0;
            width: 80%;
            margin-left: 14%
        }

        .topic h2 {
            margin-top: 40px;
            color: #F9A602;
        }

        blockquote {
            width: 80%;
            padding: 2%;
            line-height: 25px;
            ;
            font-family: lato, Arial, Helvetica, sans-serif;
            font-weight: 400;
            font-size: 16px;
            color: #bdc3c7;
            letter-spacing: 1px;
            word-spacing: 1.5px;
            text-align: left;

        }

        blockquote cite {
            display: block;
            color: #060ae9;
            font-size: 20px;
        }

        blockquote::before {
            margin-top: 5px;
            font-size: 80px;
            color: #fff;
            display: block;
            content: "\201C";
        }

        blockquote cite img {
            height: 50px;
            width: 50px;
        }

        .left,
        .right,
        .nav-footer,
        .social-links {
            width: 40%;
            ;
        }

        /* links redes sociales centrados */
        .social-links-below {
            list-style: none;
            text-align: center;
            /* Centrar los enlaces */
            margin-top: 20px;
            /* Espacio entre el bloque "Desarrollado por" y los enlaces */
        }

        .social-links-below li {
            display: inline-block;
            margin-left: 10px;
            /* Espacio entre los enlaces */
        }

        .social-links-below li:first-child {
            margin-left: 0;
            /* Eliminar el espacio izquierdo para el primer enlace */
        }

        /* en linea el foto con el texto */
        .developer-info h4 {
            text-align: center;
        }

        .developer-info h4 img {
            display: inline-block;
            vertical-align: middle;
            /* Alinea verticalmente la imagen */
            margin-right: 10px;
            /* Espacio entre la imagen y el texto */
        }

        .developer-info cite {
            display: inline-block;
            vertical-align: middle;
            /* Alinea verticalmente el texto */
        }

        @media only screen and (max-width: 768px) {
            .developer-info {
                text-align: center;
                margin-top: 20px;
            }

            .social-links-below {
                margin-top: 10px;
                /* Reducir el espacio entre el bloque "Desarrollado por" y los enlaces en dispositivos móviles */
            }

            .social-links-below li {
                margin-left: 5px;
                /* Reducir el espacio entre los enlaces en dispositivos móviles */
            }
        }

        /* fin pie de pagina */
    </style>
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <!-- Pie de página -->
    <footer class="section-footer bg-gray-800" id="author">
        <div class="row">
            <ul class="nav-footer">
                <li><a href="{{ route('acerca.acercaDe') }}"><i class="fa fa-info-circle i-icon" aria-hidden="true"></i>&nbsp;Acerca de</a></li>
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in i-icon" aria-hidden="true"></i>&nbsp;Registar
                        o Iniciar sesión</a></li>
                <li><a href="#"><i class="fa fa-arrow-up i-icon" aria-hidden="true"></i>&nbsp;Ve arriba</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="developer-info">
                <h4>
                    Desarrollado por <cite><img src="{{ asset('imagenes/admin/rch.jpg') }}" alt="foto de perfil">
                        Roberto Chacón</cite>
                </h4>
                <ul class="social-links-below">
                    <li><a href="https://github.com/Robert9507" target="_blank"><i class="fa fa-github fa-2x i-github"
                                aria-hidden="true"></i></a></li>
                    <li><a href="https://playful-licorice-2e45c8.netlify.app/" target="_blank"><i
                        class="fa fa-briefcase fa-2x i-google" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter i-twitter fa-2x"
                                aria-hidden="true"></i></a></li>
                    <li><a href="https://facebook.com/profile.php?id=61550661464177" target="_blank"><i
                                class="fa fa-facebook-official i-facebook fa-2x" aria-hidden="true"></i></a></li>
                    <li><a href="https://wa.me/0999779340" target="_blank"><i class="fa fa-whatsapp i-linkedin fa-2x"
                                aria-hidden="true"></i></a></li>
                    <li><a href="https://instagram.com/robertch4c/" target="_blank"><i
                                class="fa fa-instagram i-instagram fa-2x" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <h5>Copyright &copy; 2024. Todos los derechos reservados.<br />ArtSpace</h5>
        </div>
    </footer>
    <!-- fin Pie de página -->

    {{-- libreria jQuery ui --}}
    <script src="{{ asset('vendor\jquery\jquery.min.js') }}"></script>
    <script src="{{ asset('vendor\jquery-ui-1.13.2\jquery-ui.min.js') }}"></script>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/4b8e039d18.js" crossorigin="anonymous"></script>

    {{-- buscador --}}
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('toggleVisibility', isVisible => {
                toggleVisibility(isVisible);
            });

            Livewire.on('scrollToTop', () => {
                scrollToTop();
            });

            function toggleVisibility(isVisible) {
                const button = document.querySelector('.scroll-to-top-button');
                if (button) {
                    button.style.display = isVisible ? 'block' : 'none';
                }
            }

            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
    </script>

    <!-- btn scroll -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    {{-- jquery.scrollUp.js --}}
    <script>
        (function($, window, document) {
            'use strict';

            // Main function
            $.fn.scrollUp = function(options) {

                // Ensure that only one scrollUp exists
                if (!$.data(document.body, 'scrollUp')) {
                    $.data(document.body, 'scrollUp', true);
                    $.fn.scrollUp.init(options);
                }
            };

            // Init
            $.fn.scrollUp.init = function(options) {

                // Define vars
                var o = $.fn.scrollUp.settings = $.extend({}, $.fn.scrollUp.defaults, options),
                    triggerVisible = false,
                    animIn, animOut, animSpeed, scrollDis, scrollEvent, scrollTarget, $self;

                // Create element
                if (o.scrollTrigger) {
                    $self = $(o.scrollTrigger);
                } else {
                    $self = $('<a/>', {
                        id: o.scrollName,
                        href: '#top'
                    });
                }

                // Set scrollTitle if there is one
                if (o.scrollTitle) {
                    $self.attr('title', o.scrollTitle);
                }

                $self.appendTo('body');

                // If not using an image display text
                if (!(o.scrollImg || o.scrollTrigger)) {
                    $self.html(o.scrollText);
                }

                // Minimum CSS to make the magic happen
                $self.css({
                    display: 'none',
                    position: 'fixed',
                    zIndex: o.zIndex
                });

                // Active point overlay
                if (o.activeOverlay) {
                    $('<div/>', {
                        id: o.scrollName + '-active'
                    }).css({
                        position: 'absolute',
                        'top': o.scrollDistance + 'px',
                        width: '100%',
                        borderTop: '1px dotted' + o.activeOverlay,
                        zIndex: o.zIndex
                    }).appendTo('body');
                }

                // Switch animation type
                switch (o.animation) {
                    case 'fade':
                        animIn = 'fadeIn';
                        animOut = 'fadeOut';
                        animSpeed = o.animationSpeed;
                        break;

                    case 'slide':
                        animIn = 'slideDown';
                        animOut = 'slideUp';
                        animSpeed = o.animationSpeed;
                        break;

                    default:
                        animIn = 'show';
                        animOut = 'hide';
                        animSpeed = 0;
                }

                // If from top or bottom
                if (o.scrollFrom === 'top') {
                    scrollDis = o.scrollDistance;
                } else {
                    scrollDis = $(document).height() - $(window).height() - o.scrollDistance;
                }

                // Scroll function
                scrollEvent = $(window).scroll(function() {
                    if ($(window).scrollTop() > scrollDis) {
                        if (!triggerVisible) {
                            $self[animIn](animSpeed);
                            triggerVisible = true;
                        }
                    } else {
                        if (triggerVisible) {
                            $self[animOut](animSpeed);
                            triggerVisible = false;
                        }
                    }
                });

                if (o.scrollTarget) {
                    if (typeof o.scrollTarget === 'number') {
                        scrollTarget = o.scrollTarget;
                    } else if (typeof o.scrollTarget === 'string') {
                        scrollTarget = Math.floor($(o.scrollTarget).offset().top);
                    }
                } else {
                    scrollTarget = 0;
                }

                // To the top
                $self.click(function(e) {
                    e.preventDefault();

                    $('html, body').animate({
                        scrollTop: scrollTarget
                    }, o.scrollSpeed, o.easingType);
                });
            };

            // Defaults
            $.fn.scrollUp.defaults = {
                scrollName: 'scrollUp', // Element ID
                scrollDistance: 300, // Distance from top/bottom before showing element (px)
                scrollFrom: 'top', // 'top' or 'bottom'
                scrollSpeed: 300, // Speed back to top (ms)
                easingType: 'linear', // Scroll to top easing (see http://easings.net/)
                animation: 'fade', // Fade, slide, none
                animationSpeed: 200, // Animation in speed (ms)
                scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
                scrollTarget: false, // Set a custom target element for scrolling to. Can be element or number
                scrollText: 'Scroll to top', // Text for element, can contain HTML
                scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
                scrollImg: false, // Set true to use image
                activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                zIndex: 2147483647 // Z-Index for the overlay
            };

            // Destroy scrollUp plugin and clean all modifications to the DOM
            $.fn.scrollUp.destroy = function(scrollEvent) {
                $.removeData(document.body, 'scrollUp');
                $('#' + $.fn.scrollUp.settings.scrollName).remove();
                $('#' + $.fn.scrollUp.settings.scrollName + '-active').remove();

                // If 1.7 or above use the new .off()
                if ($.fn.jquery.split('.')[1] >= 7) {
                    $(window).off('scroll', scrollEvent);

                    // Else use the old .unbind()
                } else {
                    $(window).unbind('scroll', scrollEvent);
                }
            };

            $.scrollUp = $.fn.scrollUp;

        })(jQuery, window, document);
    </script>

    <!-- btn scroll -->
    <script>
        $(function() {
            $.scrollUp({
                scrollImg: true,
            });
        });
    </script>
</body>

</html>
