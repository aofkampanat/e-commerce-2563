<?php
include('db.php');
$news = "SELECT *FROM member WHERE username = '".trim($_POST["username"])."' ";
$newq = mysqli_query($newc,$news);
$newr = mysqli_fetch_array($newq);
if($newr)
{
    echo "<script type='text/javascript'>";
    echo "alert('ผู้ใช้ดังกล่าวแล้ว');";
    echo "window.location='register.php'";
    echo "</script>";
}
else
{
    $news = "INSERT INTO member (username,password,name,address,email,phone) VALUES 
    ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["name"]."','".$_POST["address"]."',
    '".$_POST["email"]."','".$_POST["phone"]."')";
    $newq= mysqli_query($newc,$news);
    if($newq)
    {
        echo "<script type='text/javascript'>";
    echo "alert('สมัครสมาชิกสำเร็จ');";
    echo "window.location='login.php'";
    echo "</script>";
    }
}
?>
