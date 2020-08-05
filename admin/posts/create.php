<?php include("../../path.php"); ?>
<?php include(ADMIN_PATH . "/app/controllers/posts.php");
adminOnly();
?>
<?php include(ADMIN_PATH . "/app/includes/adminheader.php"); ?>
<?php include(ADMIN_PATH . "/app/includes/adminaside.php"); ?>

<main>
    <section id="html" class="seccion">
        <div class="header-buttons">
            <a href="create.php"><button class="create">CREAR POST</button></a>
            <a href="index.php"><button class="manage">ADMINISTRAR POSTS</button></a>
        </div>
        <h4 class="general" style="padding-top: 40px;">AGREGAR POST</h5>
            <form enctype="multipart/form-data" action="create.php" method="post">
                <p class="general">TITULO</p>
                <input type="text" name="title" id="" required>
                <p class="general">BODY</p>
                <textarea name="body" id="editor" cols="30" rows="10"></textarea>
                <input type="file" name="image" id="name">
                <p class="general">TOPIC</p>
                <select style="padding: 20px 20px;border: 1px solid grey;" name="topic_id" id="topic" required>
                <option value=""></option>
                    <?php foreach($topics as $key => $topic):?>
                        <option value="<?php echo $topic['id'];?>"><?php echo $topic['name'];?></option>
                    <?php endforeach;?>
                </select>
                <br><br>
                <label for="">
                        <input type="checkbox" name="published" id="">
                        Publicar
                </label>
                <br><br>
                <input type="submit" name="add-post" value="AGREGAR">
                <br><br><br><br><br><br><br>
            </form>
    </section>
</main>

<?php include(ADMIN_PATH . "/app/includes/footeradmin.php"); ?>