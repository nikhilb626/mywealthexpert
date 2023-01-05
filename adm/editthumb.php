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


if(isset($_POST['thumbnail_submit'])){

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


    $id=$_GET['id'];

    $blogid=$_GET['id'];

    $delete_file_query = mysqli_query($conn, "SELECT thumbnail FROM `blogtable` WHERE id = $blogid ") or die('query failed');

   $fetch_delete_file = mysqli_fetch_assoc($delete_file_query);
   unlink('../uploads/'.$fetch_delete_file['thumbnail']);





        if (!in_array($extension, ['jpg','jpeg','png'])) {
            $showError= "You file extension must be  .jpg , .jpeg , .png";
        } elseif ($_FILES['filo']['size'] > 5000000) { 
            $showError= "Thumbnail size too large!";
        }
        else {
          
            if (move_uploaded_file($file, $destination)) {
                  
                    $sql="UPDATE `blogtable` set id=$id, thumbnail='$filename' WHERE id=$id ";


                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header('location:blogs.php?e=Blog Thumbnail SuccessFully Updated !');
                    }
                
                    else{
                        echo "Blog not updated ";
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


<a href='blogs.php' class="btn btn-primary" ><- BACK</a>


<div class="card mx-auto my-5 " style="width: 380px;">
  <div class="card-header text-center">
 EDIT  BLOG  THUMBNAIL
  </div>
  <div class="card-body ">
  <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">thumbnail</label>
    <input name="filo" type="file" class="form-control" id="inputPassword4" required>
  </div>
 


  <input type="submit" value="edit thumbnail" name="thumbnail_submit" class="btn btn-primary my-4">
</form>
  </div>
</div>




</div>



<?php include "partials/bottomlink.php"?>
</body>
</html>