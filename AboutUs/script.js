function filterMakanan() {
  var wilayah = document.getElementById("selectWilayah").value.toLowerCase();
  var kategoriRasa = document
    .querySelector(".filter-rasa .filter-btn.active")
    .textContent.toLowerCase();
  var cards = document.querySelectorAll(".food-menu-list li");

  cards.forEach(function (card) {
    var daerah = card.querySelector(".daerah").textContent.toLowerCase();
    var kategori = card.querySelector(".category").textContent.toLowerCase();

    var wilayahFiltered = wilayah === "semua" || daerah === wilayah;
    var rasaFiltered = kategoriRasa === "semua" || kategori === kategoriRasa;

    if (wilayahFiltered && rasaFiltered) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

document
  .getElementById("selectWilayah")
  .addEventListener("change", filterMakanan);

var filterRasaButtons = document.querySelectorAll(".filter-rasa .filter-btn");
filterRasaButtons.forEach(function (btn) {
  btn.addEventListener("click", function () {
    filterRasaButtons.forEach(function (button) {
      button.classList.remove("active");
    });
    this.classList.add("active");
    filterMakanan();
  });
});

// Event listener untuk tombol filter wilayah
var filterWilayahButtons = document.querySelectorAll(".fiter-list select");
filterWilayahButtons.forEach(function (button) {
  button.addEventListener("change", filterMakanan);
});

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
document.addEventListener("DOMContentLoaded", function () {
  var selectWilayah = document.getElementById("selectWilayah");
  var filterRasaButtons = document.querySelectorAll(".filter-rasa .filter-btn");

  selectWilayah.addEventListener("change", filterMakanan);
  filterRasaButtons.forEach(function (btn) {
    btn.addEventListener("click", filterMakanan);
  });

  function filterMakanan() {
    var wilayah = selectWilayah.value.toUpperCase();
    var kategoriRasa = document
      .querySelector(".filter-rasa .filter-btn.active")
      .textContent.toLowerCase();

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var data = JSON.parse(xhr.responseText);
          tampilkanMakanan(data);
        } else {
          console.log("Terjadi kesalahan");
        }
      }
    };

    xhr.open("POST", "getData.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("wilayah=" + wilayah + "&kategoriRasa=" + kategoriRasa);
  }

  function tampilkanMakanan(data) {
    // Tampilkan data di dalam card atau sesuaikan dengan kebutuhan tampilan Anda
    var foodMenuList = document.querySelector(".food-menu-list");
    foodMenuList.innerHTML = "";

    data.forEach(function (item) {
      var card = document.createElement("li");
      card.innerHTML = `
                <div class="food-menu-card">
                    <!-- Sesuaikan dengan struktur card yang Anda inginkan -->
                    <h3>${item.Nama_Makanan}</h3>
                    <p>${item.Kategori_Rasa}</p>
                    <p>${item.Wilayah}</p>
                    <p>${item.Deskripsi_Singkat}</p>
                    <p>${item.Kisaran_Harga}</p>
                </div>
            `;
      foodMenuList.appendChild(card);
    });
  }
});
