<?php 

include "../connect/conn.php";


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}




if(isset($_GET['id'])){
 
    $delete_id=$_GET['id'];


    $delete_file_query = mysqli_query($conn, "SELECT event_photo FROM `event_table` WHERE id ='$delete_id'") or die('query failed');

    $fetch_file = mysqli_fetch_assoc($delete_file_query);
     unlink('../uploads/event/'.$fetch_file['event_photo']);

     $delete_data_query=mysqli_query($conn,"DELETE FROM `event_table` WHERE id=$delete_id  ")or die('query failed');

        if($delete_data_query){
            header('location:event.php?e=event photo successfully deleted !');

        }else{
            $showError="Error !!  Cant Delete the event";
        }
   
   
    }



?>