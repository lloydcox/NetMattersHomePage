// Scripts

// Carousel Scripts

$(document).ready(function () {
    $('.banner-carousel').slick({
      autoplay: false,
      arrows: false,
      dots: true,
      infinite: true,
      speed: 1500,
      fade: true,
      cssEase: 'linear'
    });

// Cookie Scripts
const modal = document.querySelector('.modal');
const acceptBtn = document.querySelector('#acceptCookies');


/** Show Modal **/
(() => {
  const isCookieAccepted = JSON.parse(window.localStorage.getItem('cookie'));

  if (isCookieAccepted) {
    console.log(`Cookie status: ${isCookieAccepted}`)
  } else {
    modal.classList.add('show')
  }
})();

/** Close modal and Set cookie true in ls **/
acceptBtn.addEventListener('click', () => {
  window.localStorage.setItem('cookie', true);
  modal.classList.remove('show')
})



// Side Menu scripts

$(document).ready(function() {
  var menuRight = document.getElementById('cbp-spmenu-s2'),
    showRightPush = document.getElementById('showRightPush'),
    body = document.body;  
  
  showRightPush.onclick = function() {
    classie.toggle(this, 'active');
    classie.toggle(body, 'cbp-spmenu-push-toleft');
    classie.toggle(menuRight, 'cbp-spmenu-open');
    disableOther('showRightPush');
    if (showRightPush.style.display != 'none') {
    } else {
      showRightPush.style.display = 'flex';
    }
  };
    
  function disableOther(button) {
    if (button !== 'showRightPush') {
      classie.toggle(showRightPush, 'disabled');
    }
  }  
  })
  });

// Nav Bar 

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("scroll_nav").style.top = "0";
  } else {
    document.getElementById("scroll_nav").style.top = "-250px";
  }
  prevScrollpos = currentScrollPos;
}

// Hamburger button

  var $hamburger = $(".hamburger");
  $hamburger.on("click", function(e) {
    $hamburger.toggleClass("is-active");
    // Do something else, like open/close menu
  });
