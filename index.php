<?php
define('NIMJATEK', '1.0');

//
require_once('back/glob.php');

//abkezelés
require_once('back/db_connect.php');
require_once('back/db_function.php');

//sessionkezelés
require_once('back/session.php');



//általános funkciók betöltése


//weboldal betöltése
require_once('front/main.php');
?>