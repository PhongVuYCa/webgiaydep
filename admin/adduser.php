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
<div class="adduser">
<form class="form1" action='adduser_sl.php'  method="post">
	
    <?php
    include("localhost.php");

            ?>
            
	<table>
    <caption>Thêm khách hàng</caption>
	<tr>
		<td>Tên đăng nhập: </td>
        <td><input type="text" name="t1" ></td>
	</tr>
	<tr>
		<td>Họ và tên: </td>
        <td><input type="text" name="t2" ></td>
	</tr>
    <tr>
		<td>Mật khẩu: </td>
        <td><input type="password" name="t3" ></td>
	</tr>
    <tr>
		<td>Số điện thoai: </td>
        <td><input type="tel" name="t4" ></td>
	</tr>
    <tr>
		<td>Email: </td>
        <td><input type="email" name="t5" ></td>
	</tr>
    <tr>
		<td>Địa chỉ: </td>
        <td><input type="text" name="t6" ></td>
	</tr>
    </table>
    <table class="adduser1">
    <tr>
        <td>
        <input type="submit" name="submit" value="Thêm"></input> 
        </td>
        <td>
	    <input type="reset" name="reset" value="Làm lại"></input>
        </td>
    </tr>
    </table>
  
</form>
</div>
</main>
<?php 
    include("footer.php");
?>
</body>
</html>