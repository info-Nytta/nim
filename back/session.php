<?php
session_start();
if (!isset($_SESSION['id'])) {
	$_SESSION['id']=session_id();
	$_SESSION['login']=false;
	$_SESSION['szint_ok']=$_SESSION['szint']=1;
	$_SESSION['nyert'][$_SESSION['szint']]=0;
}
else {
	// itt igazából csak az adatbázisból kellne kiolvasni a szinteket és pontokat,
	// és nem itt kéne számoltatni, meg hozzáadni
	// csak előbb meg kell vizsgálni, hogy az illető be van-e lépve.
	if ($_SESSION['login']) 
		$_SESSION['nyert'][$_SESSION['szint']]=pontszam(user_id($_SESSION['uid']),$_SESSION['szint']);
	
	
	if (isset($_POST['pp']) && $_POST['pp']==1) {
		unset($_POST['pp']);	
		$_SESSION['nyert'][$_SESSION['szint']]++;
		if ($_SESSION['login']) 
			ujpont(user_id($_SESSION['uid']),$_SESSION['szint'],$_SESSION['nyert'][$_SESSION['szint']]);
		if ($_SESSION['nyert'][$_SESSION['szint']]==SZINTEK['ugras']) {
			if ($_SESSION['szint_ok']< SZINTEK['utolso']) {
				$_SESSION['szint_ok']++;
				//$_SESSION['szint']=$_SESSION['szint_ok'];
				$_SESSION['nyert'][$_SESSION['szint_ok']]=0;
				if ($_SESSION['login'])
					ujszint(user_id($_SESSION['uid']),$_SESSION['szint_ok']);
			}
			//header('Location: ./?p=szintek');
		}
		
		
		header('Location: ./?p=uj');
	}
}

// ez a get-es cucc sem idevaló, átrakni, és login-t vizsgálni
if (isset($_GET["logout"]) && $_GET["logout"]==$_SESSION['id']) 
{ 
	//$path= explode('/',$_SERVER['REQUEST_URI']);
	//$file= explode('&',$path[count($path)-1])[0];
	session_unset(); 
	session_destroy(); 
	header('Location: ./');
}

?>