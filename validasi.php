<?php
session_start();
$valid_username="teraldy";
$valid_password="t";

if (isset($_POST["username"]) and isset ($_POST["password"]))
{/*variable session sudah dideklarasi*/
if($_POST["username"]==$valid_username and
	$_POST["password"]==$valid_password)
{/*status login:valid*/
	$_SESSION["stat_login"]=1;
	$_SESSION["username"]=$_POST["username"];
	$_SESSION["password"]=$_POST["password"];
	
	header("location:homepage.php"); //redirect ke homepage
}
else
{/*status login:invalid */
echo "username atau password salah<br><br>";
die("silahkan klik <a href='index.php'>Di Sini</a> Untuk Login lagi");
}
}
else
{/* variable session belum dideklarasi*/
echo "data tidak lengkap";
}
?>