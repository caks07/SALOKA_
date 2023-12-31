// Mengambil semua elemen tombol 'filter-btn'
const filterButtons = document.querySelectorAll(".filter-btn");

// Menambahkan event listener ke setiap tombol 'filter-btn'
filterButtons.forEach((button) => {
  button.addEventListener("click", function () {
    // Menghapus kelas 'active' dari semua tombol 'filter-btn'
    filterButtons.forEach((btn) => btn.classList.remove("active"));

    // Menambahkan kelas 'active' hanya pada tombol yang diklik
    button.classList.add("active");
  });
});


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