<?php if(!defined('NIMJATEK')) die(header('Location: ../?403')); ?>


<?php 

//hanyadik szintnél tart a játékos?
//ezt a session-ból majd ki lehet olvasni


?>

<div class='content w3-center'>
	<h2>Kezdő</h2>
	<?php	for ($i=SZINTEK['kezdo']; $i<SZINTEK['halado']; $i++) echo szint_icon($i); ?>
	<h2>Haladó</h2>
	<?php	for ($i=SZINTEK['halado']; $i<SZINTEK['profi']; $i++) echo szint_icon($i);?>
	<h2>Profi</h2>
	<?php	for ($i=SZINTEK['profi']; $i<=SZINTEK['utolso']; $i++) echo szint_icon($i);?>
</div>