<?php 

include "../connect/conn.php";


if(isset($_GET['id'])){


$deleteid = $_GET['id'];


$delete_file_query = mysqli_query($conn, "SELECT thumbnail FROM `blogtable` WHERE id ='$deleteid'") or die('query failed');

$fetch_file = mysqli_fetch_assoc($delete_file_query);
unlink('../uploads/'.$fetch_file['thumbnail']);


mysqli_query($conn, "DELETE FROM `blogtable` WHERE id = '$deleteid'") or die('query failed');
header('location:blogs.php?e=successfully deleted blog');


}



?>