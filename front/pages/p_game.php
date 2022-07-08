<?php 	if(!defined('NIMJATEK')) die(header('Location: ../?403')); 
$szint=$_SESSION['szint'];

// ezeket is a session-ból kell kiolvasni
$nyert=rand(3,50);
$vesztett=rand(0,30);

require_once('./game/functions.php');
require_once('./game/levels.php'); 
$kupacok=kupac($szint);
?>

	<script src="./game/game.js"></script> 
	<div class="content">

		<div class='w3-display-container' style='display: inline-block;'>
			<?php
			if ($szint<SZINTEK['kezdo']) $kep="kezdo";
			else if ($szint<SZINTEK['halado']) $kep="halado";
			else $kep="p".($szint-(SZINTEK['profi']-1));
			echo "<img style='width:50px;' src='img/$kep.png'>";
			if ($szint<SZINTEK['profi'])echo "<div class='w3-display-middle w3-large szintszoveg'>$szint</div>";
			?>	
		</div>
		
		<div class='w3-display-container' style='display: inline-block;'>
			<img class='star' src='img/star0.png'>
			<div class='w3-display-middle w3-large <?php if ($nyert>=SZINTEK['ugras']) echo "szintszoveg"; ?>'>
				<?php if ($nyert>=SZINTEK['ugras']) echo "&#9967;"; else echo $nyert;?>
			</div>			
		</div>

		<p style='display: inline-block;'>
			<?php if ($nyert>=SZINTEK['ugras']) echo $nyert; ?> 
		</p>

		<div class="buttons">
			<div id="message" style='float:left'></div>
			<?php if ($szint<=SZINTEK['profi']) { ?>
			<button id='hint' onClick='javascript:hint()'><img class='icon' src='./img/hint.png'></button>
			<?php } ?>
			<button id="restart" onClick="javascript:restart()"><img class='icon' src='./img/restart.png'></button>
			<button id="back" onClick="javascript:back()"><img class='icon' src='./img/back.png'></button>
			<button class='btn' id="gep" onClick="javascript:start_computer()">Gép</button>
			<button class='btn' id="jatekos" onClick="javascript:start_user()">Játékos</button>
		</div>
	
		<script>
		<!--
		var imgs = ["./img/ures.png","./img/gyufa.png","./img/gyufa_ff.png"];
		var cells;
		var N;
		var B;
		var C;  
		var playing; 
		var s;
		var myrow;
		var kupacok=<?php echo json_encode($kupacok); ?>;
		var nrow=<?php echo count($kupacok); ?>;
		var ncol=<?php echo $kupacok[maxi($kupacok)]; ?>; 
		init();

		document.write("<div class='playground' id='pg'>");
		createField(imgs[0]);
		document.write("</div>");
		newGame();
		//-->
	</script>
		
		<div id='lose'><img src='./img/lose.png'></div>
		<div id='win'><img src='./img/win.png'></div>
		<div class='lepes' >
			<button id='me' onClick="javascript:take()" style='display:none;'>Lépek</button>
		</div>
		
	</div>
