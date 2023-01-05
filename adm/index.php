<?php

include '../connect/conn.php';

session_start();



if(isset($_SESSION['user_id'])){
  header('location:home.php');
}

// elseif(isset($_SESSION['admin_id'])){
//   header('location:home.php');
// }




?>


<?php

$showError=false;


if(isset($_POST['submit'])){

  $email=$_POST['email'];

  $password=$_POST['password'];

  $email=stripcslashes($email);
  $password=stripcslashes($password);

   $email = mysqli_real_escape_string($conn, $email);
   $pass = mysqli_real_escape_string($conn, md5($password));

   $select_users = mysqli_query($conn, "SELECT * FROM `paneluser` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) == 1){

      $row = mysqli_fetch_assoc($select_users);


      $_SESSION['loggedin']=true;
        $_SESSION['user_id']=$row['id'];
        $_SESSION['user_email']=$row['email'];

    header("location:home.php?e=you are logged in now");


   }else{
      $showError = 'incorrect email or password!';
   }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "partials/headlink.php" ?>
    <title>login page</title>
    
</head>
<body>

<?php 


if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error !</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


<div class="card mx-auto my-5 " style="width: 380px;">
  <div class="card-header text-center">
    ADMIN PANEL
  </div>
  <div class="card-body ">
  <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>


  <input type="submit" value="LOGIN" name="submit" class="btn btn-primary my-4">
</form>
  </div>
</div>



<?php include "partials/bottomlink.php" ?>
</body>
</html>