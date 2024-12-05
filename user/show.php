<?php include('navbar.php');?>
<style>
.productall{
  width:900px;
}
.productitem{
  width:300px;
  float:left;
}
</style>
<body>
<table width="1024" border="0" height="300" valing="top"align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s7.jpg" alt="">
    <form action="update.php"method="post">
    <table width="800"class="table bordered">
    <tr>
    <td>รหัสสินค้า</td>
    <td>ภาพสินค้า</td>
    <td>ชื่อสินค้า</td>
    <td>ราคาสินค้า</td>
    <td>จำนวน</td>
    <td>ราคารวม</td>
    <td>ลบ</td>
    </tr>
<?php
@ini_set('display_errors','0');
$total=0;
$sumtotal=0;
$vat=0;
$sumvat=0;
$a=0;
$sum=0;
    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
    {
        if($_SESSION["strProductID"][$i]!="")
        {
            $news="SELECT * from product WHERE ProductID='".$_SESSION["strProductID"][$i]."'";
            $newq=mysqli_query($newc,$news);
            $newr=mysqli_fetch_array($newq);
            $total=$_SESSION["strQty"][$i]*$newr["p_price"];
            $sumtotal=$total+$sumtotal;
            $vat=$sumtotal*0.07;
            $sumvat=$sumtotal+$vat;
            $a=300;
            $sum=$sumvat+$a;
            ?>
               <tr>
    <td><?php echo $_SESSION["strProductID"][$i];?><input type="hidden" name="txtProductID<?php echo $i;?>"value="<?php echo $_SESSION["strProductID"][$i];?>"></td>
    <td><img src="img/<?php echo $newr["p_img"];?>" width="80" height="80" alt=""></td>
    <td><?php echo $newr["p_name"];?></td>
    <td><?php echo number_format($newr["p_price"]);?></td>
    <td><input type="number" name="txtQty<?php echo $i;?>" value="<?php echo $_SESSION["strQty"][$i];?>" min="1" max="<?php echo $newr["p_item"];?>" size="2"></td>
    <td><?php echo number_format($total);?></td>
    <td><a href="delete.php?Line=<?php echo $i;?>"class="btn btn-danger">ลบ</a></td>
    </tr>
    <?php
        }
    }
    ?>
    </table>
    <div align="right">
    <input type="submit"value="อัพเดทจำนวน"class="btn btn-info"><br><br>
    ราคารวม <?php echo number_format($sumtotal);?> บาท<br>
    ภาษี7% <?php echo number_format($vat);?> บาท<br>
    ค่าขนส่ง <?php echo number_format($sumtotal);?> บาท<br>
     <font color="f001">ราคารวม <?php echo number_format($sum);?> บาท</font><br>
    </div>
    </form>
    <a href="product.php"class="btn btn-danger">กลับไปเลือกสินค้า</a> 
    <?php
    if($sum>0)
    {
        ?>
       | <a href="checkout.php"class="btn btn-success">ยืนยันการสั่งซื้อ</a>
        <?php
    }
    else
    {
        ?>
        <?php
    }
    ?>
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>