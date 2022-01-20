<?php
include("config/config.php");
$title = "Home";
$css_links = '<link rel="stylesheet" type="text/css" href="css/blogs.css">';
include("header.php");

$db = new DatabaseManager();

$query="SELECT * FROM blogs";
$values=null;
$content='';

$rows=$db->safeRetrieve($query,$values);
$total_rows=count($rows);

?>
<div class="body-content">
<main class="blog-section">
    <section class="blog-content">  
    <?php for($k=0;$k<$total_rows;$k++) {
	        $blog_id= $rows[$k]['id'];
	        $blog_title= $rows[$k]['title'];
            $blog_author= $rows[$k]['author'];
            $blog_image= $rows[$k]['head_image'];
            $blog_read_time= $rows[$k]['blog_read_time'];
    ?>   
        <article class="post blog-card--one-third ">      
                <figure>
                    <a href="blog_content.php?blog_id=<?=$blog_id?>">
                        <img src="<?=$blog_image?>" alt="<?=$blog_title?>" class="hsg-deferred loading" data-was-processed="true">
                    </a>
                </figure>
                <div class="post-content">
                    <h3 class="post-title">
                        <a href="blog_content.php?blog_id=<?=$blog_id?>">
                            <?=$blog_title?>
                        </a>
                    </h3>
                    <div class="post-meta">
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

    <section class="blog-name-list">
        <!-- <h3 class="popular-post">Popular Blogs</h3> -->

        <?php for($k=0;$k<$total_rows;$k++) {
	         $blog_id= $rows[$k]['id'];
             $blog_title= $rows[$k]['title'];
             $blog_author= $rows[$k]['author'];
             $blog_image= $rows[$k]['head_image'];
             $blog_read_time= $rows[$k]['blog_read_time'];
        ?>  
        <!-- <article class="menu-post">      
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
        </article> -->

        <?php } ?>     
    </section>
</main>
        </div>
<?php 
include("footer.php");
?>