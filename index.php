<!-- HEADER -->
<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");?>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php 
$mainposts = array();
$posts = getPublishedPostLimit3('posts');
$postsLimit5 = getPublishedPostLimit5('posts');
$postTitle = 'Recientes';

if(isset($_GET['t_id'])){
    $mainposts = getPostsByTopicId($_GET['t_id']);
}else if(isset($_POST['search-tern'])){
    $postTitle = "Tu busqueda:" . $_POST['search-tern'];
    $mainposts = searchPost($_POST['search-tern']);
}else{
    $mainposts = getPublishedPost('posts',['published' => 1]);
}



?>



<!-- TRENDING POST -->
<section class="trending-container">
    <h3>TENDENCIAS</h3>
    <div class="trending-posts">
        <?php foreach($posts as $post):?>
        <div class="post">
            <a href="single.php?id=<?php echo $post['id'];?>">
                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image'];?>" alt="" srcset="">
                <h6><?php echo $post['title'] ;?></h6>
                <p><i style="padding-right: 5px;" class="far fa-user"></i><?php echo $post['username']?></p>
                <p><i style="padding-right: 7px;" class="far fa-calendar-alt"></i><?php echo date('F j, Y', strtotime($post['created_at'])) ;?></p>
            </a>
        </div>
        <?php endforeach;?>
    </div>
</section>

<main>
    <div class="main-container">
        <section class="recent-posts">
            <h1><?php echo $postTitle; ?></h1>
            <?php foreach($mainposts as $mainpost):?>
            <div class="recent-post">
                <img src="<?php echo BASE_URL . '/assets/images/' . $mainpost['image'];?>" alt="" srcset="">
                <h6><?php echo $mainpost['title'] ;?></h6>
                <p><?php echo html_entity_decode(substr($mainpost['body'],0,300)) . "...";?></p>
                <a href="single.php?id=<?php echo $mainpost['id'];?>">CONTINUE READING</a>
            </div>
            <?php endforeach;?>

        </section>
        
        <aside>
            <div class="search">
                <h1>SEARCH</h1>
                <div class="input-search">
                    <form action="index.php" method="post">
                        <input type="text" name="search-tern" id="" placeholder="Search...">                   
                    </form>
                </div>
            </div>
            <div class="topics">
                <h1>ULTIMOS 5</h1>
                <hr>
                <?php foreach ($postsLimit5 as  $postlimit5): ?>
                    <a  style="display: grid;grid-template-columns: 40% auto; align-items: center;" href="single.php?id=<?php echo $postlimit5['id'];?>">
                    <img height="50px" width="70px" src="<?php echo BASE_URL . '/assets/images/' . $postlimit5['image'];?>" alt="" srcset="">
                    <h5><?php echo $postlimit5['title'];?></h5>
                <?php endforeach; ?>  
            </div>
            <div class="topics">
                <h1>TOPICS</h1>
                <hr>
                <?php foreach ($topics as  $topic): ?>
                    <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'];?>"<?php echo $topic['name'];?>>
                    <h5><?php echo $topic['name'];?></h5>
                <?php endforeach; ?>  
            </div>
        </aside>
    </div>
</main>

<!-- FOOTER -->
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>