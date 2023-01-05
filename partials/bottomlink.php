

  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" id="backtotop" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>



    
  <script>
  


  var preloader=document.getElementById('loading');
  var preloader2=document.getElementById('loading2');




function loadingFunction(){
  preloader.style.display='none';
  preloader2.style.display='none';

}




var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;

  if (100 >= currentScrollPos) {
        document.getElementById("whatsapp_iconlink").style.transform = "scale(0)";
        document.getElementById("phone_iconlink").style.transform = "scale(0)";
       
        document.getElementById("phone_iconlink").classList.remove("activatedvibe");
        document.getElementById("backtotop").classList.remove("activetopbtn");
    
      } else {
        document.getElementById("whatsapp_iconlink").style.transform = "scale(1)";
        document.getElementById("phone_iconlink").style.transform = "scale(1)";
        document.getElementById("phone_iconlink").classList.add("activatedvibe");
        document.getElementById("backtotop").classList.add("activetopbtn");
 }


  prevScrollpos = currentScrollPos;
}





</script>
  

  

  <!-- 
    - custom js link
  -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>