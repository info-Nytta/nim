<?php 	if(!defined('NIMJATEK')) die(header('Location: ../?p=403')); 

?>

<!doctype html>
<html lang='hu'>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
	<link rel="stylesheet" href="./css/mystyle.css">
	<link rel="stylesheet" href="./css/menu.css">
	<link rel='icon' type="image/png" href='./icon.png' />
	<script type="text/javascript" src="./js/scripts.js"></script>
	<title>Nim game</title>
</head>
<body>
<nav>
<div class="content">
	<div class="top">
			<div id="logo">
				<a href='./'><img src="./img/new.png" style="height:50px;float:left;margin-top:5px;"></a>
			</div>
			<div id='udv' style="height:50px;float:left;margin:auto;text-align:center;padding-top:15px;">
				<?php
				if(isset($_SESSION['login']) && $_SESSION['login']) echo "
				Hi ".$_SESSION['user']."!";
				?>
			</div>
			<div id="hamburger" onclick="myMobilMenu()">
				<span id='hicon'><img src='img/hamburger01.png' style='height:50px;'></span>
			</div>
	</div>
	<hr>
</div>
</nav>
<div class='content'>		
	<div id="myNav" class="overlay">
		<div class="overlay-content" style='font-size:50%'>
			<a href='./new'>
				<img src="./img/new.png" alt='' title='New game'>
				New game
			</a>
			<a href='./levels'>
				<img src="./img/szintek.png" alt='' title='Levels'>
				Levels
			</a>
			<a href="./nim">
				<img src="./img/szabaly.png" alt='' title='Rule'>
				Rule
			</a>
			<!--
			<a href='./?p=nevjegy'>
				<img src="./img/nevjegy.png" alt='' title='Névjegy'>
				Névjegy
			</a>
			-->
			<?php
			if (!$_SESSION['login']) echo "
			<a href='./login'>
				<img src='./img/login.png' alt='' title='Log In'>
				Log In
			</a>";
			else echo "
			<a href='./?logout=".$_SESSION['id']."'>
				<img src='./img/logout.png' alt='' title='Log Out'>
				Log Out
			</a>";
			?>
		</div>
	</div>

</div>	

<main>
