<?php 

include "../connect/conn.php";


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}




if(isset($_GET['id'])){
    $delete_id = $_GET['id'];



        $delete_data_query=mysqli_query($conn,"DELETE FROM `events_detail_table` WHERE id=$delete_id  ")or die('query failed');

        if($delete_data_query){
            header('location:event_detail.php?e=event successfully deleted !');

        }else{
            $showError="Error !!  Cant Delete the event";
        }
   
    }



?>