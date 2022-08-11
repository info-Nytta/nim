<?php
function kupac($szint) {
	if ($szint>10)
		return kupacok_rnd($szint);
	else
		return kupacok_tomb($szint);
}

function kupacok_tomb($szint) {
	$szintek = array(
		array(
			array(5,6),array(5,3),array(5,5),array(7,7),array(7,3),
			array(5,4),array(8,4),array(4,4),array(3,7),array(3,6),
			array(6,6),array(2,2),array(3,5),array(4,5),array(3,3),
			array(8,8),array(3,8),array(6,3),array(8,4),array(3,4)
		),
		array(
			array(5,5,5),array(3,3,3),array(3,7,7),array(1,3,3),array(6,4,6),
			array(2,3,2),array(2,2,4),array(4,4,4),array(7,7,2),array(4,1,4),
			array(3,2,2),array(1,1,4),array(3,4,3),array(2,4,2),array(3,3,2),
			array(3,3,4),array(6,3,6),array(4,2,4),array(4,5,5),array(8,8,8)
		),
		array(
			array(2,2,2,4),array(4,4,4,3),array(2,2,2,2),array(6,6,6,6),array(4,4,1,4),
			array(2,5,2,2),array(7,3,3,3),array(3,5,5,5),array(3,2,3,3),array(4,4,4,3),
			array(4,4,3,4),array(6,6,6,4),array(5,3,5,5),array(3,3,3,2),array(3,4,3,3),
			array(6,3,3,3),array(4,2,4,4),array(2,2,8,2),array(3,2,3,3),array(7,7,7,4)
		),
		array(
			array(2,2,5,3),array(1,1,4,2),array(4,3,3,5),array(2,4,2,3),array(4,5,4,3),
			array(2,1,4,2),array(3,5,2,3),array(2,4,4,3),array(3,5,5,2),array(4,4,3,2),
			array(2,3,3,5),array(4,3,4,1),array(5,2,3,5),array(4,3,2,4),array(2,4,5,2),
			array(3,4,4,2),array(2,2,3,4),array(2,4,3,2),array(4,4,5,3),array(4,2,3,4)
		),
		array(
			array(3,2,4,3),array(4,1,4,2),array(3,3,3,2,2),array(4,2,2,4,4),array(2,2,1,3),
			array(3,4,3,2),array(3,3,4,3,4),array(4,2,4,4,2),array(3,3,4,2),array(2,3,4,4),
			array(2,3,4,4,3),array(2,3,4,3,2),array(4,4,4,3),array(2,2,4,2),array(1,4,1,4,3),
			array(1,2,3,2,1),array(2,3,2,4),array(4,1,3,4),array(4,3,4,3,4),array(4,3,4,2,2)
		),
		array(
			array(1,2,4),array(1,2,5),array(1,4,3),array(1,3,6),array(5,2,3),
			array(2,7,3),array(3,5,1),array(1,6,3),array(1,2,7),array(2,5,1),
			array(2,3,5),array(5,3,2),array(2,1,7),array(2,6,1),array(3,1,4),
			array(7,3,1),array(2,6,1),array(5,3,1),array(2,3,4),array(7,2,3)
		),
		array(
			array(1,4,6),array(3,1,4),array(1,4,5),array(5,6,1),array(7,1,6),
			array(1,3,5),array(1,3,2),array(5,1,7),array(6,7,1),array(1,5,6),
			array(5,4,1),array(7,1,5),array(1,7,6),array(2,4,1),array(1,6,7),
			array(6,1,5),array(3,2,1),array(1,5,7),array(5,4,1),array(6,1,4)
		),
		array(
			array(2,5,6),array(2,6,7),array(4,6,2),array(2,4,5),array(3,2,1),
			array(2,3,5),array(5,7,2),array(6,2,7),array(6,2,4),array(2,6,5),
			array(3,1,2),array(3,2,4),array(2,7,5),array(2,5,3),array(6,4,2),
			array(7,2,6),array(2,4,6),array(2,5,4),array(7,2,5),array(6,5,2)
		),
		array(
			array(3,4,5),array(3,4,6),array(3,5,6),array(4,5,6),array(3,4,7),
			array(4,5,7),array(5,3,6),array(7,3,6),array(7,4,3),array(5,4,3),
			array(6,5,3),array(3,5,7),array(4,7,3),array(5,4,6),array(5,6,3),
			array(7,6,4),array(7,3,4),array(5,4,7),array(6,3,5),array(7,6,5)
		),
		array(
			array(2,5,6),array(2,4,8),array(3,5,7),array(3,5,8),array(8,5,4),
			array(8,6,4),array(6,8,10),array(2,6,10),array(4,8,6),array(4,8,10),
			array(9,5,8),array(7,8,9),array(2,4,6),array(8,4,6),array(3,4,7),
			array(3,4,8),array(7,8,10),array(8,9,10),array(10,9,4),array(10,7,5)
		)
	);
	$kupac=$szintek[$szint-1][rand(0,9)];
	return $kupac;
}


function kupacok_rnd($szint) {
	$kupac=array();
	$sz=array(
		11 => array(
			'kupacdb' => 3,
			'minelem' => 3,
			'maxelem' => 10
		),
		12 => array(
			'kupacdb' => 4,
			'minelem' => 3,
			'maxelem' => 7
		),
		13 => array(
			'kupacdb' => 4,
			'minelem' => 5,
			'maxelem' => 10
		),
		14 => array(
			'kupacdb' => 5,
			'minelem' => 5,
			'maxelem' => 10
		)
	);
	/*
	switch ($szint) {
		case 11: {
			$kupacdb=3;
			for ($i=0; $i<$kupacdb; $i++) {
				do {
					$k=rand(3,10);
				} while (in_array($k,$kupac));
				$kupac[$i]=$k;
			}
			break;
		}
		case 12: {
			$kupacdb=4;
			for ($i=0; $i<$kupacdb; $i++) {
				do {
					$k=rand(3,7);
				} while (in_array($k,$kupac));
				$kupac[$i]=$k;
			}
			break;
		}
		case 13: {
			$kupacdb=4;
			for ($i=0; $i<$kupacdb; $i++) {
				do {
					$k=rand(5,10);
				} while (in_array($k,$kupac));
				$kupac[$i]=$k;
			}
			break;
		}
		case 14: {
			$kupacdb=5;
			for ($i=0; $i<$kupacdb; $i++) {
				do {
					$k=rand(5,10);
				} while (in_array($k,$kupac));
				$kupac[$i]=$k;
			}
			break;
		}
	}
	*/
	for ($i=0; $i<$sz[$szint]['kupacdb']; $i++) {
		do {
			$k=rand($sz[$szint]['minelem'],$sz[$szint]['maxelem']);
		} while (in_array($k,$kupac));
		$kupac[$i]=$k;
	}
	return $kupac;
}	

?>