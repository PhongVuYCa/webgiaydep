<?php
    
$id = $_GET['id'];
include("localhost.php");
$ktr = "select *from orders where id='$id'";
$rktr = $conn->query($ktr);
$rows = $rktr->fetch_assoc();
$tinhtrang=$rows['tinhtrang'];
if($tinhtrang!='Bị hủy'){
$sql = "update orders set tinhtrang='Bị hủy' where id='$id'";
$result = $conn->query($sql);
if($result){
    $sql2="select * from ctorders where iddh='$id'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0){
        while($row = $result2->fetch_assoc()) {
            $idsp=$row['idsp'];
            $qty=$row['qty'];
            $sql4="select * from sanpham where id='$idsp'";
            $result4 = $conn->query($sql4);
            $row1 = $result4->fetch_assoc();
            $soluong=$row1['soluong'];

            $soluonghoan=$soluong+$qty;

            $update="update sanpham set soluong='$soluonghoan' where id='$idsp'";
            $updatetc=$conn->query($update);
            

         }
         header('location:donhang.php');
    }
}}
else header('location:donhang.php');
?>