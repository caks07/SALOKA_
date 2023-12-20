
<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container light-style flex-grow-1 container-p-y">
    <div class="text-left mt-3">
    <a href="..\LoginAdmin\index.html" class="btn btn-primary">Kembali</a>
        <h4 class="font-weight-bold py-3 mb-4">
            Admin
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Profile</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#restoran">Restorant</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#makanan">Makanan</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#festival">Festival</a>
                            </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="Admin" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="Admin@gmail.com" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control mb-1" value="123" disabled>
                                </div>
                            </div>
                        </div>
                        
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = ""; // Ganti sesuai dengan password database Anda
$dbname = "saloka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

//tambah data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitRestoran'])) {
    $namaRestoran = $_POST['namaRestoran'];
    $owner = $_POST['owner'];
    $rating = $_POST['rating'];
    $deskripsi = $_POST['deskripsi'];
    $terlaris = $_POST['terlaris'];
    $lokasi = $_POST['lokasi'];
    $maps = $_POST['maps'];
    $gambar = $_POST['gambar'];

    // Query untuk menyimpan data ke dalam tabel restoran
    $sql = "INSERT INTO restoran (Nama_Restoran, Wilayah, Rating_Restoran, Gambar_Restoran, Owner, Maps, Deskripsi, Makanan_Terkenal)
    VALUES ('$namaRestoran', '$lokasi', '$rating', '$gambar', '$owner', '$maps', '$deskripsi', '$terlaris')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}

// Proses Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateRestoran'])) {
    if (isset($_GET['editRestoran'])) {
        $editRestoran = $_GET['editRestoran'];
        $namaRestoran = $_POST['namaRestoran'];
        $owner = $_POST['owner'];
        $rating = $_POST['rating'];
        $deskripsi = $_POST['deskripsi'];
        $terlaris = $_POST['terlaris'];
        $lokasi = $_POST['lokasi'];
        $maps = $_POST['maps'];
        $gambar = $_POST['gambar'];

        // Lakukan proses update data
        $updateSql = "UPDATE restoran SET Nama_Restoran='$namaRestoran', Owner='$owner', Rating_Restoran='$rating', Deskripsi='$deskripsi', Makanan_Terkenal='$terlaris', Wilayah='$lokasi', Maps='$maps', Gambar_Restoran='$gambar' WHERE ID_Restoran=$editRestoran";

        if ($conn->query($updateSql) === TRUE) {
            echo "Data berhasil diupdate.";
        } else {
            echo "Error: " . $updateSql . "<br>" . $conn->error;
        }
    } else {
        echo "Edit ID tidak ditemukan.";
    }
}

//hapus data restoran
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hapusRestoran'])) {
    $idToDelete = $_GET['hapusRestoran'];
    
    // Hapus terlebih dahulu data dari tabel 'pemesanan' yang terkait
    $deletePemesananSql = "DELETE FROM pemesanan WHERE ID_Restoran = $idToDelete";
    
    if ($conn->query($deletePemesananSql) === TRUE) {
        // Jika penghapusan dari tabel 'pemesanan' berhasil, lanjutkan menghapus dari tabel 'restoran'
        $deleteRestoranSql = "DELETE FROM restoran WHERE ID_Restoran = $idToDelete";
        
        if ($conn->query($deleteRestoranSql) === TRUE) {
            echo "Data restoran berhasil dihapus.";
        } else {
            echo "Error menghapus data restoran: " . $conn->error;
        }
    } else {
        echo "Error menghapus data pemesanan: " . $conn->error;
    }
}

?>

<!-- Formulir -->
<div class="tab-pane fade" id="restoran">
    <div class="card-body pb-2">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . (isset($_GET['editRestoran']) ? '?editRestoran=' . $_GET['editRestoran'] : '')); ?>">
            <div class="form-group">
                <label class="form-label">Nama Restorant</label>
                <input type="text" class="form-control" name="namaRestoran">
            </div>
            <div class="form-group">
                                    <label class="form-label">Owner</label>
                                    <input type="text" class="form-control" name="owner">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rating</label>
                                    <input type="text" class="form-control" name="rating">

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Terlaris</label>
                                    <input type="text" class="form-control" name="terlaris">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Maps</label>
                                    <input type="text" class="form-control" name="maps">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Gambar</label>
                                    <input type="text" class="form-control" name="gambar">
                                </div>
            <!-- Formulir lainnya untuk input yang lain -->

            <div class="form-group">
    <button type="submit" class="btn btn-outline-primary" name="<?php echo isset($_GET['editRestoran']) ? 'updateRestoran' : 'submitRestoran'; ?>">
        <?php echo isset($_GET['editRestoran']) ? 'Update' : 'Tambah'; ?> Restoran
    </button>
    <?php
    // Tampilkan tombol tambah jika tidak dalam mode edit
    if (isset($_GET['editRestoran'])) {
        echo '<a href="Admin.php" class="btn btn-outline-secondary">Kembali</a>';
    }
    ?>
