<?php 

include "../connect/conn.php";



session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin home page</title>
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
  
  <?php

if(isset($_GET['e'])){
    $msg=$_GET['e'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulation!</strong> '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }


?>













<div class="row m-5" style="justify-content:center;">






  <div class="col-sm-3 m-2">
    <div class="card text-center">

      <div class="card-body text-center">


      <?php

$linknum=0;


$sql="SELECT * FROM `events_detail_table`  ORDER BY id DESC ";


$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0){
$linknum=mysqli_num_rows($result);

}

?>

      <h1 class="card-title"><?php echo $linknum ?></h1>
      <hr>

        <h5 class="card-title" style="color:grey;">EVENT DETAIL</h5>

        <a href="event_detail.php" style="width:100%;" class="btn btn-primary">VISIT</a>
      </div>
    </div>
  </div>








<!-- box    inter -->



<div class="col-sm-3 m-2">
    <div class="card text-center">

      <div class="card-body text-center">


      <?php

$linknum=0;


$sql="SELECT * FROM `event_table`  ORDER BY id DESC ";


$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0){
$linknum=mysqli_num_rows($result);

}

?>

      <h1 class="card-title"><?php echo $linknum ?></h1>
      <hr>

        <h5 class="card-title" style="color:grey;">EVENT PHOTOS</h5>

        <a href="event.php" style="width:100%;" class="btn btn-primary">VISIT</a>
      </div>
    </div>
  </div>






  <!-- box inter -->



  


  <div class="col-sm-3 m-2">
    <div class="card text-center">

      <div class="card-body text-center">


      <?php

$linknum=0;


$sql="SELECT * FROM `gallery_table`  ORDER BY id DESC ";


$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0){
$linknum=mysqli_num_rows($result);

}

?>

      <h1 class="card-title"><?php echo $linknum ?></h1>
      <hr>

        <h5 class="card-title" style="color:grey;">GALLERY PHOTOS</h5>

        <a href="gallery.php" style="width:100%;" class="btn btn-primary">VISIT</a>
      </div>
    </div>
  </div>




  
  <!-- box inter -->

  
  <!-- box inter -->



  


  <div class="col-sm-3 m-2">
    <div class="card text-center">

      <div class="card-body text-center">


      <?php

$linknum=0;


$sql="SELECT * FROM `messagetable`  ORDER BY id DESC ";


$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0){
$linknum=mysqli_num_rows($result);

}

?>

      <h1 class="card-title"><?php echo $linknum ?></h1>
      <hr>

        <h5 class="card-title" style="color:grey;">MESSAGE LIST</h5>

        <a href="message.php" style="width:100%;" class="btn btn-primary">VISIT</a>
      </div>
    </div>
  </div>




  
  <!-- box inter -->



  
  <!-- box inter -->



  


  <div class="col-sm-3 m-2">
    <div class="card text-center">

      <div class="card-body text-center">


      <?php

$linknum=0;


$sql="SELECT * FROM `querytable`  ORDER BY id DESC ";


$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0){
$linknum=mysqli_num_rows($result);

}

?>

      <h1 class="card-title"><?php echo $linknum ?></h1>
      <hr>

        <h5 class="card-title" style="color:grey;">QUERY LIST</h5>

        <a href="query.php" style="width:100%;" class="btn btn-primary">VISIT</a>
      </div>
    </div>
  </div>




  
  <!-- box inter -->


</div>



</div>
</div>







<?php include "partials/bottomlink.php" ?>
</body>
</html>