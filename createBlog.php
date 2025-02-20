<?php require 'nav.php'?>

<?php 
require('database.php');
    $title = '';
    $author = '';
    $category = '';
    $content = '';
    $alert = '';
    $message = '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Post saved successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    $message2 = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
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
        $target_dir = "uploads/";
        $image = $_FILES['image'];
        $imageName = $image["name"];
        $tempName = $image["tmp_name"];
        $imageSize = $image["size"];
        $imageError = $image["error"];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowed =['jpg', 'jpeg', 'png', 'svg'];

        if (empty($title)) {
            $errors['title'] = 'Title is required';
        }elseif (empty($author)) {
            $errors['author'] = 'Author is required';
        }elseif (empty($category)) {
            $errors['category'] = 'Category is required';
        }elseif (empty($content)) {
            $errors['content'] = 'Content is required';
        }else{

            if($imageError === 0){
                if ( $imageSize < 10000000) {
                    $newImageName = time() . "." . $imageExt;
                    // $newImageName = uniqid('', true) . "." . $imageExt;
                    $target_image = $target_dir . $newImageName;
                    if (in_array($imageExt, $allowed)) {
                    

                        if(move_uploaded_file($tempName, $target_image)) {
                            $imagePath = $target_image;

                            $sql = "INSERT INTO `blogs`(`title`, `category`, `author`, `content` , `imagePath`)
                        VALUES ('$title', '$category', '$author', '$content', '$imagePath')
                        ";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $alert = $message;
                        } else {
                            $alert = $message2;
                        }
                        $title = '';
                        $author = '';
                        $category = '';
                        $content = '';

                            

                        } else {
                            $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                Error Uploading Image
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                }else {
                    $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                Error Uploading Image
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
                }
                
                
            }else{ 
                $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                            Error Uploading Image
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';

                
            
        };
        
        

            
        }
    };
?>  
    <div class="container col-md-5 mt-5 my-5">
        <form action="" method="post" enctype="multipart/form-data">
            <?php echo $alert ?>
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

            <label for="image"> Upload Image:</label>
            <input type="file" name="image" class="form-control mb-2" >
            <button type="submit" class="btn btn-primary mt-3 ms-auto">Post</button>

        </form>
    </div>

    <script>
        // window.location.href ='https://awafim.tv'
    </script>
<?php require 'footer.php'?>
