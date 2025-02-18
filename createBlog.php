<?php require 'nav.php'?>

<?php 
require('database.php');
    $title = '';
    $author = '';
    $category = '';
    $content = '';
    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Post saved successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    $message2 = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Post was not saved
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    $errors = [
        'title' => '',
        'author' => '',
        'category' => '',
        'content' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        if (empty($title)) {
            $errors['title'] = 'Title is required';
        }elseif (empty($author)) {
            $errors['author'] = 'Author is required';
        }elseif (empty($category)) {
            $errors['category'] = 'Category is required';
        }elseif (empty($content)) {
            $errors['content'] = 'Content is required';
        }else{

            $sql = "INSERT INTO `blogs`(`title`, `category`, `author`, `content`)
                    VALUES ('$title', '$category', '$author', '$content')
            ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo $message;
            } else {
                echo $message2;
            }
            $title = '';
            $author = '';
            $category = '';
            $content = '';
        }
    };
?>
-
    <div class="container col-md-5 mt-5 my-5">
        <form action="" method="post">
            <div>

                <h3 align="center">Create A Post</h3>
                <input 
                    type="text" 
                    placeholder="Title" 
                    name="title" 
                    class="form-control mt-3" 
                    value="<?php echo htmlspecialchars($title)?>"
                >
                <small class=" text-danger"><?php echo $errors['title']?></small>
                <input 
                    type="text" 
                    placeholder="Author" 
                    name="author" 
                    class="form-control mt-3" 
                    value="<?php echo htmlspecialchars($author)?>"
                >
                <small class=" text-danger"><?php echo $errors['author']?></small>
                <select 
                    name="category" 
                    id="" 
                    class="form-select mt-3"
                >
                    <option value="">Select Category</option>
                    <option value="programming">Programming</option>
                    <option value="webDevelopment">Web Development</option>
                    <option value="gaming">Gaming</option>
                    <option value="education">Education</option>
                    <option value="health">Health</option>
                </select>
                <small class=" text-danger"><?php echo $errors['category']?></small>
    
                <textarea   
                    name="content"    
                    id=""  
                    placeholder="Content"    
                    class="form-control mt-3"  
                ></textarea>
                <small class="text-center text-danger"><?php echo $errors['content']?></small>
            </div>
            <button type="submit" class="btn btn-primary mt-3 ms-auto">Post</button>

        </form>
    </div>

    <script>
        // window.location.href ='https://awafim.tv'
    </script>
<?php require 'footer.php'?>
