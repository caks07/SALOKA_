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
  // Ambil elemen-elemen yang diperlukan dari DOM
  const selectWilayah = document.getElementById("selectWilayah");
  const selectRasa = document.getElementById("selectRasa");
  const applyFilterBtn = document.getElementById("applyFilterBtn");
  const foodMenuList = document.getElementById("foodMenuList");

  // Fungsi untuk mendapatkan data makanan dengan filter dari PHP
  const getFilteredFood = function () {
    // Dapatkan nilai filter wilayah dan rasa
    const selectedWilayah = selectWilayah.value;
    const selectedRasa = selectRasa.value;

    // Kirim request dengan filter menggunakan fetch API
    fetch("Makanan.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        wilayah: selectedWilayah,
        rasa: selectedRasa,
      }).toString(),
    })
      .then((response) => response.text())
      .then((data) => {
        // Update bagian yang menampilkan card makanan dengan data baru
        foodMenuList.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  };

  // Tambahkan event listener untuk tombol terapkan filter
  applyFilterBtn.addEventListener("click", getFilteredFood);
});
