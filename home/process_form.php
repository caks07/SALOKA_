<?php
include 'config.php';
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $namaPelanggan = $_POST['name'];
    $nomorTelepon = $_POST['phone'];
    $namaResto = $_POST['resto']; // Ini merupakan nama restoran yang akan dicek keberadaannya di tabel restoran
    $jumlahOrang = $_POST['orang'];
    $tanggal = $_POST['reservation-date'];
    $jam = $_POST['person'];
    $catatan = $_POST['pesan'];

    // Lakukan validasi atau verifikasi di sini (misalnya, validasi input)

    if (
        empty($namaPelanggan) ||
        empty($nomorTelepon) ||
        empty($namaResto) ||
        empty($jumlahOrang) ||
        empty($tanggal) ||
        empty($jam) ||
        empty($catatan)
    ) {
        echo json_encode(array("message" => "Harap lengkapi semua form sebelum mengirimkan formulir."));
    } else {
        // Cek apakah nama restoran ada di tabel restoran
        $queryCheckResto = "SELECT ID_Restoran FROM restoran WHERE Nama_Restoran = '$namaResto'";
        $result = mysqli_query($conn, $queryCheckResto);

        if (mysqli_num_rows($result) > 0) {
            // Jika restoran ada, masukkan data pemesanan
            $row = mysqli_fetch_assoc($result);
            $restoID = $row['ID_Restoran'];

            // Dapatkan ID pengguna yang sedang login dari session
            $userID = isset($_SESSION['ID_Pengguna']) ? $_SESSION['ID_Pengguna'] : null;

            $queryInsertPemesanan = "INSERT INTO pemesanan (Nama_Pelanggan, Nomor_Telepon, ID_Restoran, Tanggal, Jam, Catatan, Jumlah_Orang, ID_Pengguna) VALUES ('$namaPelanggan', '$nomorTelepon', '$restoID', '$tanggal', '$jam', '$catatan', '$jumlahOrang', '$userID')";
            
            // Eksekusi query untuk menyimpan data ke dalam tabel pemesanan
            if (mysqli_query($conn, $queryInsertPemesanan)) {
                echo json_encode(array("message" => "PEMESANAN BERHASIL"));
            } else {
                echo json_encode(array("message" => "PEMESANAN GAGAL"));
            }
        } else {
            // Jika restoran tidak ada, tampilkan pesan peringatan
            echo json_encode(array("message" => "Restoran belum terdaftar"));
        }
    }
}
?>
