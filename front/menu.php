<?php
if(!defined('NIMJATEK')) 
		die(header('Location: ../?p=403'));

$page="pages/p_start.php";

// ha olyan szintet adott meg, ami már engedélyezett számára, akkor választhat, különben az eddigi szinttel játszhat tovább.
if (isset($_GET['level']))
{
	if ($_GET['level']<=$_SESSION['szint_ok']) $_SESSION['szint']=$_GET['level'];
	aktszint(user_id($_SESSION['uid']),$_SESSION['szint']);
	$page="pages/p_game.php";
}
else if (isset($_GET['p']))
{
	
	switch ($_GET['p'])
	{
		case "new": {$page="pages/p_game.php"; break;}
		case "levels": {$page="pages/p_szintek.php"; break;}
		case "nim": {$page="pages/p_nim.php"; break;}
		case "nevjegy": {$page="pages/p_start.php"; break;}
		case "login": {$page="pages/p_login.php"; break;}
		case "registration": {$page="pages/p_reg.php"; break;}
		//case "403": {$page="./403.html"; break;}
		//case "404": {$page="./404.html"; break;}
		default: {$page="pages/p_start.php"; break;}
	}
}

?>