</div></form>

        <!-- Tampilan data -->
        <div class="form-group table-responsive" >
            <table class="table">
            <thead>
            <tr>
                <th class="d-block d-md-table-cell">ID</th>
                <th class="d-block d-md-table-cell">Nama</th>
                <th class="d-block d-md-table-cell">Rating</th>
                <th class="d-block d-md-table-cell">Owner</th>
                <th class="d-block d-md-table-cell">Deskripsi</th>
                <th class="d-block d-md-table-cell">Terlaris</th>
                <th class="d-block d-md-table-cell">Lokasi</th>
                <th class="d-block d-md-table-cell">Maps</th>
                <th class="d-block d-md-table-cell">Gambar</th>
                <th class="d-block d-md-table-cell">Edit</th>
                <th class="d-block d-md-table-cell">Hapus</th>
            </tr>
        </thead>
                <tbody>
                    
                    <?php
                    // Ambil data dari tabel restoran
                    $sql = "SELECT * FROM restoran";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID_Restoran'] . "</td>";
                            echo "<td>" . $row['Nama_Restoran'] . "</td>";
                            echo "<td>" . $row['Rating_Restoran'] . "</td>";
                            echo "<td>" . $row['Owner'] . "</td>";
                            echo "<td>" . $row['Deskripsi'] . "</td>";
                            echo "<td>" . $row['Makanan_Terkenal'] . "</td>";
                            echo "<td>" . $row['Wilayah'] . "</td>";
                            echo "<td>" . $row['Maps'] . "</td>";
                            echo "<td>" . $row['Gambar_Restoran'] . "</td>";
                            // Tambahkan baris lain sesuai dengan kolom tabel
                            echo "<td><a href='?editRestoran=" . $row['ID_Restoran'] . "'>EDIT</a></td>";
                            echo "<td><a href='?hapusRestoran=" . $row['ID_Restoran'] . "'>HAPUS</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--   -->
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti sesuai dengan password database Anda
$dbname = "saloka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

//tambah makanan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitMakanan'])) {
    $namaMakanan = $_POST['namaMakanan'];
    $lokasi = $_POST['lokasi'];
    $deskripsiSingkat = $_POST['deskripsiSingkat'];
    $deskripsiPanjang = $_POST['deskripsiPanjang'];
    $kisaranHarga = $_POST['kisaranHarga'];
    $gambar = $_POST['gambar'];
    $kategoriRasa = $_POST['kategoriRasa'];

    $sql = "INSERT INTO makanan (Nama_Makanan, Wilayah, Deskripsi_Singkat, Deskripsi_Panjang, Kisaran_Harga, Gambar_Makanan, Kategori_Rasa)
    VALUES ('$namaMakanan', '$lokasi', '$deskripsiSingkat', '$deskripsiPanjang', '$kisaranHarga', '$gambar', '$kategoriRasa')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}

//hapus data makanan
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hapusMakanan'])) {
    $idToDelete = $_GET['hapusMakanan'];

    $deleteSql = "DELETE FROM makanan WHERE ID_Makanan = $idToDelete";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Data makanan berhasil dihapus.";
    } else {
        echo "Error menghapus data makanan: " . $conn->error;
    }
}

// Proses Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateMakanan'])) {
    if (isset($_GET['editMakanan'])) {
        $editMakanan = $_GET['editMakanan'];
        $namaMakanan = $_POST['namaMakanan'];
        $lokasi = $_POST['lokasi'];
        $deskripsiSingkat = $_POST['deskripsiSingkat'];
        $deskripsiPanjang = $_POST['deskripsiPanjang'];
        $kisaranHarga = $_POST['kisaranHarga'];
        $gambar = $_POST['gambar'];
        $kategoriRasa = $_POST['kategoriRasa'];

        // Lakukan proses update data
        $updateSql = "UPDATE makanan SET Nama_Makanan='$namaMakanan', Wilayah='$lokasi', Deskripsi_Singkat='$deskripsiSingkat', Deskripsi_Panjang='$deskripsiPanjang', Kisaran_Harga='$kisaranHarga', Gambar_Makanan='$gambar', Kategori_Rasas='$kategoriRasa' WHERE ID_Makanan=$editMakanan";

        if ($conn->query($updateSql) === TRUE) {
            echo "Data berhasil diupdate.";
        } else {
            echo "Error: " . $updateSql . "<br>" . $conn->error;
        }
    } else {
        echo "Edit ID tidak ditemukan.";
    }
}

