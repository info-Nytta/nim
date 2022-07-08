<?php
	define("SZINTEK", [
  "kezdo" => 1,
  "halado" => 6,
  "profi" =>11,
	"utolso" => 14,
	"ugras" =>5
	]);
	
	function szint_icon($szint) {
		$icon="<div class='w3-display-container' style='display: inline-block;'>
				<img class='szintkep' src='img/szintff.png'>
				<div class='w3-display-middle w3-large szintszoveg'>&#128274;</div>
		</div>";
		if ($szint<=$_SESSION['szint_ok']) {
			if ($szint<SZINTEK['halado']) {
					$kep="kezdo";
					$kepszoveg=$szint;
			}
			else if ($szint<SZINTEK['profi']) {
					$kep="halado";
					$kepszoveg=$szint;
			}
			else {
					$kep="p".$szint-(SZINTEK['profi']-1);
					$kepszoveg="";
			}
			$icon="<div class='w3-display-container' style='display: inline-block;'>
			<a href='./?szint=$szint'>
				<img class='szintkep' src='img/$kep.png'>
				<div class='w3-display-middle w3-large szintszoveg'>$kepszoveg</div>
			</a>
		</div>";
		}

		return $icon;
	}
	?>