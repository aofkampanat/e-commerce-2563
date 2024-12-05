<?php
if(move_uploaded_file($_FILES["slip"]["tmp_name"],"img/".$_FILES["slip"]["name"]))
{
    echo "<script type='text/javascript'>";
    echo "alert('ชำระเงินสำเร็จ');";
    echo "window.location='index.php'";
    echo "</script>";
}
include('db.php');
$slip = $_FILES["slip"]["name"];
$news = "UPDATE orders SET bank = '".trim($_POST["bank"])."',
status = '".trim($_POST["status"])."',
slip = '".trim($_FILES["slip"]["name"])."' WHERE OrderID = '".$_GET["OrderID"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    echo "<script type='text/javascript'>";
    echo "alert('ชำระเงินสำเร็จ');";
    echo "window.location='index.php'";
    echo "</script>";
}
?>