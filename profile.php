<?php
session_start();
if($_SESSION['auth']!=1){
	header('location: http://localhost/camara/login.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue</title>
</head>
<body>
<h1> Bienvenue <?php echo $_SESSION['lu']; ?></h1></br>
<a href="logout.php">logout.php</a>
<img src="pic1.jpg"/>
</body>
</html>