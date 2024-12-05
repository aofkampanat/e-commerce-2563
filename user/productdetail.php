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
<table width="1024" border="0"height="200" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s3.jpg" alt="">
    <div class="productall">
    <form action="order.php"method="post">
    <?php include('db.php');
    $news="SELECT * FROM product where ProductID='".$_GET["ProductID"]."'";
    $newq=mysqli_query($newc,$news);
    $newr=mysqli_fetch_array($newq);
    $p_id=$newr["ProductID"];
    $p_view=$newr["p_view"];
    $sum=$p_view+1;
    $news="UPDATE product set p_view=$sum where ProductID= $p_id";
    $newq=mysqli_query($newc,$news);
    ?>
      <img src="img/<?php echo $newr["p_img"];?>" width="250" height="250" alt="">
      <h4><?php echo $newr["p_name"];?></h4>
      <?php echo $newr["p_detail"];?>
      ราคา <?php echo $newr["p_price"];?> บาท<br>
      จำนวน <?php echo $newr["p_item"];?> ชิ้น <br>
      <?php
      if($newr["p_item"]>0)
      {
        ?>
        <input type="hidden" name="txtProductID" value="<?php echo $newr["ProductID"];?>">
        <input type="number" name="txtQty" value="1" min="1" max="<?php echo $newr["p_item"];?>" size="2">
        <input type="submit"class="btn btn-success" value="หยิบใส่ตระกร้า">
        <?php
      }
      else
      {
        ?>
        <input type="submit"class="btn btn-danger" value="สินค้าหมด" disabled>
        <?php
      }
      ?>
      <br>
      <br>
      <h5>จำนวนผู้เข้าชม <?php echo $newr["p_view"];?> ครั้ง <br></h5>
  <br>
      <br>
      <a href="product.php"class="btn btn-info">ดูสินค้ารายการอื่น</a>
      </div>
    
    </form>
    </div>
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>