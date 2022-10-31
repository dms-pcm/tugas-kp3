<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#6777ef"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/mystyle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <title>Document</title>
    @livewireStyles
</head>
<body style="background-color:#1f2029;">
    @livewire('auth.login')

    @jquery
    @livewireScripts
    @toastr_js
    @toastr_render
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script src="{{asset('assets/plugins/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script>
        // $( document ).ready(function() {
        //     console.log( "ready!" );
        // });

        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }

        window.addEventListener('alert', event => {
					toastr[event.detail.type](event.detail.message,
						event.detail.title ?? ''), toastr.options = {
				"closeButton": true,
				"progressBar": true,
			}
		});
    </script>
</body>
</html>