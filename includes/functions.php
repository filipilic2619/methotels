<?php 
include ("includes/config.php");

function checkLogin($username, $password)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $query = $conn->prepare($sql);
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $query->store_result();
    if ($query->num_rows > 0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    $query->close();
}

function checkUser($username)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE username=?";
    $query = $conn->prepare($sql);
    $query->bind_param("s", $username);
    $query->execute();
    $query->store_result();
    if ($query->num_rows > 0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    $query->close();
}

function registracija($ime, $username, $password) {

    global $conn;


       $stmt=$conn->prepare("INSERT INTO users (ime, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",  $ime, $username, $password);
        $stmt->execute();


    $stmt->close();
    $conn->close();

    return 1;

}

?>