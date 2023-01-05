


<?php 

include "../connect/conn.php";


$showError=false;

if(isset($_POST['category_submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);


    $existSql="SELECT * FROM `categorytable` WHERE category='$name' ";

    $result=mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);

    if($numExistRows>0){
      $showError="category already exists";

    }
    else{
   

        $sql="INSERT INTO `categorytable` (`category`) VALUES ('$name')";
        $result=mysqli_query($conn,$sql);

        if($result){
           header('location:blogs.php?e=category added successfully');
        }else{
            $showError="Category Could'nt Add ";
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
  
<?php 



if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error !</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>
    

        <div class="card mx-auto my-5 " style="width:380px;">
  <div class="card-header text-center">
    ADD CATEGORY 
  </div>
  <div class="card-body ">
  <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category">
  </div>
 
  <input type="submit" value="SUBMIT" name="category_submit" class="btn btn-primary my-4">

</form>
  </div>
</div>



</div>


    <?php include "partials/bottomlink.php" ?>
</body>
</html>