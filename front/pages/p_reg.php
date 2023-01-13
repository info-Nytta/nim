<?php
	$hiba="";
	if (isset($_POST['reg']) )
	{
		if (regisztralt($_POST['fnev'],$_POST['email'])) 
			$hiba=$_POST['fnev']." and/or ".$_POST['email']." reserved.";
		else {
			$ok=reg($_POST['fnev'],$_POST['email'],$_POST['pw'],session_id(),$_SESSION['szint'],$_SESSION['szint_ok']);
			unset($_POST['reg']);	
			if ($ok) {
				$_SESSION['id']=session_id();
				$_SESSION['login']=true;
				$_SESSION['user']=$_POST['fnev'];
				$_SESSION['uid']=$ok;
				jatszott(user_id($ok));
				header('Location: ./new');
			}
			else $hiba="An error has occurred during registration. Try again later!";
		}
	}
?>
	<script>
	$fnev=user.fnev.value;
	$email=user.email.value;
	function ellenorzes() {
		ok=true;
		if(user.pw.value.length <  8) { 
			alert('Password must be at least 8 letters long!');  ok = false; 
		}  
		else if(user.pw.value!=user.pw2.value)  { 
			alert('The passwords do not match!');  ok = false;
		}
		user.fnev.value=$fnev;
		user.email.value=$email;
		return ok;
	}
	function ujra() {
	}		
	</script>

	<div class='content center'>
		<p><?php echo $hiba; ?></p>
		<h1><img src='./img/reg.png' style='height:75px;'></h1>
		<form id="login" name='user' method="POST" class='center gold' onSubmit='return ellenorzes()'>
			<p>Player name:</p>
			<input type='text' id='fnev' name='fnev' required>
			<p>Email:</p>
			<input type='email' id='email' name='email' required>
			<p>Password:</p>
			<input type='password' name='pw' maxlength='15' required>
			<p>Password again:</p>
			<input type='password' name='pw2' maxlength='15' required>
			<input type='submit' name='reg' value='Registration'>
		</form>
		<p class='center gold kisbetu'>Are you registered? </p>
		<p class='valt kisbetu'><a href='./login' >Log In</a></p>
	</div>