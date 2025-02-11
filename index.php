<?php include 'blogDetails.php' ?>
<?php require 'nav.php'?>

    <section class="container-fluid mt-5 align-content-center" style="min-height: 70dvh;">
        <div class="container align-content-center" style="min-height: 40dvh; ">
            <h3 class="text-center p-3">Welcome To My Blog👋</h3>   
            <p class="text-center p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptas harum illo aperiam eum soluta quas assumenda minima dolore architecto, cupiditate fugit perspiciatis accusamus sapiente laudantium ipsam eveniet ex error!</p>
        </div>
    </section>

    <section class="container" style="min-height: 40dvh;">
        <div class="row">
            <?php foreach ($blogPosts as $blog) { ?>
                <div class="blog-card col-md-4 align-content-center">
                    <div class="card m-auto"  style="min-height: 30dvh;">
                        <div class="card-body">
                            <h5 class="card-title p-2"><?php echo $blog['title']; ?></h5>
                            <h6 class="card-subtitle p-2 mb-2 text-body-secondary">By <?php echo $blog['author']; ?></h6>
                            <p class="card-text p-2 mb-1"><?php echo $blog['content'] ?></p>
                            <small class="fw-medium p-2 mb-4"><?php echo $blog['date'] ?></small>
                            <a href="#" class="d-block p-2 card-link">Read more</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    
    <?php require 'footer.php'?>
