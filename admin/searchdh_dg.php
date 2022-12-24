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
    <div class ="tkdh">
    <ul class=tkdh1>
        <li>
        <li><a href="choxacnhan.php"><button class="choxacnhan">Chờ xác nhận</button></a></li>
        <li><a href="dangvanchuyen.php"><button class="dangvanchuyen">Đang vận chuyển</button></a></li>
        <li><a href="dagiao.php"><button class="dagiao">Đã giao</button></a></li>
        <li><a href="dahuy.php"><button class="dahuy">Đã hủy</button></a></li>
            <form class="tkdh2" action="searchdh_dg.php" method="post">
                <li><input type="text" name="tk1" placeholder="Tìm kiếm khách hàng" ></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
            </form>
        </li>
    </ul>
</div>
    <div class="donhang1">
<table>
    <caption>Thông tin đơn hàng</caption>
    <tr>
        <td>STT</td>
        <td>Tên khách hàng</td>
        <td>Số điện thoại</td>
        <td>Địa chỉ</td>
        <td>Tổng Tiền</td>
        <td>Tình trạng</td>
        <td>Cập nhật</td>
        <td>Hủy đơn</td>
        <td>Xem chi tiết</td>
    </tr>
<?php
    include("localhost.php");
    $tk = addslashes($_POST['tk1']);
    $sql = "SELECT orders.id,username,phone,address,tong,tinhtrang from orders
            join users on users.id=orders.iduser 
            where tinhtrang='Đã giao' and username like '%$tk%'";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  
        // echo  '<tr>';
            echo  ' <tr><td>'.($stt++).'</td>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["phone"].'</td>
                        <td>'.$row["address"].'</td>
                        <td>'.$row["tong"].'</td>
                        <td>'.$row["tinhtrang"].'</td>';
                        if($row["tinhtrang"]=="Chờ xác nhận"){
                            echo '<td><a href="capnhatdh.php?id='.$row["id"].'"><button class="sua">Đang vận chuyển</button></a></td>';
                        }
                        else {
                        echo '<td><a href="capnhatdh.php?id='.$row["id"].'"><button class="sua">Đã giao</button></a></td>';
                        }
            echo   '<td><a href="huyhd.php?id='.$row["id"].'"><button class="huy">Hủy đơn</button></a></td>
                        <td><a href="chitietdh.php?id='.$row["id"].'"><button class="chitiet">Chi tiết</button></a></td>
                        </tr>';
            ?>
            </div>
            <?php
        }
        // echo '</table>';
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