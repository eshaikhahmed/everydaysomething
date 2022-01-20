<?php
include("config/config.php");
$db = new DatabaseManager();

 

$title = "Me";
$css_links = '<link rel="stylesheet" type="text/css" href="css/blog_content.css">';
include("header.php");


?>


<main class="blog-section">
    <section class="blog-content"> 
        <h1 class="blog-heading">About Me</h1>
        
       
        <!-- <img src="<?=$rows[0]['head_image']?>" class="hsg-deferred" /> -->

      
        <div  class="blog-body">
                    <p><span>My name is Ejaz Shaikh and I'm a software developer.&nbsp;</span></p>
            <p><span>I love to learn something new everyday and share it with everyone.</span><br /><br /><span>✔️ Apart from learning, I help students and business to grow in their life.</span><br /><br />I can help you with&nbsp;</p>
            <p><span>⚫️ Website&nbsp;</span><br /><span>⚫️ Android App</span><br /><span>⚫️ Automation Scripts</span></p>
            <p>Computer languages</p>
            <p><span>🔷 Java</span></p>
            <p><span>🔷 Python</span></p>
            <p><span>🔷 PHP</span><br /><span></span></p>
            <p><span>Currently I'm learning Rust</span><br /><span>📃 Github: https://github.com/eshaikhahmed/rust_learnings</span><br /><br /><span>Apart from coding, I enjoy playing badminton and football.</span></p>
            <p>You can contact me</p>
            <p><span>📍&nbsp;</span>LinkedIn:&nbsp;<a href="https://www.linkedin.com/in/eshaikhahmed">https://www.linkedin.com/in/eshaikhahmed</a></p>
            <p><span>📍&nbsp;</span>Twitter: <a href="https://twitter.com/eshaikhahmed" title="https://twitter.com/eshaikhahmed">https://twitter.com/eshaikhahmed</a>&nbsp;</p>
 
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