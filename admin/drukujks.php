<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sielata drukowanie karty startowej</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../css/kartastartowa.css'>
    <link rel="stylesheet" type="text/css" media="print" href="../css/print.css" />
    
</head>
<body>
    <?php
        $CzySenior=$_GET['czysenior'];
        $CzyMlod=$_GET['czymlodz'];
        $CzyKarton=$_GET['czykarton'];
        $CzyPlastik=$_GET['czyplastik'];
        $JakiOrder=$_GET['jakiorder'];
        $IdMod=$_GET['idmod'];
        $OdNumeru=$_GET['odnumeru'];
    ?>
    <div name="content">
        <input type="hidden" id="czysenior" value="<?php echo $CzySenior; ?>"/>
        <input type="hidden" id="czymlod" value="<?php echo $CzyMlod; ?>"/>
        <input type="hidden" id="czykarton" value="<?php echo $CzyKarton; ?>"/>
        <input type="hidden" id="czyplastik" value="<?php echo $CzyPlastik; ?>"/>
        <input type="hidden" id="jakiorder" value="<?php echo $JakiOrder; ?>"/>
        <input type="hidden" id="idmod" value="<?php echo $IdMod; ?>"/>
        <input type="hidden" id="odnumeru" value="<?php echo $OdNumeru; ?>"/>
        <p></p></br>
        <div id="kartystartowe">
            
        </div>     
      
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='../js/drukowanie.js' type="text/javascript"></script> 

</body>
</html>