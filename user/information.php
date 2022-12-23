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
    include("header_dn.php");
?>

    <main >

    <div class="user_ct">
    
<table>
    <caption>Thông tin chi tiết người dùng</caption>
   
<?php
    $name=$_SESSION['username'];
    include("localhost.php");
    $sql = "SELECT * from users where username='$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  

            $id = $row["id"];
        // echo  '<tr>';
            echo  ' 
                        <tr><td>Tên đăng nhập</td>
                        <td>'.$row["username"].'</td></tr>
                        <tr><td>Họ và tên</td>
                        <td>'.$row["fullname"].'</td></tr>
                        <tr><td>phone</td>
                        <td>'.$row["phone"].'</td></tr>
                        <tr><td>email</td>
                        <td>'.$row["email"].'</td></tr>
                        <tr><td>Địa chỉ</td>
                        <td>'.$row["address"].'</td>
                        </tr>';
            ?>
            </div>
           
            <?php
        }
    
    }
    $conn->close();
    ?>
</table>
    <div class="updateuser"><a href="updateuser.php?id=<?php echo $id;?>"><button>Chỉnh sửa</button></a></div>
</div>
    </main>
<?php 
     include("footer.php");
?>

</body>

</html>