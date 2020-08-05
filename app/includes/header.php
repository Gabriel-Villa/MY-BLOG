<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- FONT AWESOME 5 -->
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>MY BLOG</title>
</head>

<body>
    <header class="nav-top">
        <ul class="nav-content">
            <li><a href="<?php echo BASE_URL?>/index.php">MY BLOG</a></li>
            <?php if(isset($_SESSION['id'])): ?>
                <li class="active-submenu"><a href=""><?php echo $_SESSION['username'];?></a>
                    <ul class="submenu" style="position: absolute; background: black;">
                        <?php if($_SESSION['admin']): ?>
                        <li><a href="<?php echo BASE_URL?>/admin/dashboard.php">DASHBOARD</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo BASE_URL?>/logout.php">LOG OUT</a></li>
                    </ul>
                </li>
            <?php else:?>
                <li><a href="<?php echo BASE_URL?>/login.php">LOGIN</a></li>
                <li><a href="<?php echo BASE_URL?>/register.php">SIGN IN</a></li>
            <?php endif;?>
            

        </ul>
    </header>

    