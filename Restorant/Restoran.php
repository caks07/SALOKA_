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
        <a href="..\home\home.php" class="logo">
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

          <a href="..\home\home.php" class="logo">
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
              <a
                href="..\home\home.php"
                class="navbar-link hover-underline"
              >
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
                href="..\Restorant\Restoran.php"
                class="navbar-link hover-underline active"
              >
                <div class="separator"></div>

                <span class="span">Resto</span>
              </a>
            </li>

            <li class="navbar-item">
              <a
                href="..\Festival\Festival.php"
                class="navbar-link hover-underline"
              >
                <div class="separator"></div>

                <span class="span">Festival</span>
              </a>
            </li>

            <li class="navbar-item">
              <a
                href="..\AboutUs\AboutUs.html"
                class="navbar-link hover-underline"
              >
                <div class="separator"></div>

                <span class="span">About us</span>
              </a>
            </li>

            <li class="navbar-item">
              <a href="..\ProfileUser\profile.php" class="navbar-link hover-underline">
                <div class="separator"></div>

                <span class="span">Account</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- logout-->
        <a href="..\index.html" class="btn btn-secondary">
          <span class="text text-1">Log out</span>

          <span class="text text-2" aria-hidden="true">Log out</span>
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

        <form id="filterForm" method="post" action="Restoran.php"> 
          <div>
        <ul class="fiter-list">
        <p class="section-subtitle">DAERAH</p>
          <select id="selectWilayah" name="wilayah" class="input-field">
            <option value="semuaWilayah">SEMUA</option>
            <option value="bandung">BANDUNG</option>
            <option value="jogja">JOGJA</option>
            <option value="jepara">JEPARA</option>
            <option value="jakarta">JAKARTA</option>
            <option value="samarinda">SAMARINDA</option>
            <option value="semarang">SEMARANG</option>
            <option value="sukabumi">SUKABUMI</option>
            <option value="solo">SOLO</option>
          </select>
        </ul>
        </div>
        <ul class="fiter-list">
        <button type="submit" class="btn btn-secondary" id="applyFilterBtn">
          <span class="text text-1">Terapkan</span>
          <span class="text text-2" aria-hidden="true">Terapkan</span>
        </button>
        </form>
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
            // Query untuk mengambil data makanan dari tabel        
        $sql = "SELECT * FROM restoran WHERE 1=1";;


        // Cek apakah filter wilayah dipilih
        if (isset($_POST['wilayah']) && $_POST['wilayah'] !== 'semuaWilayah') {
          $wilayah = $_POST['wilayah'];
          $sql .= " AND Wilayah = '$wilayah'";
        }
  // Jika tidak ada data yang difilter, maka query akan menampilkan semua data
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
    echo '<li><p>Maaf restoran belum terdaftar.</p></li>';
  }
  ?>
</ul>
    </div>
</section>

<!-- link js -->
<script src="script.js"></script>
</body>
</html>
