<?php
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM blogs WHERE blogID = $id";
    $query = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($query);
}
?>

<?php require 'nav.php'; ?>

<div class="container-fluid px-0 mb-5">
    <div class="position-relative">
        <img src="../<?php echo $blog['imagePath']; ?>" class="w-100" style="height: 700px; object-fit: cover; filter: brightness(0.8);" alt="Blog Image">
        <div class="position-absolute bottom-0 start-0 w-100 p-4 p-md-5" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
            <div class="container">
                <span class="badge bg-secondary p-3 mb-2"><?php echo $blog['category']; ?></span>
                <h1 class="text-white display-4 fw-bold"><?php echo $blog['title']; ?></h1>
                <div class="d-flex align-items-center text-white mt-3">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="small">
                        By <span class="fw-bold"><?php echo $blog['author']; ?></span>
                        <span class="mx-2">•</span>
                        <span><?php echo date('F j, Y', strtotime($blog['date_created'])); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <article class="mb-5">
                <div class="fs-5 lh-lg mb-5">
                    <?php 
                    echo '<div style="white-space: pre-wrap;">';
                    echo $blog['content']; 
                    echo '</div>';
                    ?>
                </div>
            </article>
            
            <div class="card bg-light mb-5 border-0">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                <i class="bi bi-person-fill fs-2"></i>
                            </div>
                        </div>
                        <div class="ms-4">
                            <h5 class="card-title">About the Author</h5>
                            <h6 class="mb-2"><?php echo $blog['author']; ?></h6>
                            <p class="card-text text-muted">Content creator and writer with a passion for sharing knowledge.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex align-items-center py-3 border-top border-bottom mb-5">
                <span class="me-3 fw-bold">Share this article:</span>
                <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="btn btn-outline-info btn-sm rounded-circle me-2">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                    <i class="bi bi-envelope"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4 pb-2 border-bottom">You Might Also Like</h3>
        </div>
    </div>
    <div class="row">
        <?php
        $relatedSql = "SELECT * FROM blogs WHERE category = '{$blog['category']}' AND blogID != {$blog['blogID']} LIMIT 3";
        $relatedQuery = mysqli_query($conn, $relatedSql);
        
        if (mysqli_num_rows($relatedQuery) > 0) {
            while ($related = mysqli_fetch_assoc($relatedQuery)) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../<?php echo $related['imagePath']; ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-secondary mb-2"><?php echo $related['category']; ?></span>
                    <h5 class="card-title"><?php echo $related['title']; ?></h5>
                    <p class="card-text text-muted small">By <?php echo $related['author']; ?></p>
                    <a href="?id=<?php echo $related['blogID']; ?>" class="btn btn-outline-primary stretched-link">Read More</a>
                </div>
            </div>
        </div>
        <?php 
            }
        } else {
        ?>
        <div class="col-12">
            <p class="text-muted">No related articles found.</p>
        </div>
        <?php } ?>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h3 class="mb-4">Comments</h3>
            
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Join the discussion..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>