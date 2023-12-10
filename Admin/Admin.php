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
                            href="#account-change-password">Restorant</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Makanan</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Pemesanan</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Data pengguna</a>
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
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




if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hapus'])) {
    $idToDelete = $_GET['hapus'];

    // Query untuk menghapus data dari tabel restoran berdasarkan ID
    $deleteSql = "DELETE FROM restoran WHERE ID_Restoran = $idToDelete";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $deleteSql . "<br>" . $conn->error;
    }
}
// Proses Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    if (isset($_GET['edit'])) {
        $editID = $_GET['edit'];
        $namaRestoran = $_POST['namaRestoran'];
        $owner = $_POST['owner'];
        $rating = $_POST['rating'];
        $deskripsi = $_POST['deskripsi'];
        $terlaris = $_POST['terlaris'];
        $lokasi = $_POST['lokasi'];
        $maps = $_POST['maps'];
        $gambar = $_POST['gambar'];

        // Lakukan proses update data
        $updateSql = "UPDATE restoran SET Nama_Restoran='$namaRestoran', Owner='$owner', Rating_Restoran='$rating', Deskripsi='$deskripsi', Makanan_Terkenal='$terlaris', Wilayah='$lokasi', Maps='$maps', Gambar_Restoran='$gambar' WHERE ID_Restoran=$editID";

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

<!-- Formulir -->
<div class="tab-pane fade" id="account-change-password">
    <div class="card-body pb-2">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . (isset($_GET['edit']) ? '?edit=' . $_GET['edit'] : ''); ?>">
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
    <button type="submit" class="btn btn-outline-primary" name="<?php echo isset($_GET['edit']) ? 'update' : 'submit'; ?>">
        <?php echo isset($_GET['edit']) ? 'Update' : 'Tambah'; ?>
    </button>
    <?php
    // Tampilkan tombol tambah jika tidak dalam mode edit
    if (isset($_GET['edit'])) {
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
                            echo "<td><a href='?edit=" . $row['ID_Restoran'] . "'>EDIT</a></td>";
                            echo "<td><a href='?hapus=" . $row['ID_Restoran'] . "'>HAPUS</a></td>";
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
<div class="tab-pane fade" id="account-change-password">
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
                                    <input type="text" class="form-control" name="lokasi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Maps</label>
                                    <input type="text" class="form-control" name="maps">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kategori Rasa</label>
                                    <select class="custom-select">
                                        <option>Pedas</option>
                                        <option selected>Asin</option>
                                        <option>Manis</option>
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

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>