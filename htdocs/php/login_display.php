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

include '../templates/login.html';