<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'bank');
   define('DB_COLLATE', '');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if ($conn->connect_errno) {
       printf("Database Connection Failed: %s\n", $mysqli->connect_error);
       exit();
    }
?>