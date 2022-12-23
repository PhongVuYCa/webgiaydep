<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng kí</title>
<link rel="stylesheet" href="style.css"/> 
</head>
<body >
<?php 
        include("header.php");?>

<main class="registration">
<div class="registration1">
<?php
    include("localhost.php");

    if (isset($_REQUEST['name']) && isset($_REQUEST['fullname']) && isset($_REQUEST['password']) && isset($_REQUEST['phone']) && isset($_REQUEST['email']) && isset($_REQUEST['address'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn,$name);
        $fullname = stripslashes($_REQUEST['fullname']);
        $fullname = mysqli_real_escape_string($conn,$fullname);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($conn,$phone);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn,$email);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($conn,$address);
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        echo $name;
        $sql = "INSERT into `users` (username, fullname, password,phone,address, email, created_at,updated_at) VALUES ('$name', '$fullname','".md5($password)."','$phone','$address', '$email', '$created_at','$updated_at')";
        $result = $conn->query($sql);
        if($result){
            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="login.php";</script>';

        }
        }else{
    
?>
<div class="form">
<h1>Đăng ký</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Tên đăng nhập" required />
<input type="text" name="fullname" placeholder="Họ tên" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<input type="text" name="phone" placeholder="số điện thoại" required />
<input type="email" name="email" placeholder="Email" required />
<input type="text" name="address" placeholder="Địa chỉ" required />
<input type="submit" name="submit" value="Đăng ký" />
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
