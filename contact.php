<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <?php include "partials/headlink.php" ?>
</head>
<body  onload="loadingFunction()">
<?php include "partials/navbar.php" ?>



<main>
    <article>



        <section class=" other-overlay">
            <div class="btn_container">
              <h2 class='overlay-heading'>CONTACT US</h2>
              <h3 class="overlay_breadcrumb"><a href="index.php">Home</a> >> <a href="about.php">contact</a></h3>
            </div>
        </section>
            





        <section class="container contact-boxes">

                  
            <div class="contact-box-container grid-list">
              
              
              <div class="contact-col">
                <div class="contact-image"><img src="assets/images/address.png" alt="facility image"></div>
                <div class="contact-name">India, Uttrakhand 245464 </div>
                <div class="contact-name">district-pauri garhwal , city kotdwara</div>
              </div>
          
          
              
              <div class="contact-col">
                <div class="contact-image"><img src="assets/images/email.png" alt="facility image"></div>
                <div class="contact-name">example1@gmail.com</div>
                <div class="contact-name">example2@gmail.com</div>
              </div>
          
          
              
              <div class="contact-col">
                <div class="contact-image"><img src="assets/images/phone.png" alt="facility image"></div>
                <div class="contact-name">+91-498434868</div>
                <div class="contact-name">+91-346346345</div>
              </div>
          
          
              
           
          

          
          
          
            </div>
          
          </section>
          





          <!-- contact form here -->




          
<section id="contact" class="contact-form-container container grid-list">
    <div class="col col1">
   
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11632.496240118548!2d78.04126616716059!3d29.911484007957405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3909dcc202279c09%3A0x7c43b63689cc005!2sUttarakhand!5e0!3m2!1sen!2sin!4v1671025729492!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  

    </div>
  
  
    <div class="col col2">
      <div class="form">
        <h5 class="form-heading">GET IN TOUCH</h5>
  
    <div class="row-half">
        <div class="row">
            <label for="phone">Phone no.</label>
            <input type="number" id="phone">
        </div>
      <div class="row">
        <label for="email">Email</label>
        <input type="Email" id="email">
    </div>
    </div>
  
    
  <div class="row">
    <label for="location">Message</label>
 <textarea name="message" id="message" cols="30" rows="10"></textarea>
  </div>
  
     
 
        <input type="submit" class="btn btn-secondary" value="SUBMIT" id="check-btn">
  
    </div>
    </div>
  </section>
  
  
  
  






    </article>
</main>




<?php include "partials/footer.php" ?>
<?php include "partials/bottomlink.php" ?>

</body>
</html>