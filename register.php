    <!-- HEADER -->
    <?php include("path.php"); ?>
    <?php include(ROOT_PATH."/app/controllers/users.php");
    guestOnly();
    ?>
    <?php include(ROOT_PATH."/app/includes/header.php");?>

    
    <div class="container-register">
        <div class="img">
            <img  height="500" src="https://i.pinimg.com/736x/b8/09/22/b80922f6ea2daaf36a6627378662803b--deck-of-cards-phone-wallpapers.jpg" alt="" srcset="">
        </div>
        <form action="register.php" method="post">
            <h1>REGISTER</h1>
            <?php if (!empty($errores)): ?>
				<div class="errors">
					<?php echo $errores; ?>
				</div>
			<?php elseif($enviado) : ?>
				<div class="success">
					<?php echo 'Enviado Correctamente'; ?>
				</div>
			<?php endif; ?>
            <input type="text" name="username" id="" value="<?php if(!$enviado && isset($username)) echo $username?>"  placeholder="Username..">
            <input type="email" name="email" id="" value="<?php if(!$enviado && isset($email)) echo $email?>" placeholder="Email..">
            <input type="password" name="password" id="" placeholder="Password..">
            <a href="<?php echo BASE_URL?>/login.php">¿Have account?</a>
            <input type="submit" name="registr-btn" value="ENTER">
        </form>
    </div>


