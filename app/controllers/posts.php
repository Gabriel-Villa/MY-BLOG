<?php

include(ADMIN_PATH . "/app/db/db.php");
include(ADMIN_PATH . "/app/helpers/middlewares.php");
$topics = selectAll('topics');
$posts = selectAll('posts');

$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';

if(isset($_POST['add-post'])){
    adminOnly();
    if(!empty($_FILES['image']['name'])){
        $image_name = time() . "-" . $_FILES['image']['name'];
        $destination = ADMIN_PATH . "/assets/images/" . $image_name;
        
        $result = move_uploaded_file($_FILES['image']['tmp_name'],$destination);
        if($result){
            $_POST['image'] = $image_name;
        }
    }
    
    unset($_POST['add-post']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['body']);
    $post_id = create('posts', $_POST);
    header("Location:index.php");
    exit();
}


if(isset($_GET['id'])){
    $post = selectOne('posts', ['id' =>$_GET['id']]);
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
    
}




if(isset($_GET['del_id'])){
    adminOnly();
    $id = $_GET['del_id'];
    $delete = delete('posts', $id);
    header("Location:index.php");
    exit();
}



if(isset($_POST['editar-btn'])){
    adminOnly();
    if(!empty($_FILES['image']['name'])){
        $image_name = time() . "-" . $_FILES['image']['name'];
        $destination = ADMIN_PATH . "/assets/images/" . $image_name;
        
        $result = move_uploaded_file($_FILES['image']['tmp_name'],$destination);
        if($result){
            $_POST['image'] = $image_name;
        }
    }
    $id = $_POST['id'];
    unset($_POST['editar-btn'],$_POST['id']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['body']);
    $post_id = update('posts', $id, $_POST);
    header("Location:index.php");
    
}

