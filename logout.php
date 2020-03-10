<?php
session_start(); 
session_destroy();
unset($_SESSION['lu']);
unset($_SESSION['ls']);
unset($_SESSION['auth']);
unset($_SESSION['username']);
unset($_SESSION['password']);
header('location: http://localhost/camara/login.php');

?>