<?php
    require 'nav.php';
    require 'database.php';


    $sql = 'SELECT * FROM blogs';
    $query = mysqli_query($conn, $sql);
    $blogPosts = mysqli_fetch_all($query, MYSQLI_ASSOC);  

    
    

 
 ?>

    <section class="container-fluid mt-5 align-content-center" style="min-height: 50dvh;">
        <div class="container align-content-center" style="min-height: 40dvh; ">
            <h3 class="text-center p-3">The Muse: Your Creative Sanctuary</h3>   
            <p class="text-center p-3">The Muse is a vibrant blog website designed to inspire and empower creators, thinkers, and dreamers. Featuring thought-provoking articles, practical tips, and personal stories, it’s a space where ideas come to life. Whether you’re an artist, writer, or simply someone seeking inspiration, The Muse is your go-to destination for creativity and growth. Explore, connect, and let your imagination soar! ✨</p>
        </div>
    </section>

    <section class="container" style="min-height: 40dvh;">
        <div class="row">
            <?php foreach ($blogPosts as $blog) { ?>
                <div class="blog-card col-md-4 mt-5 align-content-center">
                    <div class="card m-auto"  style="min-height: 30dvh;">
                        <div class="card-body">
                            <img src="<?php echo $blog['imagePath']; ?>" style="width: 100%; height: 300px; object-fit: cover;" class="card-img-top " alt="...">
                            <h5 class="card-title p-2"><?php echo $blog['title']; ?></h5>
                            <h6 class="card-subtitle p-2 mb-2 text-body-secondary">By <?php echo $blog['author']; ?></h6>
                            <p style="overflow: hidden; white-space:nowrap; text-overflow: ellipsis;" class="card-text p-2 mb-1"><?php echo $blog['content'] ?></p>
                            <small class="fw-medium p-2 mb-4"><?php echo date('F j, Y', strtotime($blog['date_created'])); ?></small>
                            <a href="singleBlog.php/?id=<?php echo $blog['blogID']?>" class="d-block p-2 card-link">Read more</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    
    <?php require 'footer.php'?>
