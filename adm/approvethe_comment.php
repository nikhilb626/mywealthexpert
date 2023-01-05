<?php 

include "../connect/conn.php";

if(isset($_GET["id"])){
 
    $commentid=$_GET['id'];

    $sql="UPDATE `commenttable` SET approved='yes' WHERE id=$commentid ";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:pending_comments.php?e=comment successfully approved");
    }

    else{
        echo "not update";
    }
}



?>