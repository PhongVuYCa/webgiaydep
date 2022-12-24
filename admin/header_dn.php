<?php 
   
    if (isset($_SESSION['adminname'])) 
{?>
<header class="row">
        <div class="logo">
            &nbsp;&nbsp;
            <a href="home.php?"><img src="img/logo.png" alt="" width="80px" height="80px"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="home.php">Trang Chủ</a></li>
                <li><a href="user.php">Danh sách khách hàng</a></li>
                <li><a href="">Danh sách Sản Phẩm</a></li>
                <li><a href="donhang.php">Đơn hàng</a></li>
            </ul>
        </div>
        
        <div class ="right-header">
            <ul class=list_CN>
            <div class="menuuu">
                 <li><a href=""><img src="img/users.png" width="40px" height="40px"></a>
                 <ul class="menuuu1">
                    <?php 
                            
                        include("localhost.php");
                        $name=addslashes($_SESSION['adminname']);
                        $sql = "SELECT * from `admin` where adminname= '$name'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { 
                            ?> 
                            <div>
                                <ul>
                                    <li><?php echo $row["adminname"];?></li><br>
                                    <li><?php echo $row["fullname"];?></li><br>
                                    <li><?php echo $row["phone"];?></li><br>
                                    <li><?php echo $row["email"];?></li><br>
                                    <li><?php echo $row["address"];?></li><br>
                                    <li><a href="logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                            <?php   
                            }
                        }     
                    ?>
                    </ul>
                </li>
                </div>
            </ul>    
         </div>
    </header>
    <?php
} else {
    header('location:index.php');
    }
?>