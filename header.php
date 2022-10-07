<?php 	if(!defined('NIMJATEK')) die(header('Location: ../?p=403')); ?>

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
	<title>Nim játék</title>
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
				if($_SESSION['login']) echo "
				Üdv <span style='text-transform: capitalize;'>".$_SESSION['user']."</span>!";
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
			<a href='./?p=uj'>
				<img src="./img/new.png" alt='' title='Új játék'>
				Új játék
			</a>
			<a href='./?p=szintek'>
				<img src="./img/szintek.png" alt='' title='Szintek'>
				Szintek
			</a>
			<a href="./?p=nim">
				<img src="./img/szabaly.png" alt='' title='Játékszabály'>
				Játékszabály
			</a>
			<!--
			<a href='./?p=nevjegy'>
				<img src="./img/nevjegy.png" alt='' title='Névjegy'>
				Névjegy
			</a>
			-->
			<?php
			if (!$_SESSION['login']) echo "
			<a href='./?p=belepes'>
				<img src='./img/login.png' alt='' title='Belépés'>
				Belépés
			</a>";
			else echo "
			<a href='./?logout=".$_SESSION['id']."'>
				<img src='./img/logout.png' alt='' title='Kilépés'>
				Kilépés
			</a>";
			?>
		</div>
	</div>

</div>	

<main>
