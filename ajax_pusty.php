<?php
    error_reporting(0);
    $Id = $_POST['Id'];
    $response = array(array());

    $response['uzytkownik']['id'] = $Id;
    header( 'Content-Type: application/json' );
    echo json_encode ($response);
?>
