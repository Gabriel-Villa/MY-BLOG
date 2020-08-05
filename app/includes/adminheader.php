
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>MY BLOG</title>
</head>

<body>
   

    <!-- HEADER -->
    <header class="nav-header">
    <ul class="nav-content">
        <a href="../../index.php">MY BLOG</a>
        <div class="ul-right">
            <a class="login" href=""><?php echo $_SESSION['username'];?></a>
            <a class="registro" href="<?php echo BASE_URL . '/logout.php';?>">Salir</a>
        </div>
    </ul>
    </header>