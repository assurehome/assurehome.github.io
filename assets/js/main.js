 //===== Prealoder
    
 $(window).on('load', function(event) {
  $('.preloader').delay(500).fadeOut(500);
});

// accordion js
$(".accordian").on("click", ".accordian-title", function () {
  $(this).toggleClass("active").next().slideToggle(500);
});

// ==============navbar delay effect============ 

document.addEventListener("DOMContentLoaded", function(){
		
  window.addEventListener('scroll', function() {
       
    if (window.scrollY > 200) {
      document.getElementById('navbar_top').classList.add('fixed-top');
      // add padding top to show content behind navbar
      navbar_height = document.querySelector('.navbar').offsetHeight;
      document.body.style.paddingTop = navbar_height + 'px';
    } else {
       document.getElementById('navbar_top').classList.remove('fixed-top');
       // remove padding top from body
      document.body.style.paddingTop = '0';
    } 
  });
});
