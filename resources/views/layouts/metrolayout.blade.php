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
            <a href="index.php" class="brand no-hover">
                <span style="width: auto;" class="p-2 border bd-dark border-radius">
                    <sub class="mif-eye mif-5x fb-black"></sub>&nbsp; TCSE Eyes
                </span>
            </a>

            <ul class="app-bar-menu" style="display:inline; float:left;">
                <li><a href="{{ url('/dashboard-prima') }}"><strong>Dashboard</strong></a></li>
                <li><a href="{{ url('/ioc-investigation') }}"><strong>Investigation</strong></a></li>
                <li><a href="{{ url('/ioc-duplicates') }}"><strong>Duplicate IOCs</strong></a></li>
                <li><a href="{{ url('/ioc-hidden') }}"><strong>Hidden IOCs</strong></a></li>
                <li><a href="{{ url('/ioc-details') }}"><strong>IOC Details</strong></a></li>
                <li><a href="{{ url('/ioc-summary') }}"><strong>Testing Summary</strong></a></li>
                <li><a href="{{ url('/ioc-publishing') }}"><strong>Publishing</strong></a></li>
                <li>
                    <a href="#" class="dropdown-toggle"><strong>Aldrin Tadeo</strong></a>
                    <ul class="d-menu" data-role="dropdown">
                        <li class="divider bg-lightGray"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>

            <div>
                
            </div>
        </div>
        <div id="particles-js" style="position:fixed; top:0; z-index:-100; height:100%; width:100%; opacity:0.4;"></div>



        @yield('content')



        <script src="{{ asset('js/metro.min.js') }}"></script>
        <script src="{{ asset('js/particles.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
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