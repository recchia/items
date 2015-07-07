<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
        {!! Html::style('bower_components/bootstrap-material-design/dist/css/material.min.css') !!}
        {!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!}
        {!! Html::style('bower_components/bootstrap-material-design/dist/css/material-fullpalette.min.css') !!}
        {!! Html::style('bower_components/bootstrap-material-design/dist/css/roboto.min.css') !!}

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin-top: 5em;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Roboto Condensed';
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="content">
                @yield('content')
            </div>
        </div>
        {!! Html::script('bower_components/jquery/dist/jquery.js') !!}
        {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
        {!! Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') !!}
        {!! Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') !!}

        <script type="text/javascript">
            $(document).on('ready',function(){
                $.material.init();
            });
        </script>
    </body>
</html>
