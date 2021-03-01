@php
/*
    //Prep db connection details and open connection.
    $srvname = base64_decode("bG9jYWxob3N0");
    $usrname = base64_decode("dGNzZWV5ZXM=");
    $passwd = base64_decode("dGNzZWV5ZXNARXNjQGxAdGU5ODc=");
    $dbname = base64_decode("dGNzZWV5ZXM=");

    // Start/create db connection
    $conn = new mysqli($srvname, $usrname, $passwd, $dbname);

    // Check connection if can connect
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
*/
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="{{ asset('css/metro-all.min.css') }}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body class="pt-11">
        <div data-role="appbar" data-expand-point="md" class="bg-crimson fg-white" style="border:1 solid black !important;">
            <a href="/" class="brand no-hover">
                <span style="width: auto;" class="p-2 border bd-dark border-radius">
                    <sub class="mif-eye mif-5x fb-black"></sub>&nbsp; TCSE Eyes
                </span>
            </a>

            <ul class="app-bar-menu">
                <li>
                    <a href="{{ url('/dashboard-prima') }}" class="dropdown-toggle"><strong>Dashboard</strong></a>
                    <ul class="d-menu" data-role="dropdown">
                        <li class="bg-crimson fg-white"><a href="/dashboard-prima">All Blogs</a></li>
                        <li class="bg-crimson fg-white"><a href="/iocs">All IOC</a></li>
                        <li class="bg-crimson fg-white"><a href="/files">All Files</a></li>
                        <li class="bg-crimson fg-white"><a href="/urls">All URLs</a></li>
                        <li class="bg-crimson fg-white"><a href="/emails">All Emails</a></li>
                        <li class="bg-crimson fg-white"><a href="/domains">All Domains</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/ioc-investigation') }}"><strong>Investigation</strong></a></li>
                <li><a href="{{ url('/ioc-duplicates') }}"><strong>Duplicate IOCs</strong></a></li>
                <li><a href="{{ url('/ioc-hidden') }}"><strong>Hidden IOCs</strong></a></li>
                <li><a href="{{ url('/ioc-summary') }}"><strong>Testing Summary</strong></a></li>
                <li><a href="{{ url('/ioc-publishing') }}"><strong>Publishing</strong></a></li>
            </ul>
        </div>
        <div id="particles-js" style="position:fixed; top:0; z-index:-100; height:100%; width:100%; opacity:0.4;"></div>


        @yield('content')



        <script src="{{ asset('js/metro.min.js') }}"></script>
        <script src="{{ asset('js/particles.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
            CKEDITOR.replace( 'article-ckeditor-summary' );
        </script>
    </body>
</html>

@php
/*
    //Close db conn
    try {
        $conn->close();
    }    
    catch (dbconnexception $e) {
        echo "</br></br></br>";
        echo "Db connection is already closed: ". $e->getMessage();
    }
*/
@endphp