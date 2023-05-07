<?php
include 'koneksi.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
  if ($_SESSION['usertype'] == 'admin') {
    header("Location: admin.php");
    } else if ($_SESSION['usertype'] == 'user')
    {
    header("Location: user.php");
    } else {
    echo "<script>alert('Role anda tidak terdaftar!')</script>";
     session_destroy(); 
    }
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($koneksi, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    
    $_SESSION['username'] = $row['username'];
    $_SESSION['usertype'] = $row['usertype'];
    if ($_SESSION['usertype'] == 'admin') {
    header("Location: admin.php");
    } else if ($_SESSION['usertype'] == 'user')
    {
    header("Location: user.php");
    } else {
    echo "<script>alert('Role anda tidak terdaftar!')</script>";
      
    }
  } else {
    echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}

?>



<!DOCTYPE html>

<head>
  </script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IM Admin - Login</title>
  <link rel="shortcut icon" href="assets/icon.png" type="image/x-icon" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Ikon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>

<body class="font-['Poppins']">
  <!-- Awal dari Nav -->
  <nav class="w-full bg-[#0D6EFD] p-4 text-center text-white text-xl">
    <div>Admin Login</div>
  </nav>
  <!-- Akhir dari nav -->

  <div class="flex mt-10 justify-center items-center">

    <div class="flex bg-purple-100 rounded-lg py-4 px-8 items-center justify-center">

      <!-- Awal Form login -->
      <form action="" method="POST">
        <div class="mb-4">
          <h1 class="font-semibold text-2xl text-center">Login</h1>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label flex justify-content-start">Username:</label>
          <input type="text" class="py-1.5 px-3 rounded-lg" id="username" name="username" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label flex justify-content-start">Password :</label>
          <input type="password" name="password" class="py-1.5 px-3 rounded-lg" id="password" />
        </div>
        <div class="m-3 mr-0 flex justify-end gap-3">
          <input type="button" value="Reset" class="p-2 bg-[#0D6EFD] shadow rounded-lg text-white" name="clear" />
          <input type="submit" value="Simpan" class="p-2 bg-[#0D6EFD] shadow rounded-lg text-white" name="submit" />
        </div>
      </form>
      <!-- Akhir Form Login -->
    </div>
  </div>


  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0D6EFD" fill-opacity="1" d="M0,64L80,64C160,64,320,64,480,96C640,128,800,192,960,186.7C1120,181,1280,107,1360,69.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
  </svg>
  <footer class="py-2 bg-[#0D6EFD] text-center text-white">
    Made with <i class="bi bi-heart-fill text-danger"></i> by Us
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>