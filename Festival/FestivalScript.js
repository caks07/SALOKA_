// /*NAVBAR*/
/*buat iniin apa list navbar ketutup sama muncul*/
const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
};

/*masih navbar*/
const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
};

addEventOnElements(navTogglers, "click", toggleNavbar);

/*HEADER*/
/*back to top button*/
const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

let lastScrollPos = 0;

const hideHeader = function () {
  const currentScrollPos = window.scrollY;

  if (currentScrollPos > lastScrollPos && currentScrollPos > 50) {
    // Scrolling down & scrolled more than 50 pixels
    header.classList.add("hide");
  } else {
    // Scrolling up or close to the top
    header.classList.remove("hide");
  }

  lastScrollPos = currentScrollPos <= 0 ? 0 : currentScrollPos; // For Mobile or negative scrolling
};

window.addEventListener("scroll", hideHeader);

window.addEventListener("scroll", function () {
  if (window.scrollY >= 50) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
    hideHeader();
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    effect: "coverflow",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
  });

  const launchTimes = document.querySelectorAll(".launch-time");

  launchTimes.forEach((launchTime) => {
    const targetId = launchTime.getAttribute("data-target");
    const countDownDate = new Date(
      launchTime.getAttribute("data-countdown")
    ).getTime();

    setCountdownTimer(targetId, countDownDate);
  });

  // Countdown Timer Function
  function setCountdownTimer(targetId, countDownDate) {
    var x = setInterval(function () {
      var now = new Date().getTime();
      var distance = countDownDate - now;

      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("days" + targetId).innerHTML =
        days < 10 ? "0" + days : days;
      document.getElementById("hours" + targetId).innerHTML =
        hours < 10 ? "0" + hours : hours;
      document.getElementById("minutes" + targetId).innerHTML =
        minutes < 10 ? "0" + minutes : minutes;
      document.getElementById("seconds" + targetId).innerHTML =
        seconds < 10 ? "0" + seconds : seconds;

      if (distance < 0) {
        clearInterval(x);
        document.getElementById("days" + targetId).innerHTML = "00";
        document.getElementById("hours" + targetId).innerHTML = "00";
        document.getElementById("minutes" + targetId).innerHTML = "00";
        document.getElementById("seconds" + targetId).innerHTML = "00";
        // Update hours, minutes, and seconds to "00" when countdown ends
      }
    }, 1000);
  }
});
