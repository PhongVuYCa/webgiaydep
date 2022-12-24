<?php
session_start();
if(isset($_SESSION["adminname"])!= null)
{
    unset($_SESSION["adminname"]);
    header("location:index.php");
}
?>