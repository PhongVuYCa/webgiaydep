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
    <div class ="tkus">
    <ul class=tkus1>
        <li>
        <li><a href="adduser.php"><button class="add">ADD</button></a></li>
            <form class="tksp2" action="searchuser.php" method="post">
                <li><input type="text" name="tk1" placeholder="Tìm kiếm thông tin" ></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp; 
            </form>
        </li>
    </ul>
</div>
<div class="user">
    
<table>
    <caption>Danh sách người dùng</caption>
    <tr>
        <td>STT</td>
        <td>Tên đăng nhập</td>
        <td>Chi tiết</td>
        <td>Xóa</td>
    </tr>
<?php
    
    include("localhost.php");
    $sql = "SELECT *from users";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  


        // echo  '<tr>';
            echo  ' <tr><td>'.($stt++).'</td>
                        <td>'.$row["username"].'</td>
                        <td>';?><a href="chitiet_user.php?id=<?php echo $row["id"];?>"><button class="ct">Chi tiết</button></a><?php echo '</td>
                        
                        <td>';?><a href="delete_user.php?id=<?php echo $row["id"];?>" onclick="return confirm('Bạn có chắc muốn xóa khách hàng này không?');"><button class="xoa">Xóa</button></a><?php echo '</td>
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
<?php 
     include("footer.php");
?>

</body>

</html>