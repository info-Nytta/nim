<?php
$hiba="";
if (isset($_POST['login']))
	{
		$login=login($_POST['fnev'],$_POST['pw']);
		unset($_POST['login']);	
		if ($login)
		{
			$_SESSION['user']=$_POST['fnev'];
			$_SESSION['szint']=$login['szint'];
			$_SESSION['szint_ok']=$login['szint_ok'];
			$_SESSION['uid']=$login['uid'];
			$_SESSION['login']=true;
			header('Location: ./new');
		}
		else
		{
			$hiba="Incorrect name or password.<br>Try again!";
		}
	}
?>

	<div class='content center'>
		<p><?php echo $hiba; ?></p>
		<h1><img src='./img/profil.png' style='height:100px;'></h1>
		<form id="login" method="POST" class='center gold'>
			<p>Player name:</p>
			<input type='text' name='fnev' maxlength='15' required>
			<p>Password:</p>
			<input type='password' name='pw' maxlength='15' required>
			<input type='submit' name='login' value='Log In'>

		</form>
		<p class='center gold kisbetu'>Not registered?</p>
		<p class='valt kisbetu'><a href='./registration' >Registration</a></p>
	</div>