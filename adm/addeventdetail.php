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


if(isset($_POST['add_event_detail']) ){


    
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);


        

    $start_date2 = strtotime($start_date);
    $end_date2 = strtotime($end_date);

    $datediff = $end_date2 - $start_date2;





    $days=round($datediff / (60 * 60 * 24));


    $total_dates=array();


    if($days==0){
      array_push($total_dates,$start_date);
    }
    else{

      
    for($i=0;$i<$days;$i++){
      
      $day_ind= date('Y-m-d', strtotime($start_date. ' + '.$i.' days'));

      array_push($total_dates,$day_ind);
      
    }


  }



    $total_dates_str=implode(",",$total_dates);

    


        
             $add_form_query = mysqli_query($conn, "INSERT INTO `events_detail_table` (event_name,client_name,starting_date,end_date,total_dates) VALUES('$event_name','$client_name','$start_date','$end_date','$total_dates_str')") or die('query failed');


            if($add_form_query){
              header('location:event_detail.php?e=event Successfully Added');
            }

            else{
              $showError="Error !! Event Not Added.";
            }
        
     }

    
 

?>



 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>add feed</title>
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
    ADD EVENT DETAIL
  </div>
  <div class="card-body ">


  <form class="row g-5" method="POST" enctype="multipart/form-data">


  <!-- <div class="col-6">
    <label for="event" class="form-label">EVENT NAME</label>
    <input type="text"  name="event_name" class="form-control" id="event" placeholder="Enter Event Name" required>
  </div> -->
  <div class="col-6">
    <label for="client" class="form-label">CLIENT NAME</label>
    <input type="text"  name="client_name" class="form-control" id="client" placeholder="Enter Client Name" required>
  </div>
  <div class="col-6">
    <label for="ev" class="form-label">EVENT NAME</label>
    <input type="text"  name="event_name" class="form-control" id="ev" placeholder="Enter Event Name" required>
  </div>
  <div class="col-6">
    <label for="start" class="form-label">STARTING DATE</label>

    <input type="date"  name="start_date" class="form-control" id="start" placeholder="Enter Starting Date" required>
  </div>
  <div class="col-6">
    <label for="end" class="form-label">ENDING DATE</label>
    <input type="date"  name="end_date" class="form-control" id="end" placeholder="Enter Ending Date" required>
  </div>


 
  <div class="col-12">
    <input type="submit" name="add_event_detail" class="btn btn-primary"></input>
  </div>
</form>





  </div>
</div>

  </div>
</div>







<?php include "partials/bottomlink.php" ?>
</body>
</html>