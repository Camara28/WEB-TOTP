<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="loginbox">
    <img src="avatar.png" class="avatar">
<h1>Signup</h1>
<div id ="format">
<form action="#" method="post">
<p>username</p><input type="text" name="username"></br>
<p>password</p><input type="password" name="password"></br>
<input type="submit" name="submit" value="submit">
<a href="#">Lost your password?</a><br>
 <a href="#">Don't have an account?</a>
<?php
session_start();
try {
	$db=mysqli_connect("localhost","root","root","camara1");       	
} catch (Exception $e) {
	die($e);
}
echo "connected";
$errors=[];


if(isset($_POST["submit"]))
{

	if (isset($_POST["username"]))
	{ 

		$username=$_POST["username"];

	}else

	{  	
		$errors="veuillez rentrez un username";
		echo "$errors";

	}if(isset($_POST["password"]))

	{

		$password=$_POST["password"];

	}else
	{

		$errors="veuillez entrez un password";
				echo "$errors";

	}if (isset($username) && isset($password)) 
    {
	try {
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;

			header("location: code.php");
		//$sql="insert into user(username,password,secret) values('$username','$password','ACSDF')";
		 //mysqli_query($db,$sql);
	} catch (Exception $e) {
		die($e);
	}	 	echo "finish";
	}
}


   
   
  ?>
</form>
<a href="login.php">se connecter</a>
</div>
</body>
</html>
