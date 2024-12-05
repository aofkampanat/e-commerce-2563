<?php
include('db.php');
$news = "INSERT INTO product_type (t_name) VALUES ('".$_POST["t_name"]."')";
$newq = mysqli_query($newc,$news);
if($newq)
{
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มประเภทสินค้าสำเร็จ');";
    echo "window.location='reporttype.php'";
    echo "</script>";
}
?>