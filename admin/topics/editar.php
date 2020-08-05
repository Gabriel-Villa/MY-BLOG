<?php include("../../path.php"); ?>
<?php include(ADMIN_PATH . "/app/controllers/topics.php");
adminOnly();
?>
<?php include(ADMIN_PATH . "/app/includes/adminheader.php"); ?>
<?php include(ADMIN_PATH . "/app/includes/adminaside.php"); ?>

<main>
    <section id="html" class="seccion">
        <div class="header-buttons">
            <a href="create.php"><button class="create">CREAR TOPICS</button></a>
            <a href="index.php"><button class="manage">ADMINISTRAR TOPICS</button></a>
        </div>
        <h4 class="general" style="padding-top: 40px;">EDITAR TOPICS</h5>
            <form action="editar.php" method="post">
                <input type="hidden" name="id"  value="<?php echo $id ?>">
                <p class="general">Name</p>
                <input type="text" name="name" id="" required value="<?php echo $name ?>">
                <p class="general">Description</p>
                <textarea name="description"  id="editor" cols="30" rows="10"><?php echo $description ?></textarea>
                <input type="submit" name="editar-btn" value="AGREGAR">
            </form>
            <br><b><br><b><br><br></b></b><br><br>
    </section>
</main>


<?php include(ADMIN_PATH . "/app/includes/footeradmin.php"); ?>