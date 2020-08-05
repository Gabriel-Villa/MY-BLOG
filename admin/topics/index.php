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
        <h4 class="general" style="padding-top: 40px;">TOPICS</h5>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="fetch"> 
                    <?php foreach ($topics as  $topic): ?>
                        <tr>
                            <td><?php echo $topic['id'];?></td>
                            <td><?php echo $topic['name'];?></td>
                            <td><a href="index.php?del_id=<?php echo $topic['id'];?>"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="editar.php?id=<?php echo $topic['id'];?>"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                    <?php endforeach; ?>  
                </tbody>
                
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </section>
</main>

<?php include(ADMIN_PATH . "/app/includes/footeradmin.php"); ?>