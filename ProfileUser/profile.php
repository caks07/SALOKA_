<?php
session_start();

// Lakukan koneksi ke database
$servername = "localhost"; // Ganti dengan nama host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "saloka"; // Ganti dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['loggedin'])) {
    // Redirect ke halaman login jika pengguna belum login
    header("Location: ../Login/Login.php");
    exit();
}

// Ambil data pengguna yang sedang login dari database
$id_pengguna = $_SESSION['ID_Pengguna'];
$query = "SELECT Nama, Email, Nomor_Telepon FROM pengguna WHERE ID_Pengguna = $id_pengguna";
$result = $conn->query($query);

// Lakukan pengecekan jika data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row['Nama'];
    $email = $row['Email'];
    $no_telepon = $row['Nomor_Telepon'];
} else {
    // Jika data tidak ditemukan, tindakan yang sesuai (misalnya, menampilkan pesan kesalahan)
}

// Lakukan update data pengguna jika ada perubahan yang diinputkan
$updateMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateSubmit'])) {
    // Ambil data dari form
    $nama_baru = $_POST['newUsername'];
    $email_baru = $_POST['newEmail'];
    $no_telepon_baru = $_POST['newPhoneNumber'];
    $password_lama = $_POST['oldPassword'];
    $password_baru = $_POST['newPassword'];
    $confirm_password_baru = $_POST['confirmNewPassword'];

    // Validasi password (gunakan teknik hash untuk validasi password)
    // Anda harus mengganti ini dengan validasi yang sesuai, berdasarkan kebutuhan aplikasi Anda
    $query_password = "SELECT Password FROM pengguna WHERE ID_Pengguna = $id_pengguna";
    $result_password = $conn->query($query_password);
    $row_password = $result_password->fetch_assoc();
    $hashed_password = $row_password['Password'];

    if (password_verify($password_lama, $hashed_password)) {
        // Jika password lama sesuai, lakukan update data
        $query_update = "UPDATE pengguna SET Nama='$nama_baru', Email='$email_baru', Nomor_Telepon='$no_telepon_baru' WHERE ID_Pengguna=$id_pengguna";

        if ($conn->query($query_update) === TRUE) {
            // Berhasil melakukan update
            $updateMessage = "Data berhasil diperbarui!";
        } else {
            // Gagal melakukan update, tindakan yang sesuai (misalnya, menampilkan pesan kesalahan)
            $updateMessage = "Gagal memperbarui data: " . $conn->error;
        }
    } else {
        // Jika password lama tidak sesuai, tindakan yang sesuai (misalnya, menampilkan pesan kesalahan)
        $updateMessage = "Kata sandi lama tidak valid.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Template</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
    <div class="text-left mt-3">
    <a href="../home/home.php" class="btn btn-primary">Kembali</a>
</div>

        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Profil</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Edit Profil</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifikasi</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Profil -->
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <!-- Gambar Profil -->
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-80" />
                            </div>
                            <hr class="border-light m-0" />
                            <div class="card-body">
                                <!-- Form Profil -->
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $nama; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $email; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $no_telepon; ?>" disabled />
                                </div>
                            </div>
                        </div>

                        <!-- Form untuk mengubah data -->
                        <!-- Form untuk mengubah data -->
<div class="tab-pane fade" id="account-change-password">
    <div class="card-body pb-2">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label class="form-label">Username Baru</label>
                <input type="text" class="form-control" name="newUsername" value="<?php echo $nama; ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Email Baru</label>
                <input type="text" class="form-control" name="newEmail" value="<?php echo $email; ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">No. Telepon Baru</label>
                <input type="text" class="form-control" name="newPhoneNumber" value="<?php echo $no_telepon; ?>" />
            </div>
            <div class="form-group">
                <label class="form-label">Kata Sandi Lama</label>
                <input type="password" class="form-control" name="oldPassword" />
            </div>
            <div class="form-group">
                <label class="form-label">Kata Sandi Baru</label>
                <input type="password" class="form-control" name="newPassword" />
            </div>
            <div class="form-group">
                <label class="form-label">Ulang Kata Sandi Baru</label>
                <input type="password" class="form-control" name="confirmNewPassword" />
            </div>
            <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary" name="updateSubmit">Simpan Perubahan</button>
                &nbsp;
                <button type="button" class="btn btn-default">Batal</button>
            </div>
                <!-- Pesan kesalahan atau konfirmasi -->
    <div>
        <?php echo $updateMessage; ?>
    </div>
        </form>
    </div>
</div>


                        <!-- Notifikasi -->
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>
</html>