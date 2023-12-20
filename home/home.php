<?php
include 'config.php';
// Memulai session
session_start();

// Periksa apakah pengguna sudah login atau tidak
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika belum login, redirect ke halaman login atau tindakan lain
    header("Location: ../Login/Login.php");
    exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Ambil ID pengguna yang sudah login dari session
    $user_id = $_SESSION['ID_Pengguna'];

    // Query untuk mengambil data pemesanan pengguna yang sudah login
    $query = "SELECT p.ID_Pemesanan, p.Nama_Pelanggan, p.Nomor_Telepon, r.Nama_Restoran, p.Jumlah_Orang, p.Tanggal, p.Jam, p.Catatan
                FROM pemesanan p
                INNER JOIN restoran r ON p.ID_Restoran = r.ID_Restoran
                WHERE p.ID_Pengguna = $user_id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Handle kesalahan query
        die("Query error: " . mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- tags  -->
    <title>Saloka Food</title>
    <meta name="title" content="heaven tim saloka proyek" />

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap"
      rel="stylesheet"
    />

    <!-- link css -->
    <link rel="stylesheet" href="style.css" />

    <!-- gambar preload -->
    <link rel="preload" as="image" href="https://i.pinimg.com/736x/7d/40/5b/7d405b3f26be93af85a63eb8e367e30f.jpg" />
    <link rel="preload" as="image" href="https://i.pinimg.com/736x/c6/66/af/c666af20e3baa75ad4e4ddcc4fe85030.jpg" />
    <link rel="preload" as="image" href="https://i.pinimg.com/736x/ae/64/3b/ae643bd17a0654aaece198c8d9894cf9.jpg" />
  </head>
  <body>
    <!-- PRELOAD -->
    <div class="preload" data-preaload>
      <div class="circle"></div>
      <p class="text">Saloka</p>
    </div>

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
                class="navbar-link hover-underline active"
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

    <main>
      <article>
        <!-- BANNER -->
        <section class="hero text-center" aria-label="home" id="home">
          <ul class="hero-slider" data-hero-slider>
            <li class="slider-item active" data-hero-slider-item>
              <div class="slider-bg">
                <img
                  src="https://i.pinimg.com/736x/7d/40/5b/7d405b3f26be93af85a63eb8e367e30f.jpg"
                  width="1880"
                  height="950"
                  alt=""
                  class="img-cover"
                />
              </div>

              <p class="label-2 section-subtitle slider-reveal">Tradational</p>

              <h1 class="display-1 hero-title slider-reveal">
                Sate Lilit khas Bali
              </h1>

              <p class="body-2 hero-text slider-reveal">
                nikmati sate lembut yang ditusuk dengan sereh dan dipanggang
                dengan arang
              </p>
            </li>

            <li class="slider-item" data-hero-slider-item>
              <div class="slider-bg">
                <img
                  src="https://i.pinimg.com/736x/c6/66/af/c666af20e3baa75ad4e4ddcc4fe85030.jpg"
                  width="1880"
                  height="950"
                  alt=""
                  class="img-cover"
                />
              </div>

              <p class="label-2 section-subtitle slider-reveal">Meaning Full</p>

              <h1 class="display-1 baner-title slider-reveal">Ayam Betutu</h1>

              <p class="body-2 hero-text slider-reveal">
                Ayam yang dipanggang selama 12 jam dengan arang jerami dan
                dibalut bumbu khas bali yang nikmat
              </p>
            </li>

            <li class="slider-item" data-hero-slider-item>
              <div class="slider-bg">
                <img
                  src="https://i.pinimg.com/736x/ae/64/3b/ae643bd17a0654aaece198c8d9894cf9.jpg"
                  width="1880"
                  height="950"
                  alt=""
                  class="img-cover"
                />
              </div>

              <p class="label-2 section-subtitle slider-reveal">Celebration</p>

              <h1 class="display-1 baner-title slider-reveal">Nasi Tumpeng</h1>

              <p class="body-2 hero-text slider-reveal">
                Makanan yang biasanya untuk perayaan dan juga penuh makna dari
                setiap komponennya
              </p>
            </li>
          </ul>
          <button
            class="slider-btn prev"
            aria-label="slide to previous"
            data-prev-btn
          >
            <ion-icon name="chevron-back"></ion-icon>
          </button>

          <button
            class="slider-btn next"
            aria-label="slide to next"
            data-next-btn
          >
            <ion-icon name="chevron-forward"></ion-icon>
          </button>
        </section>

        <!-- FOOD MENU -->

        <section
          class="section service bg-black-10 text-center"
          aria-label="service"
        >
          <div class="container">
            <p class="section-subtitle label-2">Cita Rasa Lokal</p>

            <h2 class="headline-1 section-title">Let's Try <span>Gaskan!!</span></h2>

            <p class="section-text">
              Berikut adalah karegori menu kami silahkan dipilih untuk
              selengkapnya
            </p>

            <ul class="grid-list">
              <li>
                <div class="service-card">
                  <a href="..\Makanan\Makanan.php" class="has-before hover:shine">
                    <figure
                      class="card-banner img-holder"
                      style="--width: 285; --height: 336"
                    >
                      <img
                        src="https://i.pinimg.com/736x/3d/44/ca/3d44ca0b0b30fa53c903521f424aede0.jpg"
                        width="285"
                        height="336"
                        loading="lazy"
                        alt="Asin"
                        class="img-cover"
                      />
                    </figure>
                  </a>

                  <div class="card-content">
                    <h3 class="title-4 card-title">
                      <a href="#">ASIN</a>
                    </h3>

                    <a href="..\Makanan\Makanan.php" class="btn-text hover-underline label-2"
                      >Selengkapnya</a
                    >
                  </div>
                </div>
              </li>

              <li>
                <div class="service-card">
                  <a href="..\Makanan\Makanan.php" class="has-before hover:shine">
                    <figure
                      class="card-banner img-holder"
                      style="--width: 285; --height: 336"
                    >
                      <img
                        src="menu-2.jpg"
                        width="285"
                        height="336"
                        loading="lazy"
                        alt="Appetizers"
                        class="img-cover"
                      />
                    </figure>
                  </a>

                  <div class="card-content">
                    <h3 class="title-4 card-title">
                      <a href="#">MANIS</a>
                    </h3>

                    <a href="..\Makanan\Makanan.php" class="btn-text hover-underline label-2"
                      >Selengkapnya</a
                    >
                  </div>
                </div>
              </li>

              <li>
                <div class="service-card">
                  <a href="#" class="has-before hover:shine">
                    <figure
                      class="card-banner img-holder"
                      style="--width: 285; --height: 336"
                    >
                      <img
                        src="menu-3.jpg"
                        width="285"
                        height="336"
                        loading="lazy"
                        alt="Drinks"
                        class="img-cover"
                      />
                    </figure>
                  </a>

                  <div class="card-content">
                    <h3 class="title-4 card-title">
                      <a href="#">PEDAS</a>
                    </h3>

                    <a href="..\Makanan\Makanan.php" class="btn-text hover-underline label-2"
                      >Selengkapnya</a
                    >
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <!-- Most Populer Menu -->
        <section class="section section-divider white promo">
          <div class="container">
            <div class="card-content">
              <h3 class="title-4 card-title judul">
                <a href="#">Must Try!! <br> Top Kuliner Indonesia Bulan Ini!</a>
              </h3>
            </div>
            <ul class="promo-list has-scrollbar">
              <li class="promo-item">
                <div class="promo-card">
                  <h3 class="h3 card-title">Bajigur</h3>

                  <p class="card-text">
                    Minuman cita rasa manis yang hangat, cocok saat hujan.
                  </p>

                  <img
                    src="https://i.pinimg.com/736x/51/6e/52/516e527f04c4451a9d9fa1dc50736990.jpg"
                    width="300"
                    height="300"
                    loading="lazy"
                    alt="Bajigur"
                    class="w-100 card-banner"
                  />
                </div>
              </li>

              <li class="promo-item">
                <div class="promo-card">
                  <div class="card-icon"></div>

                  <h3 class="h3 card-title">Padeh Ikan Patin</h3>

                  <p class="card-text">
                    Sensasi kuah santan pedas dengan ikan patin segar dan
                    ditambah sedikit jeruk nipis menambah rasa padeh ikan patin
                    semakin nikmat.
                  </p>

                  <img
                    src="https://i.pinimg.com/736x/40/b1/7d/40b17d281830cf2f172479e40f438a24.jpg"
                    width="300"
                    height="300"
                    loading="lazy"
                    alt="Padeh Ikan Patin"
                    class="w-100 card-banner"
                  />
                </div>
              </li>

              <li class="promo-item">
                <div class="promo-card">
                  <div class="card-icon"></div>

                  <h3 class="h3 card-title">Rawon</h3>

                  <p class="card-text">
                    Makanan yang bersal dari surabaya dengan sensasi pedas setan
                    yang luar biasa
                  </p>

                  <img
                    src="https://i.pinimg.com/736x/78/9a/51/789a513fca2341d85319f2f71386e043.jpg"
                    width="300"
                    height="300"
                    loading="lazy"
                    alt="Rawon"
                    class="w-100 card-banner"
                  />
                </div>
              </li>

              <li class="promo-item">
                <div class="promo-card">
                  <div class="card-icon"></div>

                  <h3 class="h3 card-title">Mie Aceh</h3>

                  <p class="card-text">
                    Mie yang kenyal dicampur dengan kecap dan kondimen lain
                    membuat mie ini cocok disantap kapanpun.
                  </p>

                  <img
                    src="https://i.pinimg.com/736x/81/43/09/81430917b2d8c6ca0bc0bfc0f27e9524.jpg"
                    width="300"
                    height="300"
                    loading="lazy"
                    alt="Mie Aceh"
                    class="w-100 card-banner"
                  />
                </div>
              </li>

              <li class="promo-item">
                <div class="promo-card">
                  <div class="card-icon"></div>

                  <h3 class="h3 card-title">Wedang Uwuh</h3>

                  <p class="card-text">
                    Minuman khas jogja yang kaya dengan khasiat, terdiri dari
                    rempah-rempah Jogja membuat minuman ini memiliki cita rasa
                    rumah.
                  </p>

                  <img
                    src="https://i.pinimg.com/736x/62/08/95/62089564a562c34043ae60c56ee51e54.jpg"
                    width="300"
                    height="300"
                    loading="lazy"
                    alt="Wedang Uwuh"
                    class="w-100 card-banner"
                  />
                </div>
              </li>
            </ul>
          </div>
        </section>

        <!-- FESTIVAL -->

        <section class="section event bg-black-10" aria-label="event">
          <div class="container">
            <p class="section-subtitle label-2 text-center">Seru seruan yuk</p>

            <h2 class="section-title headline-1 text-center">Upcoming Event!<br> Festival Kuliner</h2>

            <ul class="grid-list">
              <li>
                <div class="event-card has-before hover:shine">
                  <div
                    class="card-banner img-holder"
                    style="--width: 350; --height: 450"
                  >
                    <img
                      src="https://i.pinimg.com/736x/f8/a0/f4/f8a0f45b6449859e7d28045906f8edad.jpg"
                      width="350"
                      height="450"
                      loading="lazy"
                      alt="festival durian runtuh"
                      class="img-cover"
                    />

                    <time class="publish-date label-2" datetime="2023-12-15"
                      >25/12/2023</time
                    >
                  </div>

                  <div class="card-content">
                    <p class="card-subtitle label-2 text-center">Yogyakarta</p>

                    <h3 class="card-title title-2 text-center">
                      Festival Durian Ambruk
                    </h3>
                  </div>
                </div>
              </li>

              <li>
                <div class="event-card has-before hover:shine">
                  <div
                    class="card-banner img-holder"
                    style="--width: 350; --height: 450"
                  >
                    <img
                      src="https://i.pinimg.com/736x/dd/f7/7f/ddf77f83cea300ecde3ebdeb10a07bd6.jpg"
                      width="350"
                      height="450"
                      loading="lazy"
                      alt="Festival Jajanan Lokal Indonesia"
                      class="img-cover"
                    />

                    <time class="publish-date label-2" datetime="2023-11-31"
                      >31/12/2023</time
                    >
                  </div>

                  <div class="card-content">
                    <p class="card-subtitle label-2 text-center">Makassar</p>

                    <h3 class="card-title title-2 text-center">
                      Festival Jajanan Lokal Indonesia
                    </h3>
                  </div>
                </div>
              </li>

              <li>
                <div class="event-card has-before hover:shine">
                  <div
                    class="card-banner img-holder"
                    style="--width: 350; --height: 450"
                  >
                    <img
                      src="https://i.pinimg.com/736x/c2/1c/d3/c21cd317eaaa84c95cf5151c82289dcb.jpg"
                      width="350"
                      height="450"
                      loading="lazy"
                      alt="Festival Tumpeng Sewu"
                      class="img-cover"
                    />

                    <time class="publish-date label-2" datetime="2024-01-01"
                      >11/01/2024</time
                    >
                  </div>

                  <div class="card-content">
                    <p class="card-subtitle label-2 text-center">Jawa Tengah</p>

                    <h3 class="card-title title-2 text-center">
                      Festival Tumpeng Sewu
                    </h3>
                  </div>
                </div>
              </li>
            </ul>

            <a href="..\Festival\Festival.php" class="btn btn-primary">
              <span class="text text-1">Selengkapnya</span>

              <span class="text text-2" aria-hidden="true">Selengkapnya</span>
            </a>
          </div>
        </section>

        <!-- BOOK A TABLE -->
        <section class="reservation">
          <div class="container">
            <div class="form reservation-form bg-black-10">
            <form action="" method="post" class="form-right" id="reservationForm">
                <h2 class="headline-1 text-center">Pesan Meja Anda</h2>

                <div class="input-wrapper">
                  <input
                    type="text"
                    name="name"
                    placeholder="Nama Anda"
                    autocomplete="off"
                    class="input-field"
                  />

                  <input
                    type="tel"
                    name="phone"
                    placeholder="Nomor telfon"
                    autocomplete="off"
                    class="input-field"
                  />

                  <input
                    type="text"
                    name="resto"
                    placeholder="Nama resto"
                    autocomplete="off"
                    class="input-field"
                  />
                </div>

                <div class="input-wrapper">
                  <div class="icon-wrapper">
                    <ion-icon
                      name="person-outline"
                      aria-hidden="true"
                    ></ion-icon>

                    <select name="orang" class="input-field">
                      <option value="1-person">1 Orang</option>
                      <option value="2-person">2 Orang</option>
                      <option value="3-person">3 Orang</option>
                      <option value="4-person">4 Orang</option>
                      <option value="5-person">5 Orang</option>
                      <option value="6-person">6 Orang</option>
                      <option value="7-person">7 Orang</option>
                    </select>

                    <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                  </div>

                  <div class="icon-wrapper">
                    <ion-icon
                      name="calendar-clear-outline"
                      aria-hidden="true"
                    ></ion-icon>

                    <input
                      type="date"
                      name="reservation-date"
                      class="input-field"
                    />

                    <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                  </div>

                  <div class="icon-wrapper">
                    <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                    <select name="person" class="input-field">
                      <option value="08:00am">08 : 00</option>
                      <option value="09:00am">09 : 00</option>
                      <option value="010:00am">10 : 00</option>
                      <option value="011:00am">11 : 00</option>
                      <option value="012:00am">12 : 00</option>
                      <option value="01:00pm">13 : 00</option>
                      <option value="02:00pm">14 : 00</option>
                      <option value="03:00pm">15 : 00</option>
                      <option value="04:00pm">16 : 00</option>
                      <option value="05:00pm">17 : 00</option>
                      <option value="06:00pm">18 : 00</option>
                      <option value="07:00pm">19 : 00</option>
                      <option value="08:00pm">20 : 00</option>
                      <option value="09:00pm">21 : 00</option>
                      <option value="10:00pm">22 : 00</option>
                    </select>

                    <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                  </div>
                </div>

                <textarea
                  name="pesan"
                  placeholder="Catatan"
                  autocomplete="off"
                  class="input-field"
                ></textarea>

                <button type="submit" class="btn btn-secondary" id="submitButton">
    <span class="text text-1">Book A Table</span>
    <span class="text text-2" aria-hidden="true">Book A Table</span>
  </button>

      </form>
      
    </div>
    <h2 class="headline-3 text-center" id="statusMessage"></h2>
          </div>
          
        </section>


        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
    <!-- Jika pengguna sudah login, tampilkan data pemesanan -->
    <section class="reservation">
        <div class="container">
            <div class="form reservation-form bg-black-10">
                <div class="container light-style flex-grow-1 container-p-y">
                    <div class="tab-pane fade" id="account-notifications">
                        <div class="card-body pb-2">
                            <div class="form-group">
                            <h4 class="title-4 text-center">Data Pemesanan</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No telp</th>
                                            <th>Nama Resto</th>
                                            <th>Jumlah orang</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Nama_Pelanggan'] . "</td>";
                                            echo "<td>" . $row['Nomor_Telepon'] . "</td>";
                                            echo "<td>" . $row['Nama_Restoran'] . "</td>";
                                            echo "<td>" . $row['Jumlah_Orang'] . "</td>";
                                            echo "<td>" . $row['Tanggal'] . "</td>";
                                            echo "<td>" . $row['Jam'] . "</td>";
                                            echo "<td>" . $row['Catatan'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

        <!-- Back To Top Button-->
        <a
          href="#top"
          class="back-top-btn"
          aria-label="Back to top"
          data-back-top-btn
        >
          <ion-icon name="chevron-up"></ion-icon>
        </a>
      </article>
     
    </main>

    <!-- FOOTER -->
    <section>
      <footer class="footer">
        <div class="footer-top">
          <div class="container">
            <div class="footer-brand">
              <a href="" class="logo">Saloka.</a>

              <p class="footer-text">
              Aplikasi ini bertujuan untuk mempromosikan dan mengenalkan
                pengalaman kuliner lokal yang unik di suatu daerah. Aplikasi
                'Sajian Lokal' akan memberikan platform bagi pengguna untuk
                menemukan, menikmati, dan memahami hidangan dan cita rasa lokal.
                Ini menawarkan berbagai fitur untuk membantu wisatawan
                menemukan, menikmati, dan menghargai budaya makanan lokal.
              </p>

              <ul class="social-list">
                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-twitter"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-pinterest"></ion-icon>
                  </a>
                </li>
              </ul>
            </div>

            <ul class="footer-list">
              <li>
                <p class="footer-list-title">Contact Info</p>
              </li>

              <li>
                <p class="footer-list-item">+62 85864225219</p>
              </li>

              <li>
                <p class="footer-list-item">Saloka@students.uii.ac.id</p>
              </li>

              <li>
                <address class="footer-list-item">
                Gang Mawar, Ngemplak, KAB. SLEMAN, NGEMPLAK, DI YOGYAKARTA, ID 55584
                </address>
              </li>
            </ul>

            
          </div>
        </div>

        <div class="footer-bottom">
          <div class="container">
            <p class="copyright-text">
              &copy; 2023
              <a href="#" class="copyright-link">Saloka.com</a> All Rights
              Reserved.
            </p>
          </div>
        </div>
      </footer>
    </section>

    <!-- link js -->
    <script src="script.js"></script>

    <!-- link ionicon -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
