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
    <br>
    <br>
    <?php 
$keyword = null;
if(isset($_POST["keyword"]))
{
  $keyword = $_POST["keyword"];
}
?>
<form action=""method="post">
    <input type="text"name="keyword"placeholder="ค้นหาสินค้า"> <input type="submit" class="btn btn-success"value="ค้นหา">
    </form>
    <br><br>
    <div class="productall">
    <?php
    $ProductID=(isset($_GET['ProductID'])?$_GET['ProductID']:'');
    if($ProductID=='show')
    {
        include('producttype.php');
    }
    else
    {
        include('productall.php');
    }
    ?>
    </div>
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>