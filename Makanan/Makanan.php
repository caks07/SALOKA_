<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="Style.css" rel="stylesheet">
</head>
<body>

<!-- HEADER -->
<header class="header" data-header>
      <div class="container">
        <a href="#" class="logo">
          <img
            src="logo.png"
            width="160"
            height="50"
            alt="Saloka - Kuliner Nusantara"
          />
        </a>

        <nav class="navbar" data-navbar>
          <button class="close-btn" aria-label="close menu" data-nav-taggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>

          <a href="#" class="logo">
            <img
              src="logo.png"
              width="160"
              height="50"
              alt="Saloka - Kuliner Nusantara"
            />
          </a>

          <!-- bikin navigasi bar atas -->
          <ul class="navbar-list">
            <li class="navbar-item">
              <a href="..\home\home.php" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">Home</span>
              </a>
            </li>

            <li class="navbar-item">
              <a
                href="../Makanan/Makanan.html"
                class="navbar-link hover-underline active"
              >
                <div class="separator"></div>

                <span class="span">Food</span>
              </a>
            </li>

            <li class="navbar-item">
              <a
                href="..\Restorant\Restoran.php"
                class="navbar-link hover-underline"
              >
                <div class="separator"></div>

                <span class="span">Resto</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="#festival" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">Festival</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="#about" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">About us</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="#profile" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">Account</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- membuat button pemesanan meja -->
        <a href="#table" class="btn btn-secondary">
          <span class="text text-1">Logout</span>

          <span class="text text-2" aria-hidden="true">Logout</span>
        </a>
        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </button>

        <div class="overlay" data-nav-toggler data-overlay></div>
      </div>
    </header>

<section class="section food-menu" id="food-menu">
<div class="container">
        <p class="section-subtitle">KHAS LOKAL</p>

        <h2 class="h2 section-title">
          Makanan <span class="span">Daerah</span>
        </h2>

        <ul class="fiter-list">
          <select id="selectWilayah" name="orang" class="input-field">
            <option value="5-person">SEMUA</option>
            <option value="1-person">JOGJA</option>
            <option value="2-person">JEPARA</option>
            <option value="3-person">PURWODADI</option>
            <option value="4-person">TIMIKA</option>
            <option value="5-person">SUKABUMI</option>
            
          </select>

          <li class="filter-rasa">
            <button class="filter-btn active">SEMUA</button>
          </li>

          <li class="filter-rasa">
            <button class="filter-btn">ASIN</button>
          </li>

          <li class="filter-rasa">
            <button class="filter-btn">MANIS</button>
          </li>

          <li class="filter-rasa">
            <button class="filter-btn">PEDAS</button>
          </li>
        </ul>

    <p class="section-text">DAFTAR MAKANAN</p>

    <ul class="food-menu-list">
      <!-- Card makanan akan diisi oleh data dari database -->
      <?php
        $servername = "localhost";
        $username = "root"; // Ganti dengan username database Anda
        $password = ""; // Ganti dengan password database Anda
        $dbname = "saloka"; // Ganti dengan nama database Anda

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
          die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data makanan dari tabel
        $sql = "SELECT * FROM makanan";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Menampilkan data makanan dalam card
          while($row = $result->fetch_assoc()) {
            echo '<li>';
            echo '<div class="food-menu-card">';
            // Pengisian data card sesuai kolom tabel makanan
            echo '<div class="card-banner">';
            echo '<img src="' . $row["Gambar_Makanan"] . '" width="300" height="300" loading="lazy" alt="' . $row["Nama_Makanan"] . '" class="w-100">';
            echo '</div>';
            echo '<div class="wrapper">';
            echo '<p class="category">' . $row["Kategori_Rasa"] . '</p>';
            echo '<p class="daerah">' . $row["Wilayah"] . '</p>';
            echo '</div>';
            echo '<h3 class="h3 card-title">' . $row["Nama_Makanan"] . '</h3>';
            echo '<div class="price-wrapper">';
            echo '<p class="price-text">Price:</p>';
            echo '<data class="price">' . $row["Kisaran_Harga"] . '</data>';
            echo '</div>';
            echo '<div class="wrapper">';
            echo '<p class="deskripsi-singkat">' . $row["Deskripsi_Singkat"] . '</p>';
            echo '</div>';
            echo '<div class="wrapper">';
            echo '<a href="../deskripsi/deskripsi.php?id_makanan=' . $row["ID_Makanan"] . '" class="btn-text hover-underline label-2">Selengkapnya</a>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
          }
        } else {
          echo "0 results";
        }
        $conn->close();
      ?>
    </ul>
  </div>
</section>

<script src="script.js"></script>
</body>
</html>
