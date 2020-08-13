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
$(document).ready(function () {
$(".grt-cookies").grtCookie({
    textcolor: "#333",
    background: "#fff",
    buttonbackground: "#333",
    buttontextcolor: "#fff",
  });
});
// Side Menu scripts
$(document).ready(function () {
var menuRight = document.getElementById('cbp-spmenu-s2'),
    showRightPush = document.getElementById('showRightPush'),
    crossRightPush = document.getElementById('crossRightPush1'),
    body = document.body;


showRightPush.onclick = function () {
    "use strict";
    classie.toggle(this, 'active');
    classie.toggle(body, 'cbp-spmenu-push-toleft');
    classie.toggle(menuRight, 'cbp-spmenu-open');
    disableOther('showRightPush');
    if (showRightPush.style.display != 'none') {
        crossRightPush.style.display = 'none';
        showRightPush.style.display = 'flex';
      } else {
        crossRightPush.style.display = 'none';
        showRightPush.style.display = 'flex';
      }
};

crossRightPush.onclick = function () {
    "use strict";
    classie.toggle(this, 'active');
    classie.toggle(body, 'cbp-spmenu-push-toleft');
    classie.toggle(menuRight, 'cbp-spmenu-open');
    disableOther('crossRightPush');
    disableOther1('showRightPush');
    if (crossRightPush.style.display != 'none') {
        showRightPush.style.display = 'none';
        crossRightPush.style.display = 'flex';
      } else {
        showRightPush.style.display = 'none';
        crossRightPush.style.display = 'flex';
      }
};

function disableOther(button) {
    "use strict";
    if (button !== 'showRightPush') {
        classie.toggle(showRightPush, 'disabled');
    }
}

function disableOther1(button) {
    "use strict";
    if (button !== 'crossRightPush') {
        classie.toggle(crossRightPush, 'disabled');
    }
}

});'end'});
