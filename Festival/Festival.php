<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Festival</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="Style.css" />
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
                class="navbar-link hover-underline"
              >
                <div class="separator"></div>

                <span class="span">Resto</span>
              </a>
            </li>

            <li class="navbar-item">
              <a
                href="..\Festival\Festival.php"
                class="navbar-link hover-underline active"
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

  <section class="home" id="home">
    <div class="content">
      <h3>Waktunya Merayakan <span>Festival</span> dengan Meriah !!</h3>
    </div>
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "saloka"; // Ganti $database_name menjadi $database

          $conn = mysqli_connect($servername, $username, $password, $database);

          if (!$conn) {
              die("Koneksi gagal: " . mysqli_connect_error());
          }

          // Query untuk mengambil data dari tabel festival
          $sql = "SELECT * FROM festival";
          $result = $conn->query($sql);

          // Memuat data ke dalam kartu festival
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
        ?>
                <div class="swiper-slide">
                  <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_festival']; ?>" />
                  <div class="slide-text">
                    <h4><?php echo $row['nama_festival']; ?></h4>
                    <div class="deskripsi">
                      <p><?php echo $row['deskripsi']; ?></p>
                    </div>
                    <div class="deskripsi">
                     
                    <div class="launch-time" data-target="<?php echo $row['id']; ?>" data-countdown="<?php echo $row['tanggal_input']; ?>">
  <div>
    <p id="days<?php echo $row['id']; ?>">00</p>
    <span>Hari</span>
  </div>
  <div>
    <p id="hours<?php echo $row['id']; ?>">00</p>
    <span>Jam</span>
  </div>
  <div>
    <p id="minutes<?php echo $row['id']; ?>">00</p>
    <span>Menit</span>
  </div>
  <div>
    <p id="seconds<?php echo $row['id']; ?>">00</p>
    <span>Detik</span>
  </div>
</div>
<script>
  setCountdownTimer(
    "<?php echo $row['id']; ?>",
    new Date("<?php echo $row['tanggal_input']; ?>").getTime()
  );
</script>          
                    </div>
                    <div class="deskripsi">
                      <p>Lokasi <span><?php echo $row['lokasi_festival']; ?></span></p>
                    </div>
                    <br />
                    <a href="<?php echo $row['tiket']; ?>" class="btn">Beli tiket</a>
                  </div>
                </div>
        <?php
              }
          } else {
              echo "0 hasil";
          }
          $conn->close();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="FestivalScript.js"></script>
</body>
</html>
