<?php
session_start();
include('db.php');
$news = "SELECT *FROM member WHERE username = '".mysqli_real_escape_string($newc,$_POST["username"])."' and
password = '".mysqli_real_escape_string($newc,$_POST["password"])."' ";
$newq = mysqli_query($newc,$news);
$newr = mysqli_fetch_array($newq);
if(!$newr)
{
    echo "<script type='text/javascript'>";
    echo "alert('ตรวจสอบข้อมูลอีกครั้ง');";
    echo "window.location='login.php'";
    echo "</script>";
}
else
{
    $_SESSION["status"]=$newr["status"];
    $_SESSION["ID"]=$newr["ID"];
    session_write_close();

if($newr["status"]=="admin")
{
    header("location:indexadmin.php");
}
else
{
    header("location:user/index.php");
}
}
?>