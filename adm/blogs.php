
<?php 

include "../connect/conn.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}




if(isset($_GET['delete_blog'])){
  $id=$_GET['delete_id'];

header("location:delete_blog.php?id=".$id);


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
</head>
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
<body>

<!-- navbar starts -->

<div style="display:flex;" id="body_container">
    <div style="box-sizing:border-box;width:300px;height:100vh;"  class="left">
    <?php include "partials/sidebar.php" ?></div>
    <div class="right" style="width: calc(100vw - 300px);height:100vh;overflow-y:scroll;" >


<!-- navbar ends -->

<?php 


if(isset($_GET['e'])){

    $alert=$_GET['e'];

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>successful !</strong> '.$alert.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>

<div class="container-fluid d-flex p-3 flex-wrap justify-content-between .align-items-center" style=" border-bottom:1px solid rgb(224, 224, 224);" >

<a href="add_category.php" style="width: 200px;height:40px;" class="btn btn-success"><i class="bi bi-plus"></i>ADD CATEGORY</a>


<form class="row row-cols-lg-auto g-3 align-items-center mx-auto " style="justify-content:center;" >





  <div class="col-12">
    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
    <select class="form-select" name="search" id="inlineFormSelectPref">
      <option selected disabled>Choose Category</option>
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


  <div class="col-12">
    <button type="submit" class="btn btn-primary">Search</button>
    <a href="blogs.php" class="btn btn-primary">All</a>
  </div>
</form>








<a href="add_blog.php" style="width: 150px;height:40px;" class="btn btn-success"><i class="bi bi-plus"></i>ADD BLOG</a>


</div>




<div class="container-fluid d-flex p-1 flex-wrap justify-content-center">


<?php 

if(isset($_GET['search'])){

    $category=$_GET['search'];

    $select_file = mysqli_query($conn, "SELECT * FROM `blogtable` WHERE category='$category' ORDER BY id DESC") or die('query failed');
    if(mysqli_num_rows($select_file) > 0){
       while($fetch_products = mysqli_fetch_assoc($select_file)){
?>



<div class="card  m-2" style="width: 250px;">
  <img src="../uploads/<? echo $fetch_products['thumbnail'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fetch_products['title'] ?></h5>
    <p class="card-text"><?php echo $fetch_products['timestamp'] ?></p>
    <a href="edit_blog.php?id=<?php echo $fetch_products['id'] ?>" class="btn btn-primary">Edit</a>
    
    <form style="width:fit-content;float:right;">
  <input type="text" value="<?php echo $fetch_products['id'] ?>" name="delete_id" hidden>
  <input name="delete_blog" class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this blog?')">
  </form>
  </div>
</div>









<?php


       }

       }else{
        echo "No Blog To Show !!";
       }
}

else{


    $select_file = mysqli_query($conn, "SELECT * FROM `blogtable` ORDER BY id DESC") or die('query failed');
    if(mysqli_num_rows($select_file) > 0){
       while($fetch_products = mysqli_fetch_assoc($select_file)){

?>




<div class="card  m-2" style="width: 250px;">
  <img src="../uploads/<?php echo $fetch_products['thumbnail'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fetch_products['title'] ?></h5>
    <p class="card-text">Time:<?php echo $fetch_products['timestamp'] ?></p>
    <p class="card-text">Category:<?php echo $fetch_products['category'] ?></p>
    <a href="edit_blog.php?id=<?php echo $fetch_products['id'] ?>" class="btn btn-primary">Edit</a>
   


<form style="width:fit-content;float:right;" >
  
  <input type="text" value="<?php echo $fetch_products['id'] ?>" name="delete_id" hidden>
  <input name="delete_blog" class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this blog?')">
  </form>


  </div>
</div>






<?php 

       }
       } else{
        echo "No Blog To Show !!";
       }

}

?>


</div>



</div>



<!-- blog confirmation -->
<!-- Button trigger modal -->









<?php include "partials/bottomlink.php" ?>
</body>
</html>