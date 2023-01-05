<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>service</title>
    <?php include "partials/headlink.php" ?>
</head>
<body  onload="loadingFunction()">
<?php include "partials/navbar.php" ?>



<section class=" other-overlay">
            <div class="btn_container">
              <h2 class='overlay-heading'>OUR SERVICES</h2>
              <h3 class="overlay_breadcrumb"><a href="index.php">Home</a> >> <a href="about.php">services</a></h3>
            </div>
 </section>
            



 <main>

 <article>



 <section id="services_with_detail">
 <p class="section-subtitle" style="text-align:center;margin-top:80px;">How we manage your finance</p>
<h2 class="h2 section-title" style="text-align:center;margin-bottom:80px;">SERVICES WE PROVIDE</h2>


<div class="services_list_container2 container">



<div class="services_list_box2">
    <div class="icon_container2"><i class="bi bi-cash-coin"></i></div>
    <div class="services_name2">Finance Service</div>

    <div class="services_detail2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam consectetur quaerat rerum incidunt explicabo error tenetur blanditiis ullam doloremque!</div>

    <div class="services_btn_2"><button href="" class='btn btn-secondary' style="border-radius:2px;" onclick="openModal()">QUERY</button></div>

</div>




<div class="services_list_box2">
    <div class="icon_container2"><i class="bi bi-cash-coin"></i></div>
    <div class="services_name2">Finance Service</div>

    <div class="services_detail2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam consectetur quaerat rerum incidunt explicabo error tenetur blanditiis ullam doloremque!</div>

    <div class="services_btn_2"><button href="" class='btn btn-secondary' style="border-radius:2px;" onclick="openModal()">QUERY</button></div>

</div>




<div class="services_list_box2">
    <div class="icon_container2"><i class="bi bi-cash-coin"></i></div>
    <div class="services_name2">Finance Service</div>

    <div class="services_detail2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam consectetur quaerat rerum incidunt explicabo error tenetur blanditiis ullam doloremque!</div>

    <div class="services_btn_2"><button href="" class='btn btn-secondary' style="border-radius:2px;" onclick="openModal()">QUERY</button></div>

</div>




<div class="services_list_box2">
    <div class="icon_container2"><i class="bi bi-cash-coin"></i></div>
    <div class="services_name2">Finance Service</div>

    <div class="services_detail2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam consectetur quaerat rerum incidunt explicabo error tenetur blanditiis ullam doloremque!</div>

    <div class="services_btn_2"><button href="" class='btn btn-secondary' style="border-radius:2px;" onclick="openModal()">QUERY</button></div>

</div>




<div class="services_list_box2">
    <div class="icon_container2"><i class="bi bi-cash-coin"></i></div>
    <div class="services_name2">Finance Service</div>

    <div class="services_detail2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam consectetur quaerat rerum incidunt explicabo error tenetur blanditiis ullam doloremque!</div>

    <div class="services_btn_2"><button href="" class='btn btn-secondary' style="border-radius:2px;" onclick="openModal()">QUERY</button></div>

</div>




<div class="services_list_box2">
    <div class="icon_container2"><i class="bi bi-cash-coin"></i></div>
    <div class="services_name2">Finance Service</div>

    <div class="services_detail2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam consectetur quaerat rerum incidunt explicabo error tenetur blanditiis ullam doloremque!</div>

    <div class="services_btn_2"><button href="" class='btn btn-secondary' style="border-radius:2px;" onclick="openModal()">QUERY</button></div>

</div>





</div>



<!-- <button class="btn btn-secondary" onclick="openModal()">open modal</button> -->


 </section>

 <div id="fullscreen_overlay">

 </div>


 <div class="modal" id="modal">
    <div class="modal_head">Form Contact <i onclick="closeModal()" class="bi bi-x-square"></i></div>
    <div class="modal_body">


    <div class="form_control">
        <label for="name">Full Name</label>
        <input type="text" class="inputs">
    </div>

    <div class="form_control">
        <label for="name">Email Address</label>
        <input type="text" class="inputs">
    </div>

    <div class="form_control">
        <label for="name">Phone Number</label>
        <input type="text" class="inputs">
    </div>

    <div class="form_control">
        <label for="name">Services</label>
        <select name="" id="select" class="selects">
            <option value="" selected disabled>Choose Services</option>
            <option value="">service 1</option>
            <option value="">service 2</option>
            <option value="">service 3</option>
            <option value="">service 4</option>
        </select>
    </div>

    <div class="form_control">
        <label for="file">Upload Document</label>
        <input type="file" name="" id="">
    </div>


    <div class="form_control">
        <button class="form_sbmit btn btn-secondary">SUBMIT FORM</button>
    </div>

    </div>
    <div class="modal_foot">
        Please Fill the form here
    </div>
 </div>



 </article>

 </main>



<script>
    function openModal(){
        document.getElementById("modal").style.top = "50%";
        document.getElementById("fullscreen_overlay").style.zIndex = "99988";
        document.getElementById("fullscreen_overlay").style.background = "rgba(0, 0, 0, 0.781)";

    }



    function closeModal(){
        document.getElementById("modal").style.top = "-100%";
        document.getElementById("fullscreen_overlay").style.zIndex = "-11";
        document.getElementById("fullscreen_overlay").style.background = "transparent";
    }




</script>

<?php include "partials/footer.php" ?>
<?php include "partials/bottomlink.php" ?>

</body>
</html>