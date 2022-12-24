<!-- Đăng nhập -->


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
     include("header.php");
?> 
<main>
    
<div class="login">
<div class="login1">
<?PHP
    include("localhost.php");
        
    if (isset($_POST['adminname'])){
    
    $adminname = stripslashes($_REQUEST['adminname']);
    $adminname = mysqli_real_escape_string($conn,$adminname);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $query = "SELECT * FROM `admin` WHERE adminname='$adminname' and password='".md5($password)."'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['adminname'] = $adminname;
            echo '<script language="javascript">alert("Đăng nhập thành công!"); window.location="home.php";</script>';
        }else{
            echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng!"); window.location="login.php";</script>';
            
        }
    }else{
    ?>
        <div class="form">
        <h1>Đăng nhập</h1>
        <form action="" method="post" name="login">
        <input type="text" name="adminname" placeholder="Tên đăng nhập" required />
        <input type="password" name="password" placeholder="Mật khẩu" required />
        <input name="submit" type="submit" value="Đăng nhập" />&emsp;<a href="quenmk.php">Quên mật khẩu<a><br><br>
        </form>

        </div>
    <?php } ?>
</div></div></main>
    <?php 
    include("footer.php");
?>
</body>
</html>