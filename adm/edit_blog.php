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

    // $filename = $_FILES['filo']['name'];
    // $dat= date("d-m-Y-H-i-s");
    // $filename=$dat.'_'.$filename;


    // destination of the file on the server
    // $destination = '../uploads/' . $filename;

    // get the file extension
    // $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    // $file = $_FILES['filo']['tmp_name'];
    // $size = $_FILES['filo']['size'];

    $content=$_POST['editor1'];
    $title=$_POST['title'];
    $category=$_POST['category'];
    $tags=$_POST['tags'];

    $id=$_GET['id'];

    $blogid=$_GET['id'];

 $select_file = mysqli_query($conn, "SELECT * FROM `blogtable` WHERE id=$blogid  ORDER BY id DESC") or die('query failed');

 $row = mysqli_fetch_assoc($select_file);


 $thumbnail=$row['thumbnail'];



        // if (!in_array($extension, ['jpg','jpeg','png'])) {
        //     $showError= "You file extension must be  .jpg , .jpeg , .png";
        // } elseif ($_FILES['filo']['size'] > 5000000) { 
        //     $showError= "Thumbnail size too large!";
        // }
        // else {
          
        //     if (move_uploaded_file($file, $destination)) {
                  
                    $sql="UPDATE `blogtable` set id=$id, title='$title',thumbnail='$thumbnail',category='$category',content='$content',tags='$tags'  WHERE id=$id ";


                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header('location:blogs.php?e=Blog SuccessFully Updated !');
                    }
                
                    else{
                        echo "Blog not updated ";
                    }

             
    // }




        // }
 


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

<a href='blogs.php' class="btn btn-primary" ><- BACK</a>
<?php 


if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error !</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


<?php 

$blogid=$_GET['id'];

 $select_file = mysqli_query($conn, "SELECT * FROM `blogtable` WHERE id=$blogid  ORDER BY id DESC") or die('query failed');
 if(mysqli_num_rows($select_file) > 0){
 $row = mysqli_fetch_assoc($select_file);

 $title=$row['title'];
 $thumbnail=$row['thumbnail'];
 $category=$row['category'];
 $tags=$row['tags'];
 $content=$row['content'];


?>




<form class="row g-3 p-4" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Title</label>
    <input name="title" value="<?php echo $title; ?>" type="text" class="form-control" id="inputEmail4" required>
  </div>

  <div class="col-md-6">
  <label for="inputState"  class="form-label">Category</label>
  <?php
                $selected = $category;

                $select_file = mysqli_query($conn, "SELECT * FROM `categorytable`  ORDER BY id DESC") or die('query failed');
                if(mysqli_num_rows($select_file) > 0){
                  
                $options=array();
  

              while($fetch_products = mysqli_fetch_assoc($select_file)){


                array_push($options,$fetch_products['category']);


                };

            }
                echo '<select id="inputState" name="category" class="form-select" required>';
                foreach($options as $option){
                    if($selected == $option) {
                        echo "<option selected='selected' value='$option'>$option</option>";
                    }
                    else {
                        echo "<option value='$option'>$option</option>";
                    }
                }
                echo "</select>";
            ?>
    

  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">tags (Should be separated by comma)</label>
    <input value="<?php echo $tags; ?>" type="text" name="tags" class="form-control"  id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">edit thumbnail</label>
   <a href="editthumb.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">EDIT THUMBNAIL</a>
  </div>



  <div class="col-12">
  <label for="inputPassword4" class="form-label">Blog Content</label>

  <textarea name="editor1" placeholder="Enter suggestion Description" class="form-control" required><?php echo $content; ?></textarea>
  </div>
  <div class="col-12">
    <input type="submit" class="btn btn-primary" name="blog_submit" value="EDIT BLOG">
  </div>
</form>


<?php 

 }

?>


</div>



<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor1");

</script> 

<?php include "partials/bottomlink.php"?>
</body>
</html>