


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>

 <?php include "./partials/headlink.php"; ?>
<?php include "counter.php"; ?>

</head>

<body id="top"   onload="loadingFunction()">

<?php include "partials/navbar.php" ?>
  

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="hero" id="home">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">this is the subheading here</p>

            <h1 class="h1 hero-title">This is the Main Heading Here</h1>

            <p class="section-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididu ut labore et
              dolore magna
              aliqua. Ut enim ad minim veniamquis nostrud
            </p>


          </div>

          <figure class="hero-banner">
            <img src="./assets/images/hero-banner.png" width="769" height="804" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="section features" id="features" aria-label="features">
        <div class="container">

          <p class="section-subtitle">Our Feature</p>

          <h2 class="h2 section-title">Awesome Features</h2>

          <ul class="features-list">

            <li class="features-item">
              <div class="features-card">

                <div class="card-icon">
                  <ion-icon name="create-outline" aria-hidden="true"></ion-icon>
                </div>

                <h3 class="h3 card-title">Easy to Edit</h3>

                <p class="card-text">
                  Lorem ipsum dolor sit cons ectetur adipiscing
                </p>

              </div>
            </li>

            <li class="features-item">
              <div class="features-card">

                <div class="card-icon">
                  <ion-icon name="shield-checkmark-outline" aria-hidden="true"></ion-icon>
                </div>

                <h3 class="h3 card-title">Fully Secure</h3>

                <p class="card-text">
                  Lorem ipsum dolor sit cons ectetur adipiscing
                </p>

              </div>
            </li>

            <li class="features-item">
              <div class="features-card">

                <div class="card-icon">
                  <ion-icon name="settings-outline" aria-hidden="true"></ion-icon>
                </div>

                <h3 class="h3 card-title">Manage User</h3>

                <p class="card-text">
                  Lorem ipsum dolor sit cons ectetur adipiscing
                </p>

              </div>
            </li>

            <li class="features-item">
              <div class="features-card">

                <div class="card-icon">
                  <ion-icon name="cube-outline" aria-hidden="true"></ion-icon>
                </div>

                <h3 class="h3 card-title">Free Trial</h3>

                <p class="card-text">
                  Lorem ipsum dolor sit cons ectetur adipiscing
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./assets/images/about-banner.png" width="1262" height="1357" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

          <div class="about-content">

            <p class="section-subtitle">Our Acquaintance</p>

            <h2 class="h2 section-title">We Are Trusted By Thousands Of People</h2>

            <p class="section-text">
              Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luc tus nec ullamcorper mattis,
              pulvinar
              dapibus leo. Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luc tus nec ullam
              corpe
            </p>

            <ul class="about-list">

              <li class="about-item">

                <div class="item-icon">
                  <ion-icon name="folder" aria-hidden="true"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 item-title">Device Quality Design</h3>

                  <p class="item-text">
                    Lorem ipsum dolor sit amet, consec tetur adipiscing elit Lorem ipsum dolor sit amet, consec tetur
                    adipiscing elit.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="item-icon">
                  <ion-icon name="pie-chart" aria-hidden="true"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 item-title">Easy to Manage Data</h3>

                  <p class="item-text">
                    Lorem ipsum dolor sit amet, consec tetur adipiscing elit Lorem ipsum dolor sit amet, consec tetur
                    adipiscing elit.
                  </p>
                </div>

              </li>

            </ul>

            <a href="#" class="btn btn-secondary">Discover More</a>

          </div>

        </div>
      </section>





      <!-- 
        - #ABOUT 2
      -->

      <section class="section about-2" aria-label="about">
        <div class="container">

          <div class="about-content">

            <p class="section-subtitle">Cool & Amazing Design</p>

            <h2 class="h2 section-title">We Develop Amazing Website For Startups</h2>

            <p class="section-text">
              Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luc tus nec ullamcorper mattis,
              pulvinar
              dapibus leo. Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luc tus nec ullam
              corper.
            </p>

            <p class="section-text">
              Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luc tus nec ullamcorper mattis,
              pulvinar
              dapibus leo. Lorem ipsum dolor.
            </p>

            <a href="#" class="btn btn-secondary">Discover More</a>

          </div>

          <figure class="about-banner">
            <img src="./assets/images/about-banner-2.png" width="1146" height="1226" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

        </div>
      </section>



      <section id="overlay_container">
        <div class="overlay_on">
        <div class="head">CHECK OUR SERVICES </div>
        <div class="button_link"><a class="btn btn-secondary" href="services.php">CHECK NOW</a></div>
        </div>
      </section>








      

    <!-- our services slider -->


    <section class="services">
  




  <p class="section-subtitle" style='text-align:center;'>What Clients Says About Us ?</p>
  <h2 class="h2 section-title" style='text-align:center;margin-bottom:30px;'>OUR TESTIMONIALS</h2>
  
  
      <div class="swiper services-slider">
  
          <div class="swiper-wrapper">
  
         
        
              <div class="swiper-slide box2">
              <div class="services-description"><i class="bi bi-quote"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aspernatur atque ea adipisci consectetur inventore error, voluptatum non in. Velit!</div>
              <div class="services-name">Client Name</div>

              </div>

     
         
        
              <div class="swiper-slide box2">
              <div class="services-description"><i class="bi bi-quote"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aspernatur atque ea adipisci consectetur inventore error, voluptatum non in. Velit!</div>
              <div class="services-name">Client Name</div>

              </div>

     
         
        
              <div class="swiper-slide box2">
              <div class="services-description"><i class="bi bi-quote"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aspernatur atque ea adipisci consectetur inventore error, voluptatum non in. Velit!</div>
              <div class="services-name">Client Name</div>

              </div>

     
         
        
              <div class="swiper-slide box2">
              <div class="services-description"><i class="bi bi-quote"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aspernatur atque ea adipisci consectetur inventore error, voluptatum non in. Velit!</div>
              <div class="services-name">Client Name</div>

              </div>

     
         
        
              <div class="swiper-slide box2">
              <div class="services-description"><i class="bi bi-quote"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aspernatur atque ea adipisci consectetur inventore error, voluptatum non in. Velit!</div>
              <div class="services-name">Client Name</div>

              </div>

     
         
        
              <div class="swiper-slide box2">
              <div class="services-description"><i class="bi bi-quote"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aspernatur atque ea adipisci consectetur inventore error, voluptatum non in. Velit!</div>
              <div class="services-name">Client Name</div>

              </div>

     
         
        
         
         
         
         
      
     
     

</div>
<div class="arrows2 d-flex">
  <div class="team-prev d-flex">
      <i class="bi bi-caret-left-fill"></i>
  </div>
  <div class="team-next d-flex">
      <i class="bi bi-caret-right-fill"></i>
  </div>
</div>

</div>

</section>








  



    </article>
  </main>




<?php include "./partials/footer.php" ?>

<?php include "./partials/bottomlink.php" ?>




</body>

</html>