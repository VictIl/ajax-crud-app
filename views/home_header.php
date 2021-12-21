<?php
session_start();
if (isset($_SESSION['loged'])){
if($_SESSION['time']+80*60<time()){
   unset($_SESSION['logged']);
   session_destroy();
    Header("Location: home");
    exit;
}
}?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home of ajax</title>
        <script language="JavaScript" src="js/home.js?v=<?php echo time(); ?>"></script>
        <link rel="stylesheet" href="css/home.css?v=<?php echo time(); ?>">

</head>
<body>
    <nav>
            <div id=fx>
                <h3>PhpPurgatory</h3>
            </div>
            <ul id="nav-links">
                <li><a class="ch" href="#">Home</a></li>
                <li><a  href="/registr/products">Main</a>
                   <!-- <ul>
                        <li><a href="italy.html">Italy</a> </li>
                        <li><a href="trips.html">  Europe </a> </li>
                        <li><a href="trips.html">  Islands  </a> </li>
    
                    </ul>-->
                </li>
                <li><a  href="/registr/manufacturers">Special offers</a>
                   <!-- <ul>
                        <li><a class="pick" href="#">Your trip</a> </li>
                        <li><a href="last.html">Near home</a> </li>
                        <li><a href="trips.html"> Worldwide </a> </li>
        
                    </ul>-->
                <li><a href="/registr/user_page">YourPlaylist</a></li>
            </ul>
    </nav>
   <!-- <ul class="menu">
        <li><a href="/registr">Домой</a>
        <li><a href="/registr/products">Продукция</a>
        <li><a href="/registr/manufacturers">Производители</a>
          <li><a href="/registr/pandas">panda</a>
	<li><a href="/registr/user_page">user</a>
    </ul>-->
