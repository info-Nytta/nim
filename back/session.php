<?php
session_start();
$_SESSION['id']=session_id();
if (!isset($_SESSION['szint_ok'])) $_SESSION['szint_ok']=$_SESSION['szint']=11;

if (isset($_GET["p"]) && $_GET["p"]=='reset') 
{ 
	//$path= explode('/',$_SERVER['REQUEST_URI']);
	//$file= explode('&',$path[count($path)-1])[0];
	session_unset(); 
	session_destroy(); 
	header('Location: ./');
}

?>