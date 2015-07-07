<html>
<head>
    <title>Home Page</title>

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"-->

    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/material.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/material-fullpalette.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/roboto.min.css') !!}

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">AOG</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('items') ? 'active' : '' }}"><a href="{{ route('items.index') }}">Items <span class="sr-only">(current)</span></a></li>
                    <li class="{{ Request::is('categories') ? 'active' : '' }}"><a href="{{ route('categories.index') }}">Categories</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="content">
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