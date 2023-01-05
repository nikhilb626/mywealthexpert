'use strict';



/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navToggler = document.querySelector("[data-nav-toggler]");
const navLinks = document.querySelectorAll("[data-nav-link]");

const toggleNavbar = function () { navbar.classList.toggle("active"); }

addEventOnElem(navToggler, "click", toggleNavbar);

const closeNavbar = function () { navbar.classList.remove("active"); }

addEventOnElem(navLinks, "click", closeNavbar);



/**
 * header active
 */

// const header = document.querySelector("[data-header]");
// const backTopBtn = document.querySelector("[data-back-top-btn]");

// window.addEventListener("scroll", function () {
//   if (window.scrollY > 100) {
//     header.classList.add("active");
//     backTopBtn.classList.add("active");
//   } else {
//     header.classList.remove("active");
//     backTopBtn.classList.remove("active");
//   }
// });






var swiper = new Swiper(".services-slider", {
  loop:true,
  grabCursor:true,
  spaceBetween: 50,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
}
,
navigation: {
  nextEl: ".team-next",
  prevEl: ".team-prev",
},
  breakpoints: {
     450: {
        slidesPerView: 1,
      },
     640: {
       slidesPerView: 2,
     },
     768: {
       slidesPerView: 2,
     },
     1000: {
       slidesPerView: 3,
     },
  },
});
