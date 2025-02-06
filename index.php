<?php include 'blogDetails.php' ?>
<?php require 'nav.php'?>

    <section class="container" style="min-height: 40dvh;">
        <div class="container col-md-6 h-100 align-content-center">
            <h4 class="text-center">Welcome To My Blog👋</h4>
            <p class="text-center p-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus corrupti repellendus sunt. Inventore, alias nemo optio non hic et culpa excepturi unde aliquam ducimus omnis similique iste enim natus blanditiis.</p>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>