<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

        <title>Quarx: {{ ucfirst(request()->segment(2)) }}</title>

        <link rel="icon" type="image/ico" href="{!! Quarx::asset('images/favicon.ico', 'image/ico') !!}?v2">
        <link rel="icon" type="image/png" sizes="32x32" href="{!! Quarx::asset('images/favicon-32x32.png', 'image/png') !!}?v2">
        <link rel="icon" type="image/png" sizes="96x96" href="{!! Quarx::asset('images/favicon-96x96.png', 'image/png') !!}?v2">
        <link rel="icon" type="image/png" sizes="16x16" href="{!! Quarx::asset('images/favicon-16x16.png', 'image/png') !!}?v2">

        <!-- Bootstrap -->
        {!! Minify::stylesheet('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css') !!}
        {!! Minify::stylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}

        <!-- App style -->
        {!! Minify::stylesheet(Quarx::asset('dist/css/all.css', 'text/css')) !!}

        <!-- Bootstrap Theme -->
        {!! Minify::stylesheet(Quarx::asset('themes/bootstrap-'.Config::get('quarx.backend-theme', 'united').'.css', 'text/css')) !!}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('stylesheets')

        <script type="text/javascript">

            var _token = '{!! Session::token() !!}';
            var _url = '{!! url("/") !!}';
            var _pixabayKey = '{!! env('PIXABAY', '') !!}';

        </script>
    </head>
    <body>

        @include('quarx::layouts.loading-overlay')

        <div class="quarx-modal">
            <div class="container">
                <div class="raw100 quarx-modal-content">
                </div>
            </div>
        </div>

        <div class="quarx-notification">
            <div class="quarx-notify">
                <p class="quarx-notify-comment"></p>
            </div>
            <div class="quarx-notify-closer">
                <span class="glyphicon glyphicon-remove quarx-notify-closer-icon"></span>
            </div>
        </div>

        @yield("navigation")

        <div class="container-fluid raw-margin-bottom-50">
            <div class="row">
                @yield("page-content")
            </div>
        </div>

        <script type="text/javascript">

            var _apiKey = '{!!  Config::get("quarx.api-key") !!}';
            var _apiToken = '{!!  Config::get("quarx.api-token") !!}';

        </script>

        {!! Minify::javascript(Quarx::asset('js/jquery.min.js', 'application/javascript')) !!}
        {!! Minify::javascript(Quarx::asset('dist/js/all.js', 'application/javascript')) !!}

        <script type="text/javascript">

            @include('quarx::notifications')

        </script>

        @yield("javascript")
    </body>
</html>