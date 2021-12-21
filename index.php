<?php

include("include/db.php");
include("include/pagination.php");
include("include/app.php");

(new App())->Run([
    'basepath' => '/registr',
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => 'password',
        'db' => 'match'
    ]
]);

?>
