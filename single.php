    <!-- HEADER -->
    <?php include("path.php"); ?>
    <?php include(ROOT_PATH . "/app/controllers/posts.php");?>
    <?php include(ROOT_PATH."/app/includes/header.php");?>

    <?php 

    if(isset($_GET['t_id'])){
        $mainposts = getPostsByTopicId($_GET['t_id']);
    }else if(isset($_GET['id'])){
        $post = selectOne('posts', ['id' => $_GET['id']]);
    }else{
        header("Location:index.php");
    }
    
    $posts = selectAll('posts',['published' => 1]);
    $topics = selectAll('topics');

    ?>

    <div class="single">
        <div class="single-container">
            <section class="section-single-post">
                <div class="single-post" style="margin-top: 40px;">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image'];?>" alt="" srcset="">
                    <h6><?php echo html_entity_decode($post['title']);?></h6>
                    <p><?php echo html_entity_decode($post['body']);?></p>
                </div>
            </section>
            <div class="aside-single">
                <div class="popular">
                    <h1>POPULAR</h1>
                    <hr>
                    <?php foreach($topics as $topic):?>
                    <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'];?>"<?php echo $topic['name'];?>>
                        <h5><?php echo $topic['name'];?></h5>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include(ROOT_PATH."/app/includes/footer.php");?>