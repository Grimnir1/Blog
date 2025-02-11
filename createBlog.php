<?php require 'nav.php'?>

<?php 
    $title = '';
    $author = '';
    $category = '';
    $content = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = htmlspecialchars($_POST['title']);
        $author = htmlspecialchars($_POST['author']);
        $category = htmlspecialchars($_POST['category']);
        $content = htmlspecialchars($_POST['content']);

        echo $title . '<br>' . $author . '<br>' . $category . '<br>' . $content;


        $title = '';
        $author = '';
        $category = '';
        $content = '';
    }
    
?>

    <div class="container col-md-5 mt-5 my-5">
        <form action="" method="post">
            <h3 align="center">Create A Post</h3>
            <input 
                type="text" 
                placeholder="Title" 
                name="title" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($title)?>"
            >
            <input 
                type="text" 
                placeholder="Author" 
                name="author" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($author)?>"
            >
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

            <textarea   
                name="content"    
                id=""  
                placeholder="Content"    
                class="form-control mt-3"  
            ></textarea>
            <button type="submit" class="btn btn-primary mt-3 ms-auto">Post</button>

        </form>
    </div>

    <script>
        // window.location.href ='https://awafim.tv'
    </script>
<?php require 'footer.php'?>
