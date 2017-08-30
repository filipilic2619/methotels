<?php
session_start();
if(isset($_SESSION["user"]))
{
    header('Location: index.php');
}

?>

<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</head>
<body style="overflow: hidden">
<div id="slika"></div>

<div id="loginf">
  <h1 id="prijava">Prijava na sistem</h1>
    <div id="forma">

        <label for="username">Korisničko ime:</label>
        <input type="text" id="username">
        <label for="password">Lozinka:</label>
        <input type="password" id="password">
        <h6 id="neispravni">Neispravni podaci</h6>
        <button class="readmore" id="prijava12">Prijavi se</button>

    </div>



</div>
</body>

<script>

    $("#prijava12").click(function() {

        $.ajax({
            type: 'POST',
            url: 'loginlogic.php',
            data: {username: $("#username").val(), password: $("#password").val()},
            success: function (data) {
                if (data==0)
                {
                    $("#neispravni").fadeIn( 500, function() {});
                } else {
                    location.reload();
                }
            }


        });
    });


</script>
</html>
