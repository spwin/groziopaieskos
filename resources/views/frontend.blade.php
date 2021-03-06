<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::to('/') }}/favicon.ico">
    <!--
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Grožio paieškos</title>

    <link href="{{ URL::to('/') }}/css/jquery.qtip.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/css/frontend.css" rel="stylesheet">
    <script src="{{ URL::to('/') }}/js/libraries.js"></script>
    <script src="{{ URL::to('/') }}/js/frontend.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.qtip.min.js"></script>

</head>

<body>

<div class="container">

    @yield('content')
    <div class="footer">
        <p>©UAB GIB 24, 2016</p>
    </div>
</div> <!-- /container -->

</body>
</html>