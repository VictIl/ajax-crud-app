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
    <style>
        body{
            margin:0;
            padding:0;
        }
        .pagination a{
            color: red;
            padding: 5px;
            display: inline-block;
            background-color: bisque;
            margin:1px;
        }

        .pagination a.active{
            background-color: navy;
            color: white;
        }
        .menu{
            background-color: navy;
            margin:0;padding:0;
        }
        .menu li {
            display: inline-block;
            list-style-type: none;
            margin:0;padding:0;
        }
        .menu li a{
            display: inline-block;
            color:white;
            padding:5px;
        }
    </style>
</head>
<body>
    <ul class="menu">
        <li><a href="/registr">Домой</a>
        <li><a href="/registr/products">Продукция</a>
        <li><a href="/registr/manufacturers">Производители</a>
        <li><a href="/registr/pandas">panda</a>
	<li><a href="/registr/user_page">user</a>
    </ul>
