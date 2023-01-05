
  <!-- 
    - #FOOTER
  -->

 
  
<div class="whatsapp_icon_link" id="whatsapp_iconlink">
    <a target="_blank" href="https://wa.me/+916395706350"><img src="assets/images/whatsapp.png" alt="#"></a>
</div>


<div class="phone_icon_link" id="phone_iconlink">
    <a target="_blank" href="tel:+916395706350"><img src="assets/images/phoneicon.png" alt="#"></a>
</div>



  <footer class="footer">

    <div class="section footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">VAST</a>

          <p class="section-text">
            Duis cursus, mi quis viverra ornare, eros dolor interdum nulla utimp erdiet commodo diam libero vitae nibh
            et jus cursus
            id rutrum lore imperdiet ut sem vitae isus tristique posuere
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-google"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Company name</p>
          </li>

          <li>
            <a href="about.php" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="contact.php" class="footer-link">Contact Us</a>
          </li>

          <li>
            <a href="services.php" class="footer-link">Services</a>
          </li>

     
        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Useful Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">App Download</a>
          </li>

          <li>
            <a href="#" class="footer-link">How It Works</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms & Conditions</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Get In Touch</p>
          </li>

          <li class="footer-item">
            <ion-icon name="call-outline" aria-hidden="true"></ion-icon>

            <a href="tel:+12023459999" class="item-link">+12023459999</a>
          </li>

          <li class="footer-item">
            <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>

            <a href="mailto:supportvast@gmail.com" class="item-link">supportvast@gmail.com</a>
          </li>

          <li class="footer-item">
            <ion-icon name="map-outline" aria-hidden="true"></ion-icon>

            <address class="item-link address">
              3004 3 rd Ln,<br>
              Los Angeles, Calnia, 11
            </address>
          </li>

       
       <li class="footer-item">
       <div style="width:100%;" id="google_translate_element"></div>
       </li>

       <li class="footer-item visit_counter">
        <div class="count_name">Visitors Count</div>
        <ul class="count_list">

        <?php 
     $sql="SELECT * FROM `visitor`  ORDER BY id DESC ";
     $result=mysqli_query($conn,$sql);
     
     if(mysqli_num_rows($result) == 1){
 
     $row=mysqli_fetch_assoc($result);
         $v_c=$row['visitor_counter'];

      $count=strlen($v_c);



        for($i=0;$i<$count;$i++){


?>
          <li><?php echo $v_c[$i]; ?></li>
<?php 


}


     }

?>

        </ul>
       </li>
       

        </ul>

      </div>
    </div>

    <div id="loading">
  <div id="loading2" class="loading_inner">

  </div>
</div>


    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 All Rights Reserved by <a href="http://betechnified.com" class="copyright-link">Betechnified IT Solutions</a>.
        </p>

      </div>
    </div>

  </footer>


