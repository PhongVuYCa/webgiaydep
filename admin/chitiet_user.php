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
<main>

    <div class="user_ct">
    
<table>
    <caption>Thông tin chi tiết người dùng</caption>
   
<?php
    
    include("localhost.php");
    $id=$_GET['id'];
    $sql = "SELECT *from users where id=$id";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  


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
                        <td>'.$row["address"].'</td></tr>
                        <tr><td>Thời gian đăng kí</td>
                        <td>'.$row["created_at"].'</td></tr>
                        <tr><td>Thời gian update</td>
                        <td>'.$row["updated_at"].'</td>
                        </tr>';
            ?>
            </div>
           
            <?php
        }
    
    }
    $conn->close();
    ?>
</table>
</div>
</main>
</div>
<?php 
     include("footer.php");
?>

</body>

</html>