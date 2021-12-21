<?php
session_start();
if (isset($_SESSION['loged'])){
    if(isset($_SESSION['time'])  && $_SESSION['time']+80*60<time()){
       unset($_SESSION['logged']);
       session_destroy();
       Header("Location: home");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">

</head>
<body>
      <nav>
            <div id=fx>
                <h3>PhpAttempt</h3>
            </div>
            <ul id="nav-links">
                <li><a href="/registr/home">Home</a></li>
                <li><a  href="/registr/products">Main</a>

                </li>
                <li><a  href="/registr/manufacturers">Special offers</a>

                <li><a class="ch" href="#">YourPlaylist</a></li>
            </ul>
    </nav>

