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
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s1.jpg" alt="">
    <div class="productall">
    <?php include('db.php');
    $news="SELECT * FROM product where new_id";
    $newq=mysqli_query($newc,$news);
    ?>
    <?php
    while($newr=mysqli_fetch_array($newq))
    {
      ?>
      <div class="productitem">
      <form action="order.php"method="post">
      <img src="img/<?php echo $newr["p_img"];?>" width="250" height="250" alt="">
      <h4><?php echo $newr["p_name"];?></h4>
      <a href="productdetail.php?ProductID=<?php echo $newr["ProductID"];?>"class="btn btn-danger">ดูรายละเอียด</a><br>
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
      </form>
      </div>
      <?php
    }
    ?>
    </div>
    </td>
  </tr>
</table>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s2.jpg" alt="">
    <div class="productall">
    
    <?php include('db.php');
    $news="SELECT * FROM product where sale_id";
    $newq=mysqli_query($newc,$news);
    ?>
    <?php
    while($newr=mysqli_fetch_array($newq))
    {
      ?>
      <div class="productitem">
      <form action="order.php"method="post">
      <img src="img/<?php echo $newr["p_img"];?>" width="250" height="250" alt="">
      <h4><?php echo $newr["p_name"];?></h4>
      <a href="productdetail.php?ProductID=<?php echo $newr["ProductID"];?>"class="btn btn-danger">ดูรายละเอียด</a><br>
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
      </form>
      </div>
      <?php
    }
    ?>
    </div>
    </td>
  </tr>
</table>
<table width="1024" border="0" height="200" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s3.jpg" alt="">
    <div class="productall">
    <?php include('db.php');
    $news="SELECT * FROM product ";
    $newq=mysqli_query($newc,$news);
    ?>
    <?php
    while($newr=mysqli_fetch_array($newq))
    {
      ?>
      <div class="productitem">    <form action="order.php"method="post">
      <img src="img/<?php echo $newr["p_img"];?>" width="250" height="250" alt="">
      <h4><?php echo $newr["p_name"];?></h4>
      <a href="productdetail.php?ProductID=<?php echo $newr["ProductID"];?>"class="btn btn-danger">ดูรายละเอียด</a><br>
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
      </form>
      </div>
      <?php
    }
    ?>
    </div>
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>