<?php
session_start();
header("Access-Control-Allow-Origin: *");
if(isset($_SESSION['usr_id'])) {
	session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
	header("Location: /");
} else {
	header("Location: /");
}
?>