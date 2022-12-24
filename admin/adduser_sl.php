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
    //include("header_ad.php");
?>
<div class="row">

    <?php 
       // include("menu_ad.php");
    ?>
    <aside >
<?php
    include("localhost.php");
    $username = addslashes($_POST['t1']);
    $fullname = addslashes($_POST['t2']);
    $password = addslashes($_POST['t3']);
    $phone = addslashes($_POST['t4']);
    $email = addslashes($_POST['t5']);
    $address = addslashes($_POST['t6']);
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    if($username!=null && $fullname!=null && $password!=null && $phone!=null && $email!=null && $address!=null){
          
        $add = "insert into users (username, fullname, password,phone,address,email,created_at,updated_at) values ('$username','$fullname','".md5($password)."','$phone',' $address',' $email','$created_at','$updated_at')";
        $resultadd=mysqli_query($conn,$add);
            if ($resultadd){
                echo '<script language="javascript">alert("Thêm user thành công!"); window.location="user.php";</script>';
            }

            else{
                    echo '<script language="javascript">alert("Thêm thất bại!"); window.location="adduser.php";</script>';}
               
   }
   else
       header("location:adduser.php");
    $conn->close(); 
   
?>
    </aside>
</div>
<?php 
    //include("footer.php");
?>
</body>
</html>