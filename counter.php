<?php 



$sql="UPDATE `visitor` set id=1, visitor_counter=visitor_counter+1  WHERE id=1 ";


mysqli_query($conn,$sql);



?>