<?php
session_start();
include ("includes/functions.php");

$username = $_POST["username"];
$password=$_POST["password"];
$result =  checkLogin($username, $password);
if ($result==1)
{
    $_SESSION["user"] = $username;
}
echo $result;
?>