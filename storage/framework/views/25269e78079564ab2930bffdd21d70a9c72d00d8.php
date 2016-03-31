<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>Grožio paieškos</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(URL::to('/')); ?>/css/frontend.css" rel="stylesheet">
    <script src="<?php echo e(URL::to('/')); ?>/js/libraries.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/js/frontend.js"></script>

</head>

<body>

<div class="container">

    <?php echo $__env->yieldContent('content'); ?>

</div> <!-- /container -->
</body>
</html>