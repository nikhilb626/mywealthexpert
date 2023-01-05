<?php 

include "../connect/conn.php";


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}


?>


<?php 

$showAlert=false;
$showError=false;


if(isset($_POST['blog_submit'])){

    $filename = $_FILES['filo']['name'];
    $dat= date("d-m-Y-H-i-s");
    $filename=$dat.'_'.$filename;


    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['filo']['tmp_name'];
    $size = $_FILES['filo']['size'];

    $content=$_POST['editor1'];
    $title=$_POST['title'];
    $category=$_POST['category'];
    $tags=$_POST['tags'];
    $author=$_SESSION['name'];



        if (!in_array($extension, ['jpg','jpeg','png'])) {
            $showError= "You file extension must be  .jpg , .jpeg , .png";
        } elseif ($_FILES['filo']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            $showError= "Thumbnail size too large!";
        }
        else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                    $insertquery="insert into blogtable (title,thumbnail,category,content,tags,author) values('$title','$filename','$category','$content','$tags','$author')";

                $iquery=mysqli_query($conn,$insertquery);
             
             
                if($iquery){
                    header('location:blogs.php?e=Blog SuccessFully Added !');
                }
                else{
                    $showError= 'Error , Fail to Add Blog !';
                }
             
    }




        }
 


}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "partials/headlink.php" ?>
<style>

#side_menu_here{
    padding: 20px;
padding-left: 2px;
}

#side_menu_here ul li{
    list-style:none;
    margin-bottom: 5px;
    border-bottom:1px solid rgb(226, 226, 226);
    padding-top:10px;
}

#side_menu_here ul li:hover{
    border-bottom:1px solid grey;
}

#side_menu_here ul li a{
    text-decoration:none;
    color:grey;
    font-size:1.1rem;
    font-weight: 500;
}


#side_menu_here ul li:hover a{
    color:black;
}

    </style>



</head>
<body>


<div style="display:flex;" id="body_container">
    <div style="box-sizing:border-box;width:300px;height:100vh;"  class="left">
    <?php include "partials/sidebar.php" ?></div>
    <div class="right" style="width: calc(100vw - 300px);height:100vh;overflow-y:scroll;" >
<!-- navbar ends -->


<?php 


if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error !</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


<a href='blogs.php' class="btn btn-primary" ><- BACK</a>


<form class="row g-3 p-4" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Thumbnail</label>
    <input name="filo" type="file" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
  <label for="inputState"  class="form-label">Category</label>
    <select id="inputState" name="category" class="form-select" required>
      <option selected disabled>Select Category</option>
      <?php 
 $select_file = mysqli_query($conn, "SELECT * FROM `categorytable`  ORDER BY id DESC") or die('query failed');
 if(mysqli_num_rows($select_file) > 0){
    while($fetch_products = mysqli_fetch_assoc($select_file)){

?>
      <option value="<?php echo $fetch_products['category']; ?>"><?php echo $fetch_products['category']; ?></option>
 
<?php 
    
}}else{

?>
      <option disabled><?php echo "No Category Added" ?></option>

<?php

}

?>

    </select>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">tags (Should be separated by comma)</label>
    <input type="text" name="tags" class="form-control"  id="inputPassword4" required>
  </div>



  <div class="col-12">
  <label for="inputPassword4" class="form-label">Blog Content</label>

  <textarea name="editor1" placeholder="Enter suggestion Description" class="form-control" required></textarea>
  </div>
  <div class="col-12">
    <input type="submit" class="btn btn-primary" name="blog_submit" value="Submit">
  </div>
</form>







<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor1");

</script> 

<?php include "partials/bottomlink.php"?>
</body>
</html>