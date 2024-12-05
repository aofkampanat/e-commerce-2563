<?php 
if(move_uploaded_file($_FILES["p_img"]["tmp_name"],"img/".$_FILES["p_img"]["name"]))
{
    $p_name = $_POST["p_name"];
    $p_detail = $_POST["p_detail"];
    $p_price = $_POST["p_price"];
    $p_item = $_POST["p_item"];
    $c_id = $_POST["c_id"];
    $new_id = $_POST["new_id"];
    $sale_id = $_POST["sale_id"];
    $p_img = $_FILES["p_img"]["name"];
    include('db.php'); 
    $news= "INSERT INTO product (p_name,p_detail,p_price,p_item,c_id,new_id,sale_id,p_img) VALUES
    ('$p_name','$p_detail','$p_price','$p_item','$c_id','$new_id','$sale_id','$p_img')";
    $newq = mysqli_query($newc,$news);
    if($newq)
    {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มสินค้าสำเร็จ');";
        echo "window.location='reportproduct.php'";
        echo "</script>";
    }
}
?>