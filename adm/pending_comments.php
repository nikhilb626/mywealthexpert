
<?php 

include "../connect/conn.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}

$email=$_SESSION['user_email'];

$selected_event = mysqli_query($conn, "SELECT * FROM `paneluser` WHERE email='$email'  ") or die('query failed');

$num=mysqli_num_rows($selected_event); 

if($num==1){

$fetch_event = mysqli_fetch_assoc($selected_event);

$usertype=$fetch_event['usertype'];

if($usertype=="blogger"){
    header("location:adminhome.php");
}



}





if(isset($_GET['delete_comment'])){
  $id=$_GET['delete_id'];

header("location:delete_comment.php?id=".$id);


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


if(isset($_GET['e'])){

    $alert=$_GET['e'];

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>successful !</strong> '.$alert.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>

<div class="container-fluid d-flex p-3 flex-wrap justify-content-between .align-items-center" style=" border-bottom:1px solid rgb(224, 224, 224);" >




<form class="row row-cols-lg-auto g-3 align-items-center mx-auto " style="justify-content:center;" >





  <div class="col-12">
    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
    <select class="form-select" name="search" id="inlineFormSelectPref">
      <option selected disabled>Choose Blog</option>
      <?php 
 $select_file = mysqli_query($conn, "SELECT * FROM `blogtable`  ORDER BY id DESC") or die('query failed');
 if(mysqli_num_rows($select_file) > 0){
    while($fetch_products = mysqli_fetch_assoc($select_file)){

?>
      <option value="<?php echo $fetch_products['id']; ?>"><?php echo $fetch_products['title']; ?></option>
 
<?php 
    
}}else{

?>
      <option disabled><?php echo "No Blog Added" ?></option>

<?php

}

?>
    </select>
  </div>


  <div class="col-12">
    <button type="submit" class="btn btn-primary">Search</button>
    <a href="comments.php" class="btn btn-primary">All</a>
  </div>
</form>





<a href="comments.php" style="width: 200px;height:40px;" class="btn btn-success">approved comments</a>


</div>





<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">comment</th>
      <th scope="col">Date/time</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>



  <?php 

if(isset($_GET['search'])){

    $blogid=$_GET['search'];

    $select_file = mysqli_query($conn, "SELECT * FROM `commenttable` WHERE approved='no' AND  blogid='$blogid' ORDER BY id DESC") or die('query failed');
    if(mysqli_num_rows($select_file) > 0){
        $sno=1;
       while($fetch_products = mysqli_fetch_assoc($select_file)){
?>



<tr>
      <th scope="row"><?php echo $sno; ?></th>
      <td><?php echo $fetch_products['name']; ?></td>
      <td><?php echo $fetch_products['email']; ?></td>
      <td><?php echo $fetch_products['message']; ?></td>
      <td><?php echo $fetch_products['timestamp']; ?></td>
      <td><a href="approvethe_comment.php?id=<?php echo $fetch_products['id']; ?>" class="btn btn-primary">approve</a></td>
      <td>   <form style="width:fit-content;float:right;" >
  <input type="text" value="<?php echo $fetch_products['id'] ?>" name="delete_id" hidden>
  <input name="delete_comment" class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this comment?')">
  </form></td>
</tr>





<?php

        $sno+=1;

       }

       }else{
        echo "<tr class='text-center'><td colspan=6>No Pending Comments to Show</td></tr>";
       }
}

else{


    $select_file = mysqli_query($conn, "SELECT * FROM `commenttable` WHERE approved='no' ORDER BY id DESC") or die('query failed');
    if(mysqli_num_rows($select_file) > 0){
        $sno=1;
       while($fetch_products = mysqli_fetch_assoc($select_file)){

?>



<tr>
      <th scope="row"><?php echo $sno; ?></th>
      <td><?php echo $fetch_products['name']; ?></td>
      <td><?php echo $fetch_products['email']; ?></td>
      <td><?php echo $fetch_products['message']; ?></td>
      <td><?php echo $fetch_products['timestamp']; ?></td>
      <td><a href="approvethe_comment.php?id=<?php echo $fetch_products['id']; ?>" class="btn btn-primary">approve</a></td>
      <td>   <form style="width:fit-content;float:right;" >
  <input type="text" value="<?php echo $fetch_products['id'] ?>" name="delete_id" hidden>
  <input name="delete_comment" class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this comment?')">
  </form></td>
</tr>


<?php 

$sno+=1;

       }
       } else{
        echo "<tr class='text-center'><td colspan=6>No Pending Comments to Show</td></tr>";
       }

}

?>










  </tbody>
</table>


</div>




<?php include "partials/bottomlink.php" ?>
</body>
</html>