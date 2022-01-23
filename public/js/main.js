const navLinks = document.querySelector(".nav-links").querySelectorAll("li");

navLinks.forEach((Element) => {
    Element.addEventListener("click", function () {
        navLinks.forEach((navLinks) => navLinks.classList.remove("active-list"));
      this.classList.add("active-list");
    });
  });
/* 

  var i = 0; // Start point 
  // Image List
var images = ["./img/announcements/1.jpg", "./img/announcements/2.jpg", "./img/announcements/3.jpg","./img/announcements/3.jpg"]; 
var time = 3000; 


// Change Image
var responsiveSlider = function() {

  
  var imagelist = document.getElementById("slideWrap").querySelectorAll("img");
  var count = 1;
  var sliderWidth = imagelist[count].clientWidth;

  var slideList = document.getElementById("slideWrap");

  var items = slideList.querySelectorAll("li").length;
  var prev = document.getElementById("prev");
  var next = document.getElementById("next");
  

  
  var prevSlide = function() {
    if(count > 1) {
      count = count - 2;
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
    else if(count = 1) {
      count = items - 1;
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
  };
  
  var nextSlide = function() {
    if(count < items) {
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
    else if(count = items) {
      slideList.style.left = "0px";
      count = 1;
    }
  };
  
  next.addEventListener("click", function() {
    nextSlide();
  });
  
  prev.addEventListener("click", function() {
    prevSlide();
  });
  
  setInterval(function() {
    nextSlide()
  }, 11000);
  
  };
  
  window.onload = function() {
  responsiveSlider();  
  }
   */