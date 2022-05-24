<?php
  session_start();
  unset($_SESSION['wynikLogowania']);
  unset($_SESSION['admin']);
  unset($_SESSION['kto']);
  unset($_SESSION['idkto']);
  session_destroy();

?>