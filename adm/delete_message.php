
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


?>


<?php 




if(isset($_GET['id'])){


$deleteid = $_GET['id'];


$delete=mysqli_query($conn, "DELETE FROM `messagetable` WHERE id = '$deleteid'") or die('query failed');


if($delete){

    header('location:message.php?e=successfully deleted message');
}






}



?>