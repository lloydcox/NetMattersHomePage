// Scripts


// Carousel Scripts

$(document).ready(function () {
    $('.banner-carousel').slick({
      dots: true,
      autoplay: true,   
      swipeToSlide: true,
      autoplaySpeed: 3000
    });

// Stop page scroll 

function disableScroll() { 
            // Get the current page scroll position 
            scrollTop =  
              window.pageYOffset || document.documentElement.scrollTop; 
            scrollLeft =  
              window.pageXOffset || document.documentElement.scrollLeft, 
  
                // if any scroll is attempted, 
                // set this to the previous value 
                window.onscroll = function() { 
                    window.scrollTo(scrollLeft, scrollTop); 
                }; 
        } 
  
        function enableScroll() { 
            window.onscroll = function() {}; 
        } 
        
// Cookie Scripts
const modal = document.querySelector('.modal');
const acceptBtn = document.querySelector('#acceptCookies');


/** Show Modal **/
(() => {
  const isCookieAccepted = JSON.parse(window.localStorage.getItem('cookie'));

  if (isCookieAccepted) {
    console.log(`Cookie status: ${isCookieAccepted}`)
  } else {
    modal.classList.add('show'),
    disableScroll();
  }
})();

/** Close modal and Set cookie true in ls **/
  acceptBtn.addEventListener('click', () => {
  window.localStorage.setItem('cookie', true);
  modal.classList.remove('show');
  enableScroll();
})

// search bar 
$( window ).load(function() {
if((window.innerWidth < 1260) && (window.innerWidth > 900  )) {
  $(".search-button").addClass("use");
  $(".use").bind('click', function () {
    $(".buttons").toggleClass("hide sopen");
    $(".ssrow").toggleClass("owide");
    $(".search-outer").toggleClass("hide");
    $(".search-button").toggleClass("thin");
    })
  }
})

$( window ).load(function() {
  if (window.innerWidth < 990) {
    $(".search-button").removeClass("use");
  }
});

$( window ).load(function() {
  if (window.innerWidth > 1260) {
    $(".search-button").removeClass("use");
    $(".buttons").removeClass("hide");
  }
});

$( window ).resize(function() {
  if((window.innerWidth < 1260) && (window.innerWidth > 900 )) {
    $(".search-button").addClass("use");
    $("div.buttons.sopen").addClass("hide");
    $(".use").bind('click', function (event) {
      event.stopPropagation();  
      $(".buttons").toggleClass("hide sopen");
      $(".ssrow").toggleClass("owide");
      $(".search-outer").toggleClass("hide");
      $(".search-button").toggleClass("thin");
    })
  }
});

$( window ).resize(function() {
  if (window.innerWidth > 1260) {
    $(".use").unbind();
    $(".search-button").removeClass("use");
    $(".buttons").removeClass("hide");
  }
});

$( window ).resize(function() {
  if (window.innerWidth < 990) {
    $(".use").unbind();
    $(".search-button").removeClass("use");
  }
});


// Side Menu scripts

$("#slider").slideReveal({
  trigger: $("#trigger"),
  position: "right",
  push: true,
  overlay: true,
  width: 400,
  speed: 1100
});


// Hamburger button
var page = $(".page-container");
var $hamburger = $(".hamburger");
$hamburger.on("click", function(e) {
  $hamburger.toggleClass("is-active");
  page.toggleClass("fixed-position");
  // document.getElementById("scroll_nav").style.right = "10px";
});

var $overlay = $(".slide-reveal-overlay");
$overlay.on("click", function(e) {
  $hamburger.toggleClass("is-active");
  page.toggleClass("fixed-position");
});

// newsletter scripts 

// function checkFluency()
// {
//   var checkbox = document.getElementById('checkbox');
//   if (checkbox.checked = true)
//   {
//     alert("you need to be fluent in English to apply for the job");
//   }
// }

// $(".checkboxn").on('click', function (e) {
//   checkFluency();
// })

// contact form scripts 

$(function () {
  $("form[name='contactForm']").validate({
      // Define validation rules
      rules: {
          name: "required",
          email: "required",
          phone: "required",
          subject: "required",
          message: "required",
          name: {
              required: true
          },
          email: {
              required: true,
              email: true
          },
          phone: {
              required: true,
              minlength: 10,
              maxlength: 12,
              number: true
          },
          subject: {
              required: true
          },
          message: {
              required: true
          }
      },

      // Specify validation error messages
      messages: {
          name: "Please provide a valid name.",
          email: {
              required: "Please enter your email",
              minlength: "Please enter a valid email address"
          },
          phone: {
              required: "Please provide a phone number",
              minlength: "Phone number must be min 10 characters long",
              maxlength: "Phone number must not be more than 13 characters long"
          },
          subject: "Please enter subject",
          message: "Please enter your message"
      },
      submitHandler: function (form) {
          form.submit();
      }
  });
}); 

// form submit code 

function validate() {
  if (document.getElementById('form').checked) {
      return true;
  } else {
      alert("Unchecked form will not be submitted");
      return false;
  }
}

// Arrow keys for Out of Hours 

  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
    $(this).find('i').toggleClass("rotate")
    // toggle down to rotate RATHER THEN CHANG ETHE IMAGE transition in css to rotate.
  });
});
