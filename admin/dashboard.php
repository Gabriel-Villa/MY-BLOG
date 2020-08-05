<?php include("../path.php"); ?>

<?php include(ADMIN_PATH . "/app/controllers/posts.php");
adminOnly();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>MY BLOG</title>
</head>

<body>
   

    <!-- HEADER -->
    <header class="nav-header">
    <ul class="nav-content">
        <a href="../index.php">MY BLOG</a>
        <div class="ul-right">
        <a class="login" href=""><?php echo $_SESSION['username'];?></a>
            <a class="registro" href="<?php echo BASE_URL . '/logout.php';?>">Salir</a>
        </div>
    </ul>
    </header>

<?php include(ADMIN_PATH . "/app/includes/adminaside.php"); ?>

<main>
    <section id="html" class="seccion">
        <div class="log"style="background: rgb(16,181,22);
background: linear-gradient(90deg, rgba(16,181,22,1) 0%, rgba(38,214,95,1) 35%, rgba(142,245,181,1) 100%);">
            <p style="color: white; padding: 10px 20px;">Ahora estas logeado!</p>
        </div>
    </section>
</main>

<?php include(ADMIN_PATH . "/app/includes/footeradmin.php"); ?>