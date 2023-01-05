<?php


$showError=false;
$showAlert=false;

include '../connect/conn.php';


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}






if (isset($_POST['submit'])) { // if save button on the form is clicked
    
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $email=stripcslashes($email);
  $password=stripcslashes($password);
  $cpassword=stripcslashes($cpassword);

    $email = mysqli_real_escape_string($conn, $email);
    $pass = mysqli_real_escape_string($conn, md5($password));
    $cpass = mysqli_real_escape_string($conn, md5($cpassword));




    $existing_file = mysqli_query($conn, "SELECT * FROM `paneluser` WHERE email='$email' ") or die('query failed');

    if(mysqli_num_rows($existing_file) > 0){
        $showError="File name Already Exists, Please change the File name.";
    }else{



                $select_users = mysqli_query($conn, "SELECT * FROM `paneluser` WHERE email = '$email' ") or die('query failed');

                if(mysqli_num_rows($select_users) > 0){
                   $showError = 'user already exist!';
                }else{
                   if($pass != $cpass){
                      $showError = 'confirm password not matched!';
                   }else{
                     $resulting= mysqli_query($conn, "INSERT INTO `paneluser`(email,password) VALUES( '$email','$pass')") or die('query failed');
                      
                      if($resulting){
                          $showAlert = 'congratulation !,  registered successfully!';

                      }else{


                        $showError='Registration Error';

                      }
                      
                    
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
</head>
<body>
    
<?php 
if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation!</strong> '.$showAlert.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error !</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>
    

<div class="card mx-auto my-5 " style="width:380px;">
  <div class="card-header text-center">
    ADMIN REGISTER PANEL 
  </div>
  <div class="card-body ">
  <form method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Account Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" required> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm password</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="confirm Password" required>
  </div>
  <input type="submit" value="register" name="submit" class="btn btn-primary my-4">

</form>
  </div>
</div>







<?php include "partials/bottomlink.php" ?>
</body>
</html>