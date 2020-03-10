<DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Login Page</h1>
<div class="loginbox">
<img src="avatar.png" class="avatar">
<form action="#" method="post">
<p>username</p><input type="text" name="username"></br>
<p>password</p><input type="password" name="password"></br>
<input type="submit" name="login" value="login">
<a href="#">Lost your password?</a><br>
 <a href="#">Don't have an account?</a>
<?php 
session_start();
try 
{

	$db=mysqli_connect("localhost","root","root","camara1");
	
} catch (Exception $e) 
{
	die($e);
}
$errors=[];
if(isset($_POST['login'])){
	if(isset($_POST['username'])){

		$username=$_POST['username'];
	}else{
		$errors="veuillez entrer un username valide";
		echo $errors;


	}
	if(isset($_POST['password'])){

		$password=$_POST['password'];
	}else{
		$errors="veuillez entrer un mot de passe valide";
		echo $errors;


	}
	if(isset($username) && isset($password)){
		$sql="select * from user where username='$username' and password='$password'";
		$a=mysqli_query($db,$sql);
		if(mysqli_num_rows($a)>0){
			$result=$a->fetch_assoc();
			$_SESSION['lu']=$result['username'];
			//$_SESSION['lp']=$result['password'];
			$_SESSION['ls']=$result['secret'];

			header("location://localhost/camara/confirmation.php");	
		}else{

			$errors="Username ou password incorrect";
			echo $errors;
		}


	}






}
/*if(($_GET['logout']=1)){
	session_destroy();
	unset($_SESSION['lu']);
	unset($_SESSION['ls']);
	unset($_SESSION['auth']);

}*/
?>
</form>
<a href="Signup.php">s'enregistrer</a>
</div>
</body>
</html>
