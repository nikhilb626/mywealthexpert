<style>



    #sidebar_here::-webkit-scrollbar{
    width:4px;
}




#sidebar_here::-webkit-scrollbar-track{
    background:rgb(229, 229, 229);
}

#sidebar_here::-webkit-scrollbar-thumb{
    background:black;
}



    .page_links_here{
        border-bottom:1px solid rgb(229, 229, 229);
        text-decoration:none;
        padding:10px;
        font-size: 0.9rem;
        color:black;
    background:white;
        transition:0.2s linear;
        display:flex;
        justify-content: space-between;
    }

    .page_links_here i{
        font-size: 1.2rem;
    }


.page_links_here:hover{
   

    background:grey;
        color:white;
}


.page_links_here:active,.active{
    background: #5e7ea1;
background: linear-gradient(90deg,#5e7ea1 0%, #3a5e85 80%);
background: -webkit-linear-gradient(90deg,#5e7ea1 0%, #3a5e85 80%);
background: -moz-linear-gradient(90deg,#5e7ea1 0%, #3a5e85 80%);
        color:white;
}
</style>


<?php 


$url=$_SERVER['REQUEST_URI'];
$myurl=substr($url,20);


// online
// $myurl=substr($url,7);







?>


<div style="box-sizing:border-box;width:300px;position:fixed;top:0;left:0;bottom:0;height: 100vh;overflow-y:scroll;display:flex;flex-direction:column;" id="sidebar_here">
<a style="text-decoration:none;text-align:center;font-size:1.5rem;padding:30px 10px;border-bottom:1px solid rgb(229, 229, 229);" href="home.php">ADMIN PANEL</a>

    <?php 

$homeclass="";
$galleryclass="";
$eventphotoclass="";
$eventdetailclass="";
$messagesclass="";
$queriesclass="";

    

if($myurl=="home.php" OR explode("?",$myurl)[0]=="home.php"){
    $homeclass="active";
}
if($myurl=="gallery.php" OR explode("?",$myurl)[0]=="gallery.php" OR $myurl=="addgallery.php"){
    $galleryclass="active";
}
if($myurl=="event.php" OR explode("?",$myurl)[0]=="event.php" OR $myurl=="addevent.php"){
    $eventphotoclass="active";
}
if($myurl=="event_detail.php" OR explode("?",$myurl)[0]=="eventdetail.php" OR $myurl=="addeventdetail.php"){
    $eventdetailclass="active";
}
if($myurl=="message.php" OR explode("?",$myurl)[0]=="message.php"){
    $messagesclass="active";
}
if($myurl=="query" OR explode("?",$myurl)[0]=="query.php"){
    $queriesclass="active";
}



?>

      <a class="page_links_here <?php echo $homeclass; ?>"  href="home.php">HOME <i class="bi bi-arrow-right-square"></i></a>
      <a class="page_links_here <?php echo $galleryclass; ?>" href="gallery.php">GALLERY<i class="bi bi-arrow-right-square"></i></a>
      <a class="page_links_here <?php echo $eventphotoclass; ?>" href="event.php">EVENT PHOTOS<i class="bi bi-arrow-right-square"></i></a>
      <a class="page_links_here <?php echo $eventdetailclass; ?>" href="event_detail.php">EVENT DETAIL<i class="bi bi-arrow-right-square"></i></a>
      <a class="page_links_here <?php echo $messagesclass; ?>" href="message.php">MESSAGES<i class="bi bi-arrow-right-square"></i></a>
      <a class="page_links_here <?php echo $queriesclass; ?>" href="query.php">QUERIES<i class="bi bi-arrow-right-square"></i></a>


      <a href="logout.php" class="btn btn-outline-success" style="margin:20px;" type="submit">LOGOUT</a>

</div>