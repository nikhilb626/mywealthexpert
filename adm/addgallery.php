<?php 

include "../connect/conn.php";



session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}


?>



<?php 


$showError=false;


if(isset($_POST['add_photo']) ){


    
  $filename = $_FILES['filo']['name'];
  $dat= date("d-m-Y-H-i-s");
  $filename=$dat.'_'.$filename;


  // destination of the file on the server
  $destination = '../uploads/gallery/' . $filename;

  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $file = $_FILES['filo']['tmp_name'];
  $size = $_FILES['filo']['size'];




    $existingproduct = mysqli_query($conn, "SELECT * FROM `gallery_table` WHERE profile = '$file' ") or die('query failed');
 
    if(mysqli_num_rows($existingproduct) > 0){
       $showError = 'Photo already Exists';
    }else{
     
        

            if (!in_array($extension, ['jpg','jpeg','png'])) {
              $showError= "You file extension must be  .jpg , .jpeg , .png";
          } elseif ($_FILES['filo']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
              $showError= "Photo size too large!";
          }
          else {
              // move the uploaded (temporary) file to the specified destination
              if (move_uploaded_file($file, $destination)) {
                      $insertquery="insert into gallery_table (profile) values('$filename')";
  
                  $iquery=mysqli_query($conn,$insertquery);
               
               
                  if($iquery){
                        header('location:gallery.php?e=Photo SuccessFully Added !');
                  }
                  else{
                      $showError= 'Error , Fail to Add Photo !';
                  }
               
      }
  
  
  
  
          }
   



        
     }

    
    }

?>



 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      
<div class="container-fluid d-flex p-3 flex-wrap justify-content-between .align-items-center" >
<button onclick="history.back()"  style="width: 200px;height:40px;" class="btn btn-primary"></i>Back</button>
</div>

<?php

if($showError){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error !</strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
?>




<div class="card mx-auto my-5 " style="width: 900px;">
  <div class="card-header text-center">
    ADD GALLERY
  </div>
  <div class="card-body ">


  <form class="row g-5" method="POST" enctype="multipart/form-data">

  <div class="col-12">
    <label for="inputAddress" class="form-label">Add Photo</label>
    <input name="filo" type="file" class="form-control" id="inputPassword4" required>
  </div>


 
  <div class="col-12">
    <input type="submit" name="add_photo" class="btn btn-primary"></input>
  </div>
</form>





  </div>
</div>

  </div>
</div>







<?php include "partials/bottomlink.php" ?>
</body>
</html>