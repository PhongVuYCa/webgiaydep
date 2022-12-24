<?php
     session_start();
    include("localhost.php");
    $id=$_SESSION['iduser'];
    $fullname = addslashes($_POST['t1']);
    $phone = addslashes($_POST['t2']);
    $email = addslashes($_POST['t3']);
    $address = addslashes($_POST['t4']);
    $updated_at = date("Y-m-d H:i:s");
    echo $id;
    $sql = "update users set  
            fullname='$fullname', 
            phone='$phone', 
            email = '$email', 
            address='$address', 
            updated_at= '$updated_at' 
            where id= '$id'";
   $result=mysqli_query($conn,$sql);
   if ($result){
      echo '<script language="javascript">alert("Chỉnh sửa thành công!"); window.location="information.php";</script>';
   }

   else
        echo '<script language="javascript">alert("Chỉnh sửa thất bại!"); window.location="updateuser.php?idhd=id";</script>';
            
   $conn->close();
?>