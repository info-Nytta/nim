<?php 	if(!defined('NIMJATEK')) die(header('Location: ../?403')); 
$szint=$_SESSION['szint'];

// ezeket is a session-ból kell kiolvasni
if (!isset($_SESSION['nyert'][$szint])) $_SESSION['nyert'][$szint]=0;
$nyert=$_SESSION['nyert'][$szint]; 

require_once('./game/functions.php');
require_once('./game/levels.php'); 
$kupacok=kupac($szint);
?>

	<script src="./game/game.js"></script> 
	<script src="./game/move.js"></script> 
	<div class="content">

			<div class='w3-display-container' style='float:right;margin:10px 20px auto auto'>
				<img class='star' src='img/star0.png'>
				<div class='w3-display-middle w3-large szintszoveg'>
					<?php echo $nyert;?>
				</div>			
		
			</div>


	<div style='display: inline-block;'>

		<?php	
		//előző szint
			if ($szint>1){
		?>
		<div class='w3-display-container' style='display: inline-block;'>
			<a href='./?szint=<?php echo ($szint-1);?>'>
				<img class='szintkep-mini' src='img/szintff.png' style='height:30px;'>
				<div class='w3-display-middle w3-small szintszoveg'>
					<?php  echo $szint-1;?>
				</div>
			</a>   
		</div>
		<?php 
			}
			else {
				?>
			<div class='w3-display-container' style='display: inline-block;'>
				<img class='szintkep-mini' src='img/szintff.png' style='height:30px;'>
			</div>
				<?php
			}
		?>


			
			<?php
			/*
			if ($szint<SZINTEK['halado']) $kep="kezdo";
			else if ($szint<SZINTEK['profi']) $kep="halado";
			else $kep="p".($szint-(SZINTEK['profi']-1));
			echo "<img style='width:50px;' src='img/$kep.png'>";
			if ($szint<SZINTEK['profi'])echo "<div class='w3-display-middle w3-large szintszoveg'>$szint</div>";
			*/
			
			// aktuális szint
			echo szint_icon($szint);

			?>



			
		<?php	
		// következő szint
			if ($szint<SZINTEK['utolso']) {		
				if ($nyert>=SZINTEK['ugras']){

		?>
		<div class='w3-display-container' style='display: inline-block;'>
			<a href='./?szint=<?php echo ($szint+1);?>'>
				<img class='szintkep-mini' src='img/szintff.png' style='height:30px;'>
				<div class='w3-display-middle w3-small szintszoveg'>
					<?php  echo $szint+1;?>
				</div>
			</a>
		</div>
		<?php 
				}
			}
		?>


	</div>





		<div class="buttons">
			<div id="message" style='float:left'></div>
			<button id='hint' onClick='javascript:hint()'>			
			<?php if ($szint<SZINTEK['profi']) { echo "<img class='icon' src='./img/hint.png'>"; } ?>
			</button>
			<button id="restart" onClick="javascript:restart()"><img class='icon' src='./img/restart.png'></button>
			<button id="back" onClick="javascript:back()"><img class='icon' src='./img/back.png'></button>
			<button class='btn' id="gep" onClick="javascript:start(true)">Gép</button>
			<button class='btn' id="jatekos" onClick="javascript:start(false)">Játékos</button>
		</div>
		<div id="uzenet"></div>
	
		<script>
		<!--
		var imgs = ["./img/ures.png","./img/gyufa.png","./img/gyufa_lost.png"];
		var imgMatrix;
		var kupacok=<?php echo json_encode($kupacok); ?>;
		var game;
		var moves;
		var playing; 
		var jeloltKupac;
		var s;
		
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
		
		<div class='lepes' >
			<button id='me' onClick="javascript:jatekoslep()">Lépek</button>
		</div>
		<form id='ok' method='POST' >
			<div id='lose'></div>
			<div id='win'></div>
			<input type='hidden' name='pp' id='pp' value='0'>
			<div id='end'></div>
			<input type='submit' value='OK'>
		</form>

	</div>
