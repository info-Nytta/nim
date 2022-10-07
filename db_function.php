<?php 
function str_general() {
	$karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789" ;
  $kar = "" ;
  for( $i=0; $i<16; $i++ )   $kar .= substr( $karakter, mt_rand(0,61), 1 ) ;
	return $kar;
}

function login($fnev,$pw) 
{
	$ok=null;
	$sql="SELECT * FROM users WHERE unev='$fnev';";
	$e = connect()->query($sql);
	if ($e ->num_rows>0)
		{
			$row = $e->fetch_assoc();
			if (crypt($pw,"$6$".$row['usalt']."$") == $row['upw']) {
				$ok['user']=$row['unev'];
				$ok['szint_ok']=$row['ulevel_ok'];
				$ok['szint']=$row['ulevel'];
				$ok['uid']=$row['ustr'];
			}
		}
	connect() ->close();
	return $ok;
}


// meg kell nézni, hogy van-e már ilyen név vagy email
function regisztralt($nev,$mail) {
	$sql="SELECT * FROM users WHERE unev = '$nev' OR umail = '$mail';";
	$e = connect()->query($sql);
	connect() ->close();
	if ($e->num_rows>0) return true;
	else return false;
}



// regisztráció
function reg($nev,$mail,$jelszo,$sess,$szint,$szint_ok) {
	$ok=null;
	$str=str_general();
	$salt=str_general();	
	$pw=crypt($jelszo,"$6$".$salt."$"); //titkosítva
	$sql="INSERT INTO users  
    (ustr,unev,umail,usalt,upw,udate,usess,ulevel_ok,ulevel)
			VALUES
    ('$str','$nev','$mail','$salt','$pw',NOW(),'$sess',$szint_ok,$szint);";
	$e=connect()->query($sql);	
	connect() ->close();
	if ($e) $ok=$str;
	return $ok;
}

function user_id($str) {
	$sql="SELECT uid FROM users WHERE ustr = '$str';";
	$e=connect()->query($sql);	
	$ok=null;
	if ($e ->num_rows>0)
		{
			$row = $e->fetch_assoc();
			$ok=$row['uid'];
			}
	connect() ->close();
	return $ok;
}

	//új regisztrált kezdő pontszámainak felvitele
	// lehet, hogy már játszott, és akkor mindet
function jatszott($id) {
	$sql="";
	for ($i=1; $i<=$_SESSION['szint_ok']; $i++)
		$sql.="INSERT INTO scores (uid, level, score) 
			VALUES ($id,$i,".$_SESSION['nyert'][$i].");";
	$e=connect()->query($sql);	
	connect() ->close();
	}
	


// játékot indító pontszám kiolvasása

function pontszam($id,$level) {
	$sql="SELECT score FROM scores WHERE uid = $id AND level=$level;";
	$e=connect()->query($sql);	
	$ok=null;
	if ($e ->num_rows>0)
		{
			$row = $e->fetch_assoc();
			$ok=$row['score'];
			}
	connect() ->close();
	return $ok;
}

//pontszám növekedés
function ujpont($id,$level,$score) {
	$sql="UPDATE scores SET score = $score WHERE uid = $id AND level=$level;";
	$e=connect()->query($sql);	
	connect() ->close();
}

// szintugrás
function ujszint($id,$level) {
	$sql="UPDATE users SET ulevel_ok=$level WHERE uid=$id;";
	$e=connect()->query($sql);
	$sql="INSERT INTO scores (uid,level,score) VALUES
		($id,$level,0);";
	$e=connect()->query($sql);	
	connect() ->close();
}

function aktszint($id,$level) {
	$sql="UPDATE users SET ulevel=$level WHERE uid=$id;";
	$e=connect()->query($sql);
	connect() ->close();
}

function session_van ($session) {
	$sql="SELECT * FROM users WHERE usess = '$session'";
	$e=connect()->query($sql);
	//connect()->close;
	if ($e->num_rows>0) return true;
	else return false;

}

?>