<?php 

include "../connect/conn.php";


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}




if(isset($_GET['id'])){
    $delete_id = $_GET['id'];


   $delete_file_query = mysqli_query($conn, "SELECT profile FROM `gallery_table` WHERE id ='$delete_id'") or die('query failed');

    $fetch_file = mysqli_fetch_assoc($delete_file_query);
     unlink('../uploads/gallery/'.$fetch_file['profile']);

     $delete_data_query=mysqli_query($conn,"DELETE FROM `gallery_table` WHERE id=$delete_id  ")or die('query failed');

        if($delete_data_query){
            header('location:gallery.php?e=photo successfully deleted !');

        }else{
            $showError="Error !!  Cant Delete the photo";
        }
   
    }



?>