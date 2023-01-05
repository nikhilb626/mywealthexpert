<?php

include '../connect/conn.php';


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}









if(isset($_GET['delete_id'])){
  $id=$_GET['delete_id'];

header("location:delete_query.php?id=".$id);


}




?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>event detail</title>
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
    
    
    <?php

if(isset($_GET['e'])){
    $msg=$_GET['e'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulation!</strong> '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }


?>








<h4 class="text-center"  style="border-bottom:1px solid rgb(224, 224, 224);padding:10px;" >QUERY LIST</h4>
<div class="container mt-5 mb-5">
   

    <table class="table table-hover" id="myTable">



    <thead>
    <tr>
      <th>#</th>
      <th>NAME</th>
      <th>PHONE</th>
      <th>EVENT ON</th>
      <th>EVENT TILL</th>
      <th>DATE/TIME</th>
      <th>ACTION</th>
    </tr>
  </thead>
  
    <tbody>


<?php


        $sql="SELECT * FROM `querytable`  ORDER BY id DESC ";


        $result=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0){
    
    
    
          $sno=1;
    
      
          while($row=mysqli_fetch_assoc($result)){
            $name=$row['name'];
            $phone=$row['phone'];
            $date=$row['date'];
            $date2=$row['date2'];
            $timestamp=$row['timestamp'];
            $id=$row['id'];
            



?>




<tr>
<td><?php echo $sno; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $phone; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $date2; ?></td>
<td><?php echo $timestamp; ?></td>




<td>
<form  >
  <input type="text" value="<?php echo $id ?>" name="delete_id" hidden>
  <input name="delete_message" class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this feed?')">
  </form>
</td>

</tr>



<?php 

$sno+=1;

}
 }


?>


  
 
    </tbody>
</table>
</div></div>
</div>



<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
<?php include "partials/bottomlink.php" ?>
</body>
</html>