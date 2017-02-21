<?php

if (isset($_SESSION['user'])){
    if (isset($_SERVER['HTTP_REFERER']) && strstr($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== false){
        $redirect_url = $_SERVER['HTTP_REFERER'];
    } else {
        $redirect_url = $_SERVER['SERVER_NAME'];
    }
    
    header('Location: ' . $redirect_url);
    exit(0);
}

include '../../config/config.php';

$query = "SELECT * from tbl_user";
$result = pg_query($query);
while ($row = pg_fetch_assoc($result)){
    print_r($row);
}


include '../templates/login.html';