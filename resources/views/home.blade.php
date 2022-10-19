<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <meta name="color-scheme" content="light dark">
        <title>Messenger - 2.2.0</title>
        <link rel="shortcut icon" href="{{asset(url('assets/img/icon.png'))}}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link class="css-lt" href="{{asset('assets/css/template.bundle.css')}}" rel="stylesheet" type="text/css" media="(prefers-color-scheme: light)"/>
        <link class="css-dk" href="{{asset('assets/css/template.dark.bundle.css')}}" rel="stylesheet" type="text/css" media="(prefers-color-scheme: dark)"/>
        <script>
            if (localStorage.getItem('color-scheme')) {
                let scheme = localStorage.getItem('color-scheme');

                const LTCSS = document.querySelectorAll('link[class=css-lt]');
                const DKCSS = document.querySelectorAll('link[class=css-dk]');

                [...LTCSS].forEach((link) => {
                    link.media = (scheme === 'light') ? 'all' : 'not all';
                });

                [...DKCSS].forEach((link) => {
                    link.media = (scheme === 'dark') ? 'all' : 'not all';
                });
            }
        </script>
        @livewireStyles
    </head>

    <body>
        @yield('content')
        
        @livewireScripts
        <!-- Scripts -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <script src="{{asset('assets/js/vendor.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        <script>
            // jQuery(document).ready(function () {
            //     hide();
            // });

            function myFunction() {
                $('#content_to_scroll').animate({scrollTop: $('#content_to_scroll').prop("scrollHeight")}, 500);
            }

            function load() {
                window.location.reload();
            }

            
        </script>
    </body>
</html>