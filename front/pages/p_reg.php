<?php
	$hiba="";
	if (isset($_POST['reg']) && $_POST['reg']=="ok")
	{
		if (regisztralt($_POST['fnev'],$_POST['email'])) 
			$hiba=$_POST['fnev']." és/vagy ".$_POST['email']." foglalt.";
		else {
			$ok=reg($_POST['fnev'],$_POST['email'],$_POST['pw'],session_id(),$_SESSION['szint'],$_SESSION['szint_ok']);
			unset($_POST['reg']);	
			if ($ok) {
				$_SESSION['id']=session_id();
				$_SESSION['login']=true;
				$_SESSION['user']=$_POST['fnev'];
				$_SESSION['uid']=$ok;
				jatszott(user_id($ok));
				header('Location: ./?p=uj');
		}
		else $hiba="Hiba történt, próbáld újra!";
		}
	}
?>
	<script>
	function ellenorzes() {
		ok=true;
		if(user.pw.value.length <  8) { 
			alert('A jelszó minimum 8 betű kell legyen!');  ok = false; 
		}  
		else if(user.pw.value!=user.pw2.value)  { 
			alert('Nem egyeznek a jelszavaid!');  ok = false;
		} 
		return ok;
	}		
	</script>

	<div class='content center'>
		<p><?php echo $hiba; ?></p>
		<h1><img src='./img/reg.png' style='height:75px;'></h1>
		<form id="login" name='user' method="POST" class='center gold'>
			<p>Felhasználónév:</p>
			<input type='text' name='fnev' required>
			<p>Email:</p>
			<input type='email' name='email' required>
			<p>Jelszó:</p>
			<input type='password' name='pw' maxlength='15' required>
			<p>Jelszó mégegyszer:</p>
			<input type='password' name='pw2' maxlength='15' required>
			<input type='submit' name='reg' value='Regisztrálok' onClick='ok=ellenorzes(); if(ok) this.value="ok";'>
		</form>
		<p class='center gold kisbetu'>Már regisztráltál?</p>
		<p class='valt kisbetu'><a href='./?p=belepes' >Belépés</a></p>
	</div>