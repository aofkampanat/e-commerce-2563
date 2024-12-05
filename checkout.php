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
            $news1="UPDATE product SET p_item=p_item-".$_SESSION["strQty"][$i]." WHERE ProductID='".$_SESSION["strProductID"][$i]."'";
            $newq1=mysqli_query($newc,$news1);
            $news2="UPDATE product SET p_qty=p_qty+".$_SESSION["strQty"][$i]." WHERE ProductID='".$_SESSION["strProductID"][$i]."'";
            $newq2=mysqli_query($newc,$news2);
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
    <td><?php echo $_SESSION["strQty"][$i];?></td>
    <td><?php echo number_format($total);?></td>
    </tr>
    <?php
        }
    }
    ?>
    </table>
    <div align="right">
    ราคารวม <?php echo number_format($sumtotal);?> บาท<br>
    ภาษี7% <?php echo number_format($vat);?> บาท<br>
    ค่าขนส่ง <?php echo number_format($sumtotal);?> บาท<br>
     <font color="f001"><h6>ราคารวม <?php echo number_format($sum);?> บาท</h6></font><br>
    </div>
    </form>
    </td>
  </tr>
</table>
<table width="1024" border="0"  valing="top"align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s8.jpg" alt="">
    <form action="save_checkout.php" method="post">
    <div class="container">
    <br>
    <div class="form-group col-7">
    <label for="">ชื่อผู้สั่งซื้อ</label>
    <input type="text" name="name" class="form-control"  placeholder="ชื่อผู้สั่งซื้อ"id="" required>
    </div>
    <div class="form-group col-7">
    <label for="">ที่อยู่</label>
   <textarea name="address" id=""class="form-control" cols="30" rows="10"placeholder="ที่อยู่"id="" required></textarea>
    </div>
    <div class="form-group col-7">
    <label for="">อีเมลล์</label>
    <input type="email" name="email" class="form-control" placeholder="อีเมล"id="" required>
    </div>
    <div class="form-group col-7 ">
    <label for="">เบอร์โทร</label>
    <input type="text" name="phone" class="form-control" placeholder="เบอร์โทร"id=""maxlength="10" required>
    </div>
    <input type="hidden" name="price" class="form-control"value="<?php echo number_format($sum);?>" placeholder="เบอร์โทร"id="" required>
    <input type="submit" value="ยืนยัน" class="btn btn-success">  
    <br>
    <br>
    </div>
    </form>
    </td>
  </tr>
</table>

<?php include('footer.php');?>
</body>
</html>