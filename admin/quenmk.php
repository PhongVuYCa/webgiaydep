
<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>web</title>
<link rel="stylesheet" href="style.css"/> 
</head>
<body >
<?php 
        include("header.php");?>

<main class="login">
<div class="login1">
<?PHP
    include("localhost.php");
        
    if (isset($_POST['fullname'])){
    $adminname = stripslashes($_REQUEST['adminname']);
    $adminname = mysqli_real_escape_string($conn,$adminname);
    $fullname = stripslashes($_REQUEST['fullname']);
    $fullname = mysqli_real_escape_string($conn,$fullname);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($conn,$phone);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn,$email);
    $query = "SELECT * FROM `admin` WHERE adminname='$adminname' and fullname='$fullname' and phone='$phone' and email='$email'";
    $result = mysqli_query($conn,$query);
    $rows = $result->fetch_assoc();
        if($rows){
            $_SESSION['thaydoimk']=$rows['id'];
            echo '<script language="javascript">alert("Nhập mật khẩu mới!"); window.location="xuly.php";</script>';
        }else{
            echo '<script language="javascript">alert("Thông tin không chính xác!"); window.location="quenmk.php";</script>';
            
        }
    }else{
?>
<div class="form">
<h1>Quên mật khẩu</h1>
<form action="" method="post" name="login">
<input type="text" name="adminname" placeholder="Tên đăng nhập" required />
<input type="text" name="fullname" placeholder="Họ tên" required />
<input type="text" name="phone" placeholder="Số điện thoại" required />
<input type="email" name="email" placeholder="Nhập email" required />
<input name="submit" type="submit" value="Tiếp tục" />
</form>

</div>
<?php } ?>
</div>
</main>
<?php 
    include("footer.php");
?>
</body>
</html>