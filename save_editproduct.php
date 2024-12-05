<?php
session_start();
include('db.php');
if(move_uploaded_file($_FILES["p_img"]["tmp_name"],"img/".$_FILES["p_img"]["name"]))
{
  $news= "UPDATE product SET p_img = '".trim($_FILES["p_img"]["name"])."' WHERE ProductID = '".$_GET["ProductID"]."' ";
  $newq = mysqli_query($newc,$news);
}
$news= "UPDATE product SET p_name = '".trim($_POST["p_name"])."',p_detail = '".trim($_POST["p_detail"])."',
p_price = '".trim($_POST["p_price"])."',p_item = '".trim($_POST["p_item"])."' WHERE ProductID = '".$_GET["ProductID"]."' ";
$newq =mysqli_query($newc,$news);
if($newq)
{
  echo "<script type='text/javascript'>";
        echo "alert('แก้ไขสำเร็จ');";
        echo "window.location='reportproduct.php'";
        echo "</script>";
}
?>