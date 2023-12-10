<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Saloka Food</title>
    <meta name="title" content="heaven tim saloka proyek" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preload" as="image" href="home-bg-1.jpeg" />
    <link rel="preload" as="image" href="home-bg-2.jpeg" />
    <link rel="preload" as="image" href="home-bg-3.jpeg" />
</head>
<body>
    <!-- Deskripsi Makanan -->
    <section class="special-dish text-center" aria-labelledby="dish-label">
        <div class="special-dish-banner">
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

            // Mengambil ID makanan dari parameter URL
            if (isset($_GET['id_makanan'])) {
                $idMakanan = $_GET['id_makanan'];

                // Query untuk mengambil data deskripsi makanan berdasarkan ID
                $sql = "SELECT * FROM makanan WHERE ID_Makanan = $idMakanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan informasi detail makanan
                    $row = $result->fetch_assoc();
                    $deskripsiPanjang = $row['Deskripsi_Panjang'];
                    $kisaranHarga = $row['Kisaran_Harga'];
                    $gambarMakanan = $row['Gambar_Makanan'];

                    echo '<img src="' . $gambarMakanan . '" width="940" height="900" loading="lazy" alt="special dish" class="img-cover">';
                    echo '</div>';

                    echo '<div class="special-dish-content bg-black-10">';
                    echo '<div class="container">';
                    echo '<p class="section-subtitle label-2">Deskripsi Makanan</p>';
                    echo '<h2 class="headline-1 section-title">' . $row['Nama_Makanan'] . '</h2>';
                    echo '<p class="section-text">' . $deskripsiPanjang . '</p>';
                    echo '<div class="wrapper">';
                    echo '<p>Harga Berkisar</p>';
                    echo '<span class="span body-1">' . $kisaranHarga . '</span>';
                    echo '</div>';
                    echo '<a href="../Makanan/Makanan.php" class="btn btn-primary">';
                    echo '<span class="text text-1">Kembali ke menu</span>';
                    echo '<span class="text text-2" aria-hidden="true">Kembali ke menu</span>';
                    echo '</a>';
                    echo '</div>';
                } else {
                    echo "Makanan tidak ditemukan";
                }
            } else {
                echo "ID makanan tidak ditemukan";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
