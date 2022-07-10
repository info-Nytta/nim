<?php 	if(!defined('NIMJATEK')) die(header('Location: ../?403')); 
$szint=$_SESSION['szint'];

// ezeket is a session-ból kell kiolvasni
$nyert=$_SESSION['nyert'][$szint];

require_once('./game/functions.php');
require_once('./game/levels.php'); 
$kupacok=kupac($szint);
?>

	<script src="./game/game.js"></script> 
	<script src="./game/move.js"></script> 
	<div class="content">

		<div class='w3-display-container' style='display: inline-block;'>
			<?php
			if ($szint<SZINTEK['halado']) $kep="kezdo";
			else if ($szint<SZINTEK['profi']) $kep="halado";
			else $kep="p".($szint-(SZINTEK['profi']-1));
			echo "<img style='width:50px;' src='img/$kep.png'>";
			if ($szint<SZINTEK['profi'])echo "<div class='w3-display-middle w3-large szintszoveg'>$szint</div>";
			?>	
		</div>
		
		<div class='w3-display-container' style='display: inline-block;'>
			<img class='star' src='img/star0.png'>
			<div id='pontszam' class='w3-display-middle w3-large <?php if ($nyert>=SZINTEK['ugras']) echo "szintszoveg"; ?>'>
				<?php if ($nyert>=SZINTEK['ugras']) echo "&#9967;"; else echo $nyert;?>
			</div>			
		</div>

		<p id='szintnyert' style='display: inline-block;'>
			<?php if ($nyert>=SZINTEK['ugras']) echo $nyert; ?> 
		</p>

		<div class="buttons">
			<div id="message" style='float:left'></div>
			<?php if ($szint<SZINTEK['profi']) { ?>
			<button id='hint' onClick='javascript:hint()'><img class='icon' src='./img/hint.png'></button>
			<?php } ?>
			<button id="restart" onClick="javascript:restart()"><img class='icon' src='./img/restart.png'></button>
			<button id="back" onClick="javascript:back()"><img class='icon' src='./img/back.png'></button>
			<button class='btn' id="gep" onClick="javascript:start(true)">Gép</button>
			<button class='btn' id="jatekos" onClick="javascript:start(false)">Játékos</button>
		</div>
		<div id="uzenet"></div>
	
		<script>
		<!--
		var imgs = ["./img/ures.png","./img/gyufa.png","./img/gyufa_ff.png"];
		var imgMatrix;
		var kupacok=<?php echo json_encode($kupacok); ?>;
		var game;
		var moves;
		var playing; 
		var jeloltKupac;
		var s;		
		var pontok= <?php echo json_encode($nyert); ?>;
		
		//var N;
		//var B;
		//var C;  

		//var nrow=<?php echo count($kupacok); ?>;
		//var ncol=<?php echo $kupacok[maxi($kupacok)]; ?>; 
		//init();
		ujJatek();
		document.write("<div class='playground' id='pg'>");
		jatekTerulet(imgs[1]);
		document.write("</div>");

		//-->
	</script>
		
		<div id='lose'></div>
		<div id='win'></div>
		<div class='lepes' >
			<button id='me' onClick="javascript:jatekoslep()">Lépek</button>
		</div>
		
	</div>
