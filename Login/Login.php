<?php

// Konfigurasi koneksi ke database
$servername = "localhost"; // Ganti dengan nama host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "saloka"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginSubmit'])) {
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    // Melakukan verifikasi login dengan prepared statement
    $stmt = $conn->prepare("SELECT ID_Pengguna, Nama, Password FROM pengguna WHERE (Nama = ? OR Email = ?) LIMIT 1");
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['ID_Pengguna'] = $row['ID_Pengguna'];
            $_SESSION['username'] = $row['Nama'];

            header("Location: ../home/home.php");
            
        } else {
            $loginError = "Username/Email atau Password salah.";
        }
    } else {
        $loginError = "Username/Email atau Password salah.";
    }
}

// Fungsi untuk registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registerSubmit'])) {
    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $phone = $_POST['registerPhone'];
    $password = $_POST['registerPassword'];

    // Enkripsi password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Menyimpan data registrasi menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO pengguna (Nama, Nomor_Telepon, Email, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $phone, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: ../home/home.php");
        exit();
    } else {
        $registerError = "Registrasi gagal. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Login & Registration</title>
  </head>
<body>
<div class="wrapper">
      <nav class="nav">
        <div class="nav-logo">
          <p>SALOKA</p>
        </div>
        <div class="nav-button">
          <button class="btn white-btn" id="loginBtn" onclick="login()">
            Sign In
          </button>
          <button class="btn" id="registerBtn" onclick="register()">
            Sign Up
          </button>
        </div>
        <div class="nav-menu-btn">
          <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
      </nav>

   <!-- Form login dan register -->
   
      <!----------------------------- Form box ----------------------------------->
      <div class="form-box">
        <!------------------- login form -------------------------->

        <!-- Bagian login -->
<div class="login-container" id="login">
  <div class="top">
    <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
    <header>Login</header>
  </div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="input-box">
      <input type="text" class="input-field" placeholder="Username or Email" name="usernameOrEmail" />
      <i class="bx bx-user"></i>
    </div>
    <div class="input-box">
      <input type="password" class="input-field" placeholder="Password" name="password" />
      <i class="bx bx-lock-alt"></i>
    </div>
    <div class="input-box">
      <input type="submit" class="submit" value="Sign In" name="loginSubmit" />
    </div>
    <div class="two-col">
      <div class="one">
        <input type="checkbox" id="login-check" />
        <label for="login-check"> Remember Me</label>
      </div>
      <div class="two">
        <label><a href="..\Admin\Admin.php">Admin?</a></label>
      </div>
    </div>
  </form>
</div>

<!-- Bagian registrasi -->
<div class="register-container" id="register">
  <div class="top">
    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
    <header>Sign Up</header>
  </div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="input-box">
      <input type="text" class="input-field" placeholder="Username" name="registerUsername" />
      <i class="bx bx-user"></i>
    </div>
    <div class="input-box">
      <input type="text" class="input-field" placeholder="Email" name="registerEmail" />
      <i class="bx bx-envelope"></i>
    </div>
    <div class="input-box">
      <input type="text" class="input-field" placeholder="No Telephone" name="registerPhone" />
      <i class="bx bx-envelope"></i>
    </div>
    <div class="input-box">
      <input type="password" class="input-field" placeholder="Password" name="registerPassword" />
      <i class="bx bx-lock-alt"></i>
    </div>
    <div class="input-box">
      <input type="submit" class="submit" value="Register" name="registerSubmit" />
    </div>
    <div class="two-col">
      <div class="one">
        <input type="checkbox" id="register-check" />
        <label for="register-check"> Remember Me</label>
      </div>
      <div class="two">
        <label><a href="#">Terms & conditions</a></label>
      </div>
    </div>
  </form>
</div>

    </div>


    <script>
      function myMenuFunction() {
        var i = document.getElementById("navMenu");

        if (i.className === "nav-menu") {
          i.className += " responsive";
        } else {
          i.className = "nav-menu";
        }
      }
    </script>

    <script>
      var a = document.getElementById("loginBtn");
      var b = document.getElementById("registerBtn");
      var x = document.getElementById("login");
      var y = document.getElementById("register");

      function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
      }

      function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
      }
    </script>
</body>
</html>
