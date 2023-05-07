<?php
include 'koneksi.php';  
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    echo 'hai'; 
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['usertype'].' - '.$_SESSION['username']?></title>

</head>
<body>
    <form action="" method="post">
    <input type="submit" value="logout" name="logout">
    </form>
</body>
</html>