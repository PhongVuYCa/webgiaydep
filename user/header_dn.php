<?php 
   
    if (isset($_SESSION['username'])) 
{?>
<header class="row">
        <div class="logo">
            &nbsp;&nbsp;
            <a href="home.php?"><img src="img/logo.png" alt="" width="80px" height="80px"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a class="active" href="home.php">Trang Chủ</a></li>
                <li><a href="shop1.php">Shop</a></li>
                <li><a href="dmsp1.php">Danh Mục Sản Phẩm</a></li>
                <li><a href="blog1.php">Giới Thiệu</a></li>
                <li><a href="lienhe1.php">Liên Hệ</a></li>
            </ul>
        </div>
        
        <div class ="right-header">
            <ul class=list_CN>
                 <li>
                    <form class="search" action="search1.php" method="post">
                        <li><input type="text" name="tk1" placeholder="Tìm kiếm thông tin" ></li> &emsp;
                        <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
                    </form>
                </li>
                <li><a href="basket1.php"><img src="img/giohang.png" width="45px" height="35px"></a></li>
                <div class="menuuu">
                 <li><a href="information.php"><img src="img/users.png" width="40px" height="40px"></a>
                 <ul class="menuuu1">
                    <?php 
                            
                        include("localhost.php");
                        $name=addslashes($_SESSION['username']);
                        $sql = "SELECT * from `users` where username= '$name'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { 
                            ?> 
                            <div>
                                <ul>
                                    <li><?php echo $row["username"];?></li><br>
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