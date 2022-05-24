<?php
ob_start();

session_start();

$_SESSION = array();
$_SESSION["login"]='';
$_SESSION["kto"] = '';
session_destroy();

header( 'Content-Type: application/json' );
echo json_encode('');
ob_end_flush();
?>