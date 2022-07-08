<?php
function maxi($tomb) {
	$maxi=0;
	for ($i=1; $i<count($tomb); $i++) {
		if ($tomb[$i]>$tomb[$maxi])
			$maxi=$i;
	}
	return $maxi;
}