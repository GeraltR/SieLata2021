<?php
    session_start();
    $response = array(array());
    $response['admin']['id']=0;
    $response['admin']['nazwa']='';
    $response['admin']['upraw']=0;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        if (isset($_SESSION['idkto']))
        $response['admin']['id']=$_SESSION['idkto'];
        if (isset($_SESSION['kto']))  
        $response['admin']['nazwa']=$_SESSION['kto'];
        if (isset($_SESSION['admin']))  
        $response['admin']['upraw']=$_SESSION['admin'];
    }
    header( 'Content-Type: application/json' );
	echo json_encode($response);
?>