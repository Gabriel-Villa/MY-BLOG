<?php

include(ADMIN_PATH . "/app/db/db.php");
include(ADMIN_PATH . "/app/helpers/middlewares.php");

$id = '';
$name = '';
$description = '';

$topics = selectAll('topics');



if(isset($_POST['create-btn'])){
    adminOnly();
    unset($_POST['create-btn']);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $_POST['description'] = htmlentities($_POST['description']);
    $topics_create = create('topics', $_POST);
    header("Location:index.php");
    exit();
}


if(isset($_GET['id'])){
    $topic = selectOne('topics', ['id' =>$_GET['id']]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}


if(isset($_GET['del_id'])){
    adminOnly();
    $id = $_GET['del_id'];
    $delete = delete('topics', $id);
    header("Location:index.php");
    exit();
}


if(isset($_POST['editar-btn'])){
    adminOnly();
    $id = $_POST['id'];
    unset($_POST['editar-btn'], $_POST['id']);
    $post_id = update('topics', $id, $_POST);
    header("Location:index.php");
    exit();
}