<?php 
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM blogs WHERE blogID = '$id'";
    $query = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($query);


    
}
?>

<?php require 'nav.php';?>

<section class="container mt-5" style="min-height: 40dvh;">
    <div>
        <img src="uploads/1740046434.jpeg" class="img-fluid" alt="">
        <h3><?php echo $blog['title'];?></h3>
        <p><?php echo $blog['category'];?></p>
        <p><?php echo $blog['content'];?></p>
        <small class="text-center p-3">By <?php echo $blog['author'];?></small>
        <em><?php echo $blog['date_created'];?></em>
        <div>
            <button class="btn btn-secondary">Edit</button>
            <button class="btn btn-primary">Delete</button>
        </div>
    </div>
</section>

<?php require 'footer.php';?>