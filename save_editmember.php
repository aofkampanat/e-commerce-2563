<?php
session_start();
include('db.php');
$news = "UPDATE member SET password = '".trim($_POST["password"])."',
name = '".trim($_POST["name"])."',address = '".trim($_POST["address"])."',
email = '".trim($_POST["email"])."',phone = '".trim($_POST["phone"])."'
 WHERE ID = '".$_GET["ID"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลสมาชิกสำเร็จ');";
    echo "window.location='index.php'";
    echo "</script>";
}
?>