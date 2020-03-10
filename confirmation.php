<?php
session_start();
if (empty($_SESSION['ls'])) {
		header("location: login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="loginbox">
<img src="avatar.png" class="avatar">

<form method="post">
<input type="text" name="code">
<input type="submit" name="valider" value="valider">
</form>
<?php
$errors=[];
if (isset($_POST ['valider'])) {

	if (isset($_POST['code'])) {
			require_once 'GoogleAuthenticator.php';
			$onecode = $_POST['code'];
			$secret=$_SESSION['ls'];
			$ga = new PHPGangsta_GoogleAuthenticator();
			$result = $ga->verifyCode($secret, $onecode);
			echo "$result<br>";

			if ($result==1) {
				$_SESSION['auth']=1;
				echo "bingo";
				header('location: profile.php');

		}else{
				$errors="secret incorrect";
				echo"$errors";

		}
	}
	
}

?>
</div>
<a href="login.php">precedent</a>

</body>
</html>
