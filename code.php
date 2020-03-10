<?php
session_start();
if (empty($_SESSION['username'])) {
	header('location: Signup.php');
	
}
require_once 'GoogleAuthenticator.php';
try 
{

	$db=mysqli_connect("localhost","root","root","camara1");
	echo "lala";
	 
} catch (Exception $e) 
{               
	die($e);
}
 $u=$_SESSION['username'];
 $p=$_SESSION['password'];
$websiteTitle ='monsitetotp';
 
$ga = new PHPGangsta_GoogleAuthenticator();
 
$secret = $ga->createSecret();
echo 'Secret is: '.$secret.'<br />';
try {
$sql="insert into user(username,password,secret) values('$u','$p','$secret')";
mysqli_query($db,$sql);	
} catch (Exception $e) {
	die($e);
}

 
$qrCodeUrl = $ga->getQRCodeGoogleUrl($websiteTitle, $secret);
echo 'Google Charts URL QR-Code:<br /><img src="'.$qrCodeUrl.'" />';
  
$myCode = $ga->getCode($secret);
echo 'Verifying Code '.$myCode.'<br />';
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['password']);
 
//$result = $ga->verifyCode($secret, $oneCode, 1);
//if ($result) {
  // echo 'Verified';
//} else {
  // echo 'Not verified';
//}
?>
<a href="http://localhost/camara/login.php">se connecter</a>
