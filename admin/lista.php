<?php
    error_reporting(0);
    session_start();
    require_once('../lib/drukowanie.php');
    $Jaka=$_GET['jaka'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sielata drukowanie Dyplomu</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/summernote.css" >
    <link rel="stylesheet" type="text/css" href="../css/dyplom.css">
    <link rel="stylesheet" type="text/css" media="print" href="../css/print.css">
</head>
<body>
    <div name="content">

        <p></p></br>
        <div id="Lista">

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="../js/summernote.js"></script>
    <script src="../js/summernote-ext-print.js"></script>
    <script src='../js/lista.js' type="text/javascript"></script>

</body>
</html>