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
        <h4 class="general" style="padding-top: 40px;">POSTS</h5>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>AUTOR</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="fetch"> 

                <?php foreach($posts as $key => $post):?>
                    <tr>
                        <td><?php echo $key + 1?></td>
                        <td><?php echo $post['title'];?></td>
                        <td>Gabriel Villa</td>
                        <td><a href="editar.php?id=<?php echo $post['id'];?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td><a href="delete.php?del_id=<?php echo $post['id'];?>"><i class="far fa-trash-alt"></i></a></td>
                        <?php if($post['published']):?>
                            <td>Publicado</td>
                        <?php else:?>
                            <td>Sin Publicar</td>
                        <?php endif;?>
                    </tr>
                <?php endforeach;?>   
                </tbody>
            </table>
            
        </div>
        <br><br><br><br><br><br>
    </section>
</main>

<?php include(ADMIN_PATH . "/app/includes/footeradmin.php"); ?>