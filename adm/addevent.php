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


if(isset($_POST['add_feed']) ){


    
    $name = mysqli_real_escape_string($conn, $_POST['name']);




    $existingproduct = mysqli_query($conn, "SELECT * FROM `insta_feed_db` WHERE insta_feed = '$name' ") or die('query failed');
 
    if(mysqli_num_rows($existingproduct) > 0){
       $showError = 'Feed already Exists';
    }else{
     
        
        
             $add_form_query = mysqli_query($conn, "INSERT INTO `insta_feed_db` (insta_feed) VALUES('$name')") or die('query failed');


            if($add_form_query){
              header('location:instafeed.php?e=Feed Successfully Added');
            }

            else{
              $showError="Error !! Feed Not Added.";
            }
        
     }

    
    }

?>




<?php 


$showError=false;


if(isset($_POST['add_event']) ){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
    
  $filename = $_FILES['filo']['name'];
  $dat= date("d-m-Y-H-i-s");
  $filename=$dat.'_'.$filename;


  // destination of the file on the server
  $destination = '../uploads/event/' . $filename;

  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $file = $_FILES['filo']['tmp_name'];
  $size = $_FILES['filo']['size'];




    $existingproduct = mysqli_query($conn, "SELECT * FROM `event_table` WHERE event_photo = '$file' ") or die('query failed');
 
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
                      $insertquery="insert into event_table (event_photo,event_name,event_date) values('$filename','$name','$date')";
  
                  $iquery=mysqli_query($conn,$insertquery);
               
               
                  if($iquery){
                        header('location:event.php?e=Photo SuccessFully Added !');
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
    <title>add event</title>
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
    ADD EVENT PHOTO
  </div>
  <div class="card-body ">


  <form class="row g-5" method="POST" enctype="multipart/form-data">

  <div class="col-12">
    <label for="name" class="form-label">EVENT NAME</label>
    <input type="text"  name="name" class="form-control" id="name" placeholder="Enter Event Name" required>
  </div>
  <div class="col-6">
    <label for="date" class="form-label">EVENT DATE</label>
    <input type="date"  name="date" class="form-control" id="date" placeholder="Enter post Embed Link" required>
  </div>
  <div class="col-6">
  <label for="photo" class="form-label">ADD PHOTO</label>
    <input name="filo" type="file" class="form-control" id="photo" required>
  </div>


 
  <div class="col-12">
    <input type="submit" name="add_event" class="btn btn-primary"></input>
  </div>
</form>





  </div>
</div>

  </div>
</div>







<?php include "partials/bottomlink.php" ?>
</body>
</html>