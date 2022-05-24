<?php
  error_reporting(0);
  //$UserName = $_POST['username'];
  $response = array();
  require_once('../lib/baza.php');

  $baza = new festiwal;
  //$wynik= $baza->Daj_UnikalnyKod($UserName);
  $nowe = md5(time());
  $nowe = substr($nowe, 1, 6);
  $response[haslo] = $nowe;
  header( 'Content-Type: application/json' );
  echo json_encode($response);
?>