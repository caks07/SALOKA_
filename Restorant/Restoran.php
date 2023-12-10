<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="Style.css" rel="stylesheet" />
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
                href="..\Makanan\Makanan.php"
                class="navbar-link hover-underline"
              >
                <div class="separator"></div>

                <span class="span">Food</span>
              </a>
            </li>

            <li class="navbar-item">
              <a
                href="../Restoran/Restoran.html"
                class="navbar-link hover-underline active"
              >
                <div class="separator"></div>

                <span class="span">Resto</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="..\Festival makanan\Fest.html" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">Festival</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="..\AboutUs\AboutUs.html" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">About us</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="..\Profile Template\index.html" class="navbar-link hover-underline">
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

<section class="section section-divider white blog" id="blog">
    <div class="container">
        <p class="section-subtitle">CULTURE</p>
        <h2 class="h2 section-title">
            Rekomendasi <span class="span">Restoran</span> untuk
            <span class="span">Anda</span>
        </h2>
        <p class="section-text">
            mencari restoran sesuai dengan pilihan dan mood anda? Ini solusinya!
        </p>

         <ul class="fiter-list">
          <li>
            <button class="filter-btn active">SEMUA</button>
          </li>

          <li>
            <button class="filter-btn">JOGJA</button>
          </li>

          <li>
            <button class="filter-btn">JEPARA</button>
          </li>

          <li>
            <button class="filter-btn">PURWODADI</button>
          </li>

          <li>
            <button class="filter-btn">PAPUA/TIMIKA</button>
          </li>

          <li>
            <button class="filter-btn">SUKABUMI</button>
          </li>
        </ul>

        <ul class="blog-list">
            <?php
            // Sambungkan ke database
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

            // Query untuk mengambil data restoran dari tabel
            $sql = "SELECT * FROM restoran";
            $result = $conn->query($sql);

            
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<li>';
      echo '<div class="blog-card">';
      echo '<div class="card-banner">';
      echo '<img src="' . $row['Gambar_Restoran'] . '" width="600" height="390" loading="lazy" alt="' . $row['Nama_Restoran'] . '" class="w-100" />';
      echo '<div class="badge">' . $row['Makanan_Terkenal'] . '</div>';
      echo '</div>';
      echo '<div class="card-content">';
      echo '<div class="card-meta-wrapper">';
      echo '<a href="#" class="card-meta-link">';
      echo '<p class="meta-info">Rating</p>';
      echo '<p class="span">' . $row['Rating_Restoran'] . '</p>';
      echo '</a>';
      echo '<a href="#" class="card-meta-link">';
      echo '<p class="meta-info">Owner</p>';
      echo '<p class="span">' . $row['Owner'] . '</p>';
      echo '</a>';
      echo '</div>';
      echo '<div class="card-meta-wrapper">';
      echo '<a href="#" class="card-meta-link">';
      echo '<p class="span">' . $row['Wilayah'] . '</p>';
      echo '</a>';
      echo '</div>';
      echo '<div class="card-meta-wrapper">';
      echo '<a href="#" class="card-meta-link">';
      echo '<p class="meta-info">Maps</p>';
      echo '<p class="span"><a href="' . $row['Maps'] . '">klik di sini</a></p>';
      echo '</a>';
      echo '</div>';
      echo '<h3 class="h3">';
      echo '<a href="#" class="card-title">' . $row['Nama_Restoran'] . '</a>';
      echo '</h3>';
      echo '<p class="card-text">' . $row['Deskripsi'] . '</p>';
      echo '<a href="#" class="btn-text hover-underline label-2">';
      echo '</a>';
      echo '</div>';
      echo '</div>';
      echo '</li>';
    }
  } else {
    echo '<li><p>Tidak ada data restoran.</p></li>';
  }
  ?>
</ul>
    </div>
</section>

<!-- link js -->
<script src="script.js"></script>
</body>
</html>
