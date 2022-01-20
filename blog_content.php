<?php
include("config/config.php");
$db = new DatabaseManager();

$query = "SELECT * FROM blogs WHERE id = ?";
$values = array($_GET["blog_id"]);
$content='';

$rows=$db->safeRetrieve($query, $values);
$total_rows=count($rows);

$title = $rows[0]['title'];
$css_links = '<link rel="stylesheet" type="text/css" href="css/blog_content.css">';
include("header.php");


?>


<main class="blog-section">
    <section class="blog-content"> 
        <h1 class="blog-heading"><?=$rows[0]['title']?></h1>
        <div class="author-info">
            <span>
                <?=$rows[0]['author']?>&nbsp;
            </span>
            <span href="#" class="blog-card__read-time">
                | <?=$rows[0]['blog_read_time']?>
            </span>
        </div>
       
        <img src="<?=$rows[0]['head_image']?>" class="hsg-deferred" />

      
        <div  class="blog-body">
            <?=$rows[0]['content']?>
        </div>
    </section>
    <section class="blog-name-list">
        <h3 class="popular-post">Popular Blogs</h3>
        <?php 
        $query = "SELECT * FROM blogs";
        $values = null;
        $content='';
        
        $rows=$db->safeRetrieve($query, $values);
        $total_rows=count($rows);
        for($k=0;$k<$total_rows;$k++) {
	         $blog_id= $rows[$k]['id'];
             $blog_title= $rows[$k]['title'];
             $blog_author= $rows[$k]['author'];
             $blog_image= $rows[$k]['head_image'];
             $blog_read_time= $rows[$k]['blog_read_time'];
        ?>  
        <article class="menu-post">      
                <div class="post-content">
                    <h3 class="menu-post-title">
                        <a href="blog_content.php?blog_id=<?=$blog_id?>">
                            <?=$blog_title?>
                        </a>
                    </h3>
                    <div class="menu-post-meta">
                        <a href="#" class="blog-card__blog-link">
                            <?=$blog_author?>&nbsp;
                        </a>
                        <a href="#" class="blog-card__read-time">
                           | <?=$blog_read_time ?>
                        </a>
                    </div>
                </div>
        </article>

        <?php } ?>     
 
    </section>
</main>

<?php include("footer.php");