?>
<div class="tab-pane fade" id="makanan">
    <div class="card-body pb-2">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . (isset($_GET['editMakanan']) ? '?editMakanan=' . $_GET['editMakanan'] : ''); ?>">
            <div class="form-group">
                <label class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" name="namaMakanan">
            </div>
            <div class="form-group">
                                    <label class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Deskripsi Singkat</label>
                                    <input type="text" class="form-control" name="deskripsiSingkat">

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Deskripsi Panjang</label>
                                    <input type="text" class="form-control" name="deskripsiPanjang">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kisaran Harga</label>
                                    <input type="text" class="form-control" name="kisaranHarga">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Gambar</label>
                                    <input type="text" class="form-control" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kategori Rasa</label>
                                    <select class="custom-select" name="kategoriRasa">
                                        <option>Asin</option>
                                        <option>Manis</option>
                                        <option>Pedas</option>
                                    </select>
                                    </div>
            <!-- Formulir lainnya untuk input yang lain -->

            <div class="form-group">
            <button type="submit" class="btn btn-outline-primary" name="<?php echo isset($_GET['editMakanan']) ? 'updateMakanan' : 'submitMakanan'; ?>">
                    <?php echo isset($_GET['editMakanan']) ? 'Update' : 'Tambah'; ?>
                </button>
                <?php
                // Tampilkan tombol Kembali jika dalam mode edit
                if (isset($_GET['editMakanan'])) {
                    echo '<a href="Admin.php" class="btn btn-outline-secondary">Kembali</a>';
                }
                ?>
</div></form>

        <!-- Tampilan data -->
        <div class="form-group table-responsive" >
            <table class="table">
            <thead>
            <tr>
                <th class="d-block d-md-table-cell">ID</th>
                <th class="d-block d-md-table-cell">Nama</th>
                <th class="d-block d-md-table-cell">Deskripsi Singkat</th>
                <th class="d-block d-md-table-cell">Deskripsi Panjang</th>
                <th class="d-block d-md-table-cell">Lokasi</th>
                <th class="d-block d-md-table-cell">Rasa</th>
                <th class="d-block d-md-table-cell">Kisaran Harga</th>
                <th class="d-block d-md-table-cell">Gambar</th>
                <th class="d-block d-md-table-cell">Edit</th>
                <th class="d-block d-md-table-cell">Hapus</th>
            </tr>
        </thead>
                <tbody>
                <?php
                    // Ambil data dari tabel makanan
                    $sql = "SELECT * FROM makanan";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID_Makanan'] . "</td>";
                            echo "<td>" . $row['Nama_Makanan'] . "</td>";
                            echo "<td>" . $row['Deskripsi_Singkat'] . "</td>";
                            echo "<td>" . $row['Deskripsi_Panjang'] . "</td>";
                            echo "<td>" . $row['Wilayah'] . "</td>";
                            echo "<td>" . $row['Kategori_Rasa'] . "</td>";
                            echo "<td>" . $row['Kisaran_Harga'] . "</td>";
                            echo "<td>" . $row['Gambar_Makanan'] . "</td>";
                            // Tambahkan baris lain sesuai dengan kolom tabel
                            echo "<td><a href='?editMakanan=" . $row['ID_Makanan'] . "'>EDIT</a></td>";
                            echo "<td><a href='?hapusMakanan=" . $row['ID_Makanan'] . "'>HAPUS</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
                </table>
                </div>
                            
                            
                                
                        </div>
                    </div>
                    <?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti sesuai dengan password database Anda
$dbname = "saloka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

//tambah festival
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitFestival'])) {
    $namaFestival = $_POST['namaFestival'];
    $deskripsiFestival = $_POST['deskripsiFestival'];
    $tanggalFestival = $_POST['tanggalFestival'];
    $gambarFestival = $_POST['gambarFestival'];
    $tiketFestival = $_POST['tiketFestival'];
    $lokasiFestival = $_POST['lokasiFestival'];

    $sql = "INSERT INTO festival (nama_festival, deskripsi, tanggal_input, gambar, tiket, lokasi_festival)
    VALUES ('$namaFestival', '$deskripsiFestival', '$tanggalFestival', '$gambarFestival', '$tiketFestival', '$lokasiFestival')";

    if ($conn->query($sql) === TRUE) {
        echo "Data festival berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}

//hapus data festival
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hapusFestival'])) {
    $idToDelete = $_GET['hapusFestival'];

    $deleteSql = "DELETE FROM festival WHERE id = $idToDelete";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Data festival berhasil dihapus.";
    } else {
        echo "Error menghapus data festival: " . $conn->error;
    }
}



// Proses Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateFestival'])) {
    if (isset($_GET['editFestival'])) {
        $editFestival = $_GET['editFestival'];
        $namaFestival = $_POST['namaFestival'];
        $deskripsiFestival = $_POST['deskripsiFestival'];
        $tanggalFestival = $_POST['tanggalFestival'];
        $gambarFestival = $_POST['gambarFestival'];
        $tiketFestival = $_POST['tiketFestival'];
        $lokasiFestival = $_POST['lokasiFestival'];

        // Lakukan proses update data
        $updateSql = "UPDATE festival SET nama_festival='$namaFestival', deskripsi='$deskripsiFestival', tanggal_input='$tanggalFestival', gambar='$gambarFestival', tiket='$tiketFestival', lokasi_festival='$lokasiFestival' WHERE id=$editFestival";

        if ($conn->query($updateSql) === TRUE) {
            echo "Data festival berhasil diupdate.";
        } else {
            echo "Error: " . $updateSql . "<br>" . $conn->error;
        }
    } else {
        echo "Edit ID tidak ditemukan.";
    }
}

?>
<div class="tab-pane fade" id="festival">
    <div class="card-body pb-2">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . (isset($_GET['editFestival']) ? '?editFestival=' . $_GET['editFestival'] : ''); ?>">
            <div class="form-group">
                <label class="form-label">Nama Festival</label>
                <input type="text" class="form-control" name="namaFestival">
            </div>
            <div class="form-group">
                                    <label class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsiFestival">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggalFestival">

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Gambar</label>
                                    <input type="text" class="form-control" name="gambarFestival">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Link Tiket</label>
                                    <input type="text" class="form-control" name="tiketFestival">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasiFestival">
                                </div>
            <!-- Formulir lainnya untuk input yang lain -->

            <div class="form-group">
            <button type="submit" class="btn btn-outline-primary" name="<?php echo isset($_GET['editFestival']) ? 'updateFestival' : 'submitFestival'; ?>">
                    <?php echo isset($_GET['editFestival']) ? 'Update' : 'Tambah'; ?>
                </button>
                <?php
                // Tampilkan tombol Kembali jika dalam mode edit
                if (isset($_GET['editFestival'])) {
                    echo '<a href="Admin.php" class="btn btn-outline-secondary">Kembali</a>';
                }
                ?>
</div></form>

        <!-- Tampilan data -->
        <div class="form-group table-responsive" >
            <table class="table">
            <thead>
            <tr>
                <th class="d-block d-md-table-cell">ID</th>
                <th class="d-block d-md-table-cell">Nama</th>
                <th class="d-block d-md-table-cell">Deskripsi</th>
                <th class="d-block d-md-table-cell">Tanggal</th>
                <th class="d-block d-md-table-cell">Gambar</th>
                <th class="d-block d-md-table-cell">Tiket</th>
                <th class="d-block d-md-table-cell">Lokasi</th>
                <th class="d-block d-md-table-cell">Edit</th>
                <th class="d-block d-md-table-cell">Hapus</th>
            </tr>
        </thead>
                <tbody>
                <?php
                    // Ambil data dari tabel makanan
                    $sql = "SELECT * FROM festival";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama_festival'] . "</td>";
                            echo "<td>" . $row['deskripsi'] . "</td>";
                            echo "<td>" . $row['tanggal_input'] . "</td>";
                            echo "<td>" . $row['gambar'] . "</td>";
                            echo "<td>" . $row['tiket'] . "</td>";
                            echo "<td>" . $row['lokasi_festival'] . "</td>";
                            // Tambahkan baris lain sesuai dengan kolom tabel
                            echo "<td><a href='?editFestival=" . $row['id'] . "'>EDIT</a></td>";
                            echo "<td><a href='?hapusFestival=" . $row['id'] . "'>HAPUS</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
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
    </div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>