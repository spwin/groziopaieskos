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

    <title>Grožio paieškos</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('/') }}/css/admin.css" rel="stylesheet">
    <script src="{{ URL::to('/') }}/js/libraries.js"></script>
    <script src="{{ URL::to('/') }}/js/frontend.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

    @yield('content')

</div> <!-- /container -->
@stack('scripts')
</body>
</html>