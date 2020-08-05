<?php

function userOnly($redirect = '/index.php'){
    if(empty($_SESSION['id'])){
        header('location:' . BASE_URL . $redirect);
        exit(0);
    }
}

function adminOnly($redirect = '/index.php'){
    if(empty($_SESSION['id']) || empty($_SESSION['admin'])){
        header('location:' . BASE_URL . $redirect);
        exit(0);
    }
}

function guestOnly($redirect = '/index.php'){
    if(isset($_SESSION['id'])){
        header('location:' . BASE_URL . $redirect);
        exit(0);
    }
}