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
<form class="form1" action='th.php'  method="post">
	<h2 align="center">Chỉnh sửa thông tin cá nhân</h2>
    <?php
    include("localhost.php");
    $id=$_GET['id'];
    $_SESSION['iduser']=$id;
    $sql = "SELECT * from users where id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {  
            ?>
            
	<table class="information">

	<tr>
		<td>Họ và tên: </td>
        <td><textarea type="text" name="t1" rows="2" cols="40px"><?php echo $row["fullname"];?></textarea></td>
	</tr>
	<tr>
		<td>số điện thoại: </td>
        <td><textarea type="text" name="t2" rows="2" cols="40px"><?php echo $row["phone"];?></textarea></td>
	</tr>
    <tr>
		<td>email: </td>
        <td><textarea type="text" name="t3" rows="2" cols="40px"><?php echo $row["email"];?></textarea></td>
	</tr>
    <tr>
		<td>Địa chỉ: </td>
        <td><textarea type="text" name="t4" rows="2" cols="40px"><?php echo $row["address"];?></textarea></td>
	</tr>
    </table>
    <table class="guide_cs1">
    <tr>
        <td>
        <input type="submit" name="submit" value="Chỉnh sửa"></input> 
        </td>
        <td>
	    <input type="reset" name="reset" value="Làm lại"></input>
        </td>
    </tr>
    </table>
    <?php
        }
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
</form>
    </main>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>