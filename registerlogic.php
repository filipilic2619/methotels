<?php
session_start();
include ("includes/functions.php");

$ime = $_POST["ime"];
$username = $_POST["username"];
$password=$_POST["password"];
$result =  registracija($ime, $username, $password);
echo $result;
?>