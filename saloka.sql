-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2023 pada 09.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saloka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `festival`
--

CREATE TABLE `festival` (
  `id` int(11) NOT NULL,
  `nama_festival` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_input` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tiket` varchar(255) DEFAULT NULL,
  `lokasi_festival` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `festival`
--

INSERT INTO `festival` (`id`, `nama_festival`, `deskripsi`, `tanggal_input`, `gambar`, `tiket`, `lokasi_festival`) VALUES
(8, 'Bali Interfood Festival', 'Bali memang menjadi salah satu tempat yang indah untuk berlibur, dan selain tekenal dengan wisata nya yang indah di Bali juga memiliki kuliner-kuliner lezat. Makanya permerintah mengadakan festival kuliner ini 2 tahun sekali pada bulan september di Nusa Dua Convention Center, Bali. Di Bali Interfood Festival ini kalian bisa menemukan makanan tradisional Bali, pameran kopi, bali wine, dan ada sekitar 120 perusahaan berpartisipasi untuk mmeriahkan acara Bali Interfood Festival. Jika kamu ingin mencoba berbagai kuliner tradisional bali, da melihat berbagai jenis kopi di Bali, kalian bisa datang keacara ini pada tanggal 3-5 September dikawasan Nusa dua.', '2024-01-20', 'https://i.pinimg.com/736x/f1/0b/e5/f10be50a12e470fe525056e0eeb60921.jpg', 'https://www.tiket.com/', 'Bali'),
(9, 'Festival Durian Ki Raja', ' Pihaknya pun ingin menggaungkan potensi durian Ki Raja ini melalui event festival yang untuk pertama kali yang digelar di Desa Madenan.  Selain durian Ki Raja, ada beberapa buah lokal lainnya seperti manggis, alpukat, mangga dan kopi yang akan dipamerkan dalam festival tersebut.    Artikel ini telah tayang di Tribun-Bali.com dengan judul Festival Durian Ki Raja Digelar di Desa Madenan Buleleng, Pengunjung Bisa Santap Durian Sepuasnya', '2023-12-30', 'https://i.pinimg.com/736x/f8/a0/f4/f8a0f45b6449859e7d28045906f8edad.jpg', 'https://www.tiket.com/', 'Jogja'),
(10, 'Festival Jajanan Kekinian', 'Fetival yang satu ini memang masih baru diadakan, meskipun baru namun banyak sekali peminatnya. acara ini diadakan karena akhir-akhir ini banyak anak muda yang kreatif membuat kuliner kekinian, dan membuka usaha sendiri. Terdapat sekitar 100 stan lebih untuk memeriahkan acara ini diantaranya ada, kue cubit, churros, ice cream, pancake, boba milk tea, samyang, ayam geprek, pudding, mie pedas, kopi, thaitea, dan masih banyak kuliner kekinian yang bisa kalian temukan diacara ini. Nah jika ingin mencoba berbagai kuliner kekinian kalian bisa datang keacara ini tanggal 23-37 september di Jogja Expo Center, Bantul. acara ini biasanya diadakan setiap tahun.', '2023-12-23', 'https://i.pinimg.com/736x/28/80/8a/28808a81ca27a887aa7edd0231a3ad6d.jpg', 'https://www.tiket.com/', 'Jogja'),
(11, 'Festival Sate dan Soto Nusantara', 'Kamu pencinta sate dan soto maka wajib banget datang ke Festival ini, biasanya acara ini diadakan tanggal 5-6 september, dan biasanya di adakan di Museum Adityawarman, Padang. Di festival ini kalian bisa menikmati berbagai sate, dan soto nusantara yang bisa kamu cicipi. ada sekitar 50 stan bisa kalian temukan disini.', '2023-12-25', 'https://i.pinimg.com/736x/f5/fa/15/f5fa155d403024f4d0b6c79784d9503a.jpg', 'https://www.tiket.com/', 'Sumatra Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `ID_Makanan` int(11) NOT NULL,
  `Nama_Makanan` varchar(255) DEFAULT NULL,
  `Deskripsi_Singkat` text DEFAULT NULL,
  `Deskripsi_Panjang` text DEFAULT NULL,
  `Kisaran_Harga` varchar(50) DEFAULT NULL,
  `Kategori_Rasa` varchar(50) DEFAULT NULL,
  `Wilayah` varchar(100) DEFAULT NULL,
  `Gambar_Makanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`ID_Makanan`, `Nama_Makanan`, `Deskripsi_Singkat`, `Deskripsi_Panjang`, `Kisaran_Harga`, `Kategori_Rasa`, `Wilayah`, `Gambar_Makanan`) VALUES
(9, 'Ayam Cincane', 'Ayam cincane adalah ayam kampung yang diolah dengan cara dilumuri bumbu rempah-rempah lalu dibakar hingga matang', 'Ayam cincane adalah ayam kampung yang diolah dengan cara dilumuri bumbu rempah-rempah lalu dibakar hingga matang. Tampilannya menarik karena berkat bumbu rempah, daging ayam jadi warna merah. Rasanya menggoyang lidah. Gurih meresap sampai daging ayam', 'Rp. 20.000', 'Pedas', 'Samarinda', 'https://i.pinimg.com/736x/97/b2/76/97b2761afca1999ec9d0e8792d3fb8dd.jpg'),
(10, 'Babongko', 'Kuliner sejenis kue basah ini biasanya dapat ditemukan di daerah Kalimantan Selatan dan Timur, yaitu di daerah Suku Banjar serta Suku Kutai berada', 'Salah satu panganan atau makanan khas daerah Provinsi Kalimantan Selatan adalah Babongko. Kuliner sejenis kue basah ini biasanya dapat ditemukan di daerah Kalimantan Selatan dan Timur, yaitu di daerah Suku Banjar serta Suku Kutai berada', 'Rp. 2.500', 'Manis', 'Samarinda', 'https://i.pinimg.com/736x/6a/6d/3d/6a6d3d763d773dedf050d1efc17fd957.jpg'),
(11, 'Amplang', 'Amplang adalah sebuah makanan ringan tradisional yang terbuat dari ikan yang disajikan di Samarinda, Indonesia dan kemudian terkenal di Kalimantan Timur, Kalimantan Selatan, Kalimantan Utara dan pesisir timur Sabah, Malaysia', 'Amplang adalah sebuah makanan ringan tradisional yang terbuat dari ikan yang disajikan di Samarinda, Indonesia dan kemudian terkenal di Kalimantan Timur, Kalimantan Selatan, Kalimantan Utara dan pesisir timur Sabah, Malaysia. Amplang terbuat dari ikan tenggiri, yang dicampur dengan tepung kanji dan bahan-bahan lainnya, dan kemudian digoreng', 'Rp. 5000', 'Asin', 'Samarinda', 'https://i.pinimg.com/736x/29/68/89/296889d8c38ac0c017b654beb53cc743.jpg'),
(12, 'Kue Bingka Kentang', 'Bingka adalah kue yang menjadi ciri khas Suku Banjar, Kalimantan Selatan', 'Bingka adalah kue yang menjadi ciri khas Suku Banjar, Kalimantan Selatan.  Bingka memiliki citarasa yang manis, legit dan lembut. Bingka merupakan salah satu kue yang digunakan dalam tradisi suku Banjar untuk menyajikan 41 jenis kue untuk acara-acara istimewa seperti pernikahan ataupun selamatan. Meskipun dapat ditemukan sepanjang tahun, bingka menjadi primadona pada bulan Ramadan karena dianggap cocok menjadi hidangan untuk berbuka puasa', 'Rp. 15.000', 'Manis', 'Samarinda', 'https://i.pinimg.com/736x/e8/5b/49/e85b499dde03a071a4eabbba6213f898.jpg'),
(13, 'Cenil', 'Cenil  atau Cetil  adalah penganan yang dibuat dari adonan tepung kanji dan gula pasir', 'Cenil  atau Cetil  adalah penganan yang dibuat dari adonan tepung kanji dan gula pasir, diberi pewarna, dibentuk menjadi bulatan-bulatan kecil, dimakan dengan kelapa parut.  Cenil merupakan penganan tradisional khas suku Jawa yang berasal dari Kabupaten Pacitan, Jawa Timur. Penganan ini juga dapat dijumpai di pasar tradisional yang ada di Jawa Tengah dan Daerah Istimewa Yogyakarta, dikenal dengan nama \"cetil\". Biasanya di jual bersama dengan klepon, kicak, getuk, ciwel, cantel, pertolo, dan tepo. Pada tahun 1990-an, cenil hanya di jual di pasar tradisional yang buka hanya pada hari pasaran saja. Cenil juga menjadi ikon suatu pasar di Kabupaten Tulungagung', 'Rp. 7.000', 'Manis', 'jogja', 'https://i.pinimg.com/736x/62/bb/6f/62bb6f01f4ff741530aad533032bd99b.jpg'),
(14, 'Sego Abang Jirak', 'Sego Abang Jirak yang terletak di samping Jembatan Jirak', 'Sego Abang Jirak yang terletak di samping Jembatan Jirak, Kecamatan Semanu, Kabupaten Gunung Kidul, DI Yogyakarta, menyajikan nasi merah sebagai menu khas utama. Sego abang atau nasi merah merupakan hasil produk pertanian di ladang tadah hujan. Di wilayah Gunung Kidul dengan curah hujan rendah dan jenis tanah berbatu, hanya padi tadah hujan yang sanggup tumbuh subur. Sebagian dari jenis padi tadah hujan tersebut menyajikan nasi berwarna merah dengan cita rasa unik, yaitu tidak lembek dan gurih', 'Rp. 40.000', 'Asin', 'jogja', 'https://i.pinimg.com/736x/8d/90/52/8d90529b5eddb5eff4ecf545f6ea092f.jpg'),
(15, 'Gudeg', 'Gudeg adalah hidangan khas Provinsi Daerah Istimewa Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan', 'Gudeg adalah hidangan khas Provinsi Daerah Istimewa Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan. Perlu waktu berjam-jam untuk membuat hidangan ini. Warna cokelat biasanya dihasilkan oleh daun jati yang dimasak bersamaan. Gudeg biasanya dimakan dengan nasi dan disajikan dengan kuah santan kental (areh), ayam kampung, telur, tempe, tahu, dan sambal goreng krecek', 'Rp. 7.500', 'Manis', 'jogja', 'https://i.pinimg.com/736x/bc/d6/1d/bcd61d31bde9f7616ae97a467c1eb734.jpg'),
(16, 'Yangko', 'Konon yangko merupakan makanan raja-raja atau priayi', 'Konon yangko merupakan makanan raja-raja atau priayi. Tak semua rakyat biasa bisa menikmati yangko. Ada pula cerita soal yangko yang menjadi makanan Pangeran Diponegoro saat bergerilya karena yangko dapat bertahan lama dan tidak cepat basi', 'Rp. 23.500', 'Manis', 'jogja', 'https://i.pinimg.com/736x/59/70/2b/59702bc04fe86f6a42952ca797e03981.jpg'),
(17, 'Sate Payau', 'SATE payau merupakan salah satu makanan terkenal dari Kalimantan Timur', 'SATE payau merupakan salah satu makanan terkenal dari Kalimantan Timur. Kalau kamu mengunjungi provinsi beribu kota Samarinda ini, sate payau tak biasa ditemukan di sembarang tempat dan setiap waktu. Di dunia kuliner, sate merupakan kuliner Indonesia yang banyak dikenal para food traveller dari negara lain. Tak hanya sebagai menu asli nusantara, sate atau satai bahkan diakui sebagai salah satu makanan terenak di dunia', 'Rp. 15.000', 'Manis', 'Samarinda', 'https://i.pinimg.com/736x/37/1c/6f/371c6f21a8bfc31202cb71ecb4f8474e.jpg'),
(18, 'Nasi Bekepor', 'Nasi Bekepor merupakan salah satu hidangan khas Kalimantan Timur. Hidangannya serupa nasi liwet karena proses memasaknya sama-sama dilakukan di atas arang', 'Nasi Bekepor merupakan salah satu hidangan khas Kalimantan Timur. Hidangannya serupa nasi liwet karena proses memasaknya sama-sama dilakukan di atas arang. Untuk membuat masakan ini, cukup mencampurkan nasi setengah matang dengan daun kemangi, cabai, perasan jeruk nipis, minyak sayur, dan potongan ikan asin dalam sebuah kendi atau kuali besar. Karena dimasak dengan kayu bakar atau arang, aroma masakan ini sungguh menggoda dan khas. Sepintas, nasi bekepor mirip dengan nasi uduk, tetapi dimasak tanpa santan. Dari segi rasa pun sebenarnya berbeda sebab pada nasi bekepor sudah dicampur dengan ikan dan rempah-rempah. Rasanya semakin nikmat ketika nasi bekepor dihidangankan langsung dari kendi', 'Rp. 30.000', 'Asin', 'Samarinda', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `ID_Menu` int(11) NOT NULL,
  `ID_Restoran` int(11) DEFAULT NULL,
  `Nama_Menu` varchar(255) DEFAULT NULL,
  `Gambar_Menu` varchar(255) DEFAULT NULL,
  `Deskripsi_Menu` text DEFAULT NULL,
  `Harga_Menu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_Pemesanan` int(11) NOT NULL,
  `Nama_Pelanggan` varchar(100) DEFAULT NULL,
  `ID_Restoran` int(11) DEFAULT NULL,
  `Nomor_Telepon` varchar(20) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Jam` time DEFAULT NULL,
  `Catatan` text DEFAULT NULL,
  `Jumlah_Orang` int(11) DEFAULT NULL,
  `ID_Pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Nomor_Telepon` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ID_Pengguna`, `Nama`, `Nomor_Telepon`, `Email`, `Password`) VALUES
(1, '12345', '1', 'asssd', '$2y$10$bYno.08oGQMbkaDk39epneB4yDhJQtmy6aNyMeuKPz8Ikm2CjxL.2'),
(2, 'a', 'a', 'a', '$2y$10$x9v7IwB529qh4YiLmZUYVuXjgnu0QIB8qULtwp.z0LETAWA7HPuL2'),
(3, 'a', 'a', 'b', '$2y$10$Cbs8/SsvMg06CdgRI7pre.GECarSn96EbvaVAkdJ7KAZk1ckKTEjK'),
(4, 'arga', '085866788', 'arga@uii.ac.id', '$2y$10$oaG4JkQY3CaDKh9J9iFss.vWU6HKFwr5dnuLeN1We0467EaRsENCS'),
(5, 'cfcf', 'cfc', 'dcf', '$2y$10$OcKDL6k5K20/84A76K9fP.4bc4D9oT03CZkaLnHfUGc9DKM4Sji66'),
(6, 'cfcf', 'cfc', 'dcf', '$2y$10$5ZNQ.W8wz2LoE79/T5/GDOF.9JFDuFDRnmUBtr8srONZFHeiDT4IC'),
(8, 'saloka', '085777', 'saloka@uii.ac.id', '$2y$10$jz3QHOSOLqZY3RFjqkuROeUWKlFdfeeDae18IKQUe/uoY6Sq5bCTC'),
(9, 'raja', '00', 'raja', '$2y$10$fyiTrF0DA8bSvV0FZkQ9a.3nh876BSLPkzZ/J0K.qRVcYi2eh.Hfy'),
(11, 'Radyan', '0821111111', 'radyan@gmail.com', '$2y$10$c1y6aZX4B2jDmSXxyp.GJetiF1i0MqNuXJUHxHABfb/ZEbhdnxY2i'),
(12, 'raka', '09876', 'raka', '$2y$10$PSHC2PBCmUbjkOBHcZQJkeYKvMJqurIa.4pqK.W0iX0FGuvgEG3ra'),
(14, '123', '123', '123', '$2y$10$OX6xWPhRv4rBhiqL8dO/AezxwMcmyAkBBMyyTpHsNlkNTiPF2bEWS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `ID_Restoran` int(11) NOT NULL,
  `Nama_Restoran` varchar(255) DEFAULT NULL,
  `Wilayah` varchar(100) DEFAULT NULL,
  `Rating_Restoran` decimal(3,2) DEFAULT NULL,
  `Gambar_Restoran` varchar(255) DEFAULT NULL,
  `Owner` varchar(255) DEFAULT NULL,
  `Maps` varchar(255) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Makanan_Terkenal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`ID_Restoran`, `Nama_Restoran`, `Wilayah`, `Rating_Restoran`, `Gambar_Restoran`, `Owner`, `Maps`, `Deskripsi`, `Makanan_Terkenal`) VALUES
(27, 'Gudeg Yu Jum', 'Jogja', 4.50, 'https://i.pinimg.com/736x/6c/6c/4f/6c6c4fcfc65e86beee6273506f5039eb.jpg', 'Yu Djum', 'https://maps.app.goo.gl/KnAS6q1dyGj64Y7o7', 'Berdiri sejak tahun 1950, Gudeg Yu Djum telah menjadi ikon kuliner khas Daerah Istimewa Yogyakarta / Jogja. Rasa khas gudegnya berasal dari bahan-bahan pilihan dan bermutu yang telah melalui proses masak secara tradisional berdasarkan resep asli yang dipertahankan hingga saat ini.', 'Gudeg'),
(28, 'Warung sate kere yu rebi', 'Solo', 4.30, 'https://i.pinimg.com/736x/0e/f0/10/0ef0103247f8aa0d231269aaba6b7e6e.jpg', 'Yu Rebi', 'https://maps.app.goo.gl/U4aeGbxjmPBj7yhz9', 'Penjual sate kere terkenal di Solo adalah sate kere Yu Rebi. Warung yang sudah ada di Jalan Kebangkitan Nasional sejak tahun 1986 ini, menjadi langganan Jokowi Sate kere Yu Rebi juga membuka cabang di Gladak Langen Bogan (Galabo). Wisata kuliner malam hari yang buka sejak tahun 2008 tersebut, menjadi salah satu program bentukan Jokowi ketika menjabat sebagai Walikota Surakarta. Jokowi pun mengunjungi sate kere Yu Rebi yang ada di Galabo. Ia pernah mengajak Megawati Soekarno Puteri ke sana ', 'Sate  Kere'),
(29, 'Oseng mercon bu narti', 'Jogja', 4.90, 'https://i.pinimg.com/736x/99/fc/d2/99fcd24c1022cc04397b80df9bcdae34.jpg', 'Bapak budi setiyawan', 'https://maps.app.goo.gl/y6qSQFHopbxph76u7', 'Oseng Mercon ini adalah makanan legendaris khas Yogyakarta berisikan gajih, daging atau semacamnya dengan dibaluri cabai dan minyak yang berlimpah. Oseng yang dikenal bisa membakar lidah karena rasa pedasnya ini menawarkan produk dalam bentuk kemasan kaleng juga Oseng bu Narti sudah menjadi makanan yang diminati banyak orang. Setiap wisatawan yang berkunjung ke Yogyakarta wajib datang lalu mencoba oseng ini, bagi pecinta kuliner makanan pedas, Oseng Mercon Bu Narti bisa menjadi pilihan yang cocok untuk dikunjungi. Bisnis oseng mercon ini merupakan bisnis bapak Budi Setiawan, S.H, M.M. yang telah ditekuni dari nenek moyangnya yaitu Mbok Kardi pada tahun 1960 lalu diteruskam oleh ibunya pada tahun 1997. Dan hingga saat ini diteruskan oleh Bapak Budi Setiyawan, S.H, M.M', 'Oseng mercon'),
(30, 'Lumpia samijaya', 'jogja', 4.50, 'https://i.pinimg.com/736x/03/6e/c7/036ec7ca986922b00a69beee1311d4e8.jpg', 'Samijaya', 'https://maps.app.goo.gl/fguo4qFwvPt9Uc8r5', 'Lumpia Samijaya termasuk salah satu kuliner legendaris dijogja dan sudah berkelana sejak tahun 1976 silam. Perintisnya ialah Nur Seto, namun kini telah dikelola oleh generasi kedua. Walau sudah berganti tangan namun rasanya tetap sama saja, kalau tidak percaya kamu bisa coba. Diberi nama demikian karena pada awalnya lumpianya dijajakan didepan toko sami jaya samping hotel mutiara', 'Lumpia malioboro'),
(31, 'Angkringan pak jabrik', 'solo', 4.20, 'https://i.pinimg.com/736x/bf/c9/8c/bfc98ca310f40395c98aef15da51a5e7.jpg', 'Pak jabrik', 'https://maps.app.goo.gl/g9WSaCLLsNp9eLp89', 'Angkringan pak jabrik termasuk salah satu angkringan favorit di Yogyakarta(jogja).Angkringan ini juga sering disebut Angkringan KR karena lokasinya berada di depan kantor harian kedaulatan rakyat atau sering disingkat KR', 'Nasi Kucing'),
(32, 'Sate klotok', 'jogja', 4.40, 'https://i.pinimg.com/736x/05/93/51/0593514f8c52d944a708ac679d7c1c1e.jpg', 'Pak pong', 'https://maps.app.goo.gl/cB3MBj4oTQdqMoFX7', 'Sate klathak pak pong sudah berdiri sejak 1960,dan diteruskan oleh generasi penerusnya,selain menu sate klathak juga ada menu lainya,seperti gulai,tongseng,tengkleng,tongseng dan sate', 'Sate Klathak'),
(33, 'Pak nano', 'jogja', 4.50, '', 'Pak nano', 'https://maps.app.goo.gl/DF1sQ9t89wmg5G1h7', 'Sate petir pak nano Rasa pedasnya bikin ketar ketir,berdiri sejak tahun 1980 yang rasa manisnya kecap berpadu pedasnya cabai rawit cincang dalam jumlah banyak adalah cita rasa khas sate petir', 'Sate Petir'),
(34, 'Pecel bu is ramlan', 'jepara', 4.00, '', 'Bu is ramlan', 'https://maps.app.goo.gl/RkZV8UmHxQsQH4Cc6', 'Horok horok adalah makanan ringan yang terbuat dari tepung pohon aren. Horok horok umunya hanya ditemukan di jpera, sulit bahkan tidak dapat ditemukan di luar Jepara', 'horok horok'),
(35, 'Warung makan Sri Rahayu', 'jepara', 4.80, '', 'Sri Rahayu', 'https://maps.app.goo.gl/QchoSMTEftKMJbrv9', 'Pindang serani salah satu makanan khas kota jepara,pindang serani adalah sup ikan yang pedas dan segar', 'Pindang serani'),
(36, 'Bu desmi', 'jepara', 4.40, '', 'De Esmi', 'https://maps.app.goo.gl/q2GKdDKHSFkSaGHR7', 'Jika di daerah lain umumnya anda menemukan upor yang dimasak dengan ayam yang direbus bersama kuah,dijepara cukup berbeda. Karena daging ayam justru dipanggang sehingga memberikan aroma dan tekstur yang khas dan unik', 'Opor panggang '),
(37, 'Lumpia Cik meme', 'Semarang', 4.80, 'https://i.pinimg.com/736x/e4/3e/42/e43e423345df75791b994f2b24dd94e3.jpg', 'Cik meme', 'https://maps.app.goo.gl/ZAoxvUVmw8H821zS8', 'Lumpia(lunpia) ini mulanya dibuat oleh thoa thay yoie dengan cita rasa khas lokal,yakni isiannya menggunakan rebung selain itu juga udang', 'Lumpia semarang'),
(38, 'Wingko babat cap kereta api', 'Semarang', 4.60, '', 'Loe lan Hwa dan D Mulyono', 'https://maps.app.goo.gl/XJgPrDmYYe5jGn4P9', 'Wingko babat makanan tradisional semarang yang wajib dibeli untuk oleh oleh orang di rumah adalah wingko babat rekomendasi terbaiknya adalah wingko babat cap kereta Api.', 'Wingko babat cap Kereta api'),
(39, 'Kue ganjel rel Nyoyah cakery', 'Semarang', 4.80, '', 'Nyonyah cakery', 'https://maps.app.goo.gl/gsrdDNe3udcfJ2HC6', 'Mkakanan Semarang yang keberadaanya kurang terkenal adalah roti gambang atau sering disebut roti ganjel rel.', 'Roti ganjel rel');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`ID_Makanan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_Menu`),
  ADD KEY `ID_Restoran` (`ID_Restoran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_Pemesanan`),
  ADD KEY `pemesanan_ibfk_1` (`ID_Restoran`),
  ADD KEY `pemesanan_fk_pengguna` (`ID_Pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`);

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`ID_Restoran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `festival`
--
ALTER TABLE `festival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `ID_Makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_Pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_Pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `restoran`
--
ALTER TABLE `restoran`
  MODIFY `ID_Restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_fk_pengguna` FOREIGN KEY (`ID_Pengguna`) REFERENCES `pengguna` (`ID_Pengguna`),
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`ID_Restoran`) REFERENCES `restoran` (`ID_Restoran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
