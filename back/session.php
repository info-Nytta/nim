<?php
session_start();
$_SESSION['id']=session_id();
if (!isset($_SESSION['szint_ok'])) {
	$_SESSION['szint_ok']=$_SESSION['szint']=11;
	$_SESSION['nyert'][$_SESSION['szint']]=0;
}
else {
	if (isset($_POST['pp']) && $_POST['pp']==1) {
		unset($_POST['pp']);	
		$_SESSION['nyert'][$_SESSION['szint']]++;
		if ($_SESSION['nyert'][$_SESSION['szint']]==SZINTEK['ugras']) {
			if ($_SESSION['szint_ok']< SZINTEK['utolso']) {
				$_SESSION['szint_ok']++;
				$_SESSION['szint']=$_SESSION['szint_ok'];
			}
			$_SESSION['nyert'][$_SESSION['szint_ok']]=0;
			header('Location: ./?p=szintek');
		}
		else 
			header('Location: ./?p=uj');
	}
}

if (isset($_GET["p"]) && $_GET["p"]=='reset') 
{ 
	//$path= explode('/',$_SERVER['REQUEST_URI']);
	//$file= explode('&',$path[count($path)-1])[0];
	session_unset(); 
	session_destroy(); 
	header('Location: ./');
}

?>