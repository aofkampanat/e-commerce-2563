<?php
session_start();
if($_SESSION["status"]=!"admin")
{
    echo "เข้าสู่ระบบด้วยแอดมิน";
    exit();
}
elseif($_SESSION["ID"]=="")
{
    echo "เข้าสู่ระบบก่อน";
    exit();
}
include('db.php');
$news= "SELECT *FROM member WHERE ID = '".$_SESSION["ID"]."' ";
$newq = mysqli_query($newc,$news);
$newr = mysqli_fetch_array($newq);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
    body,td,th {
	color: #FFFFFF;
}
    </style>
    <title>Document</title>
</head>
<body>
<?php 
$keyword = null;
if(isset($_POST["keyword"]))
{
  $keyword = $_POST["keyword"];
}
?>
<body>
<table width="100%" border="0" >
<?php
  include('header.php');
  ?>
  <?php
  include('menu.php');
  ?>
    </table></th>
    
    <td colspan="3"valign="top">
    <table class=" table table-bordered"  >
    <p></p>
    <center><a href="addtype.php" class="btn btn-info">เพิ่มประเภทสินค้า</a> </center><p></p>
    <h4><center><font color="000000"> รายงานสินค้า</font></center></h4>
    <p></p>
    <?php
    include('db.php');
    $news= "SELECT*FROM product_type WHERE t_name LIKE '%$keyword%' ";
    $newq = mysqli_query($newc,$news);
    ?>
    <tr>
    <td><font color="000000">ลำดับ</font></td>
    <td><font color="000000">ประเภทสินค้า</font></td>
    <td><font color="000000">ลบ</font></td>
    </tr>
    <?php 
    while ($newr=mysqli_fetch_array($newq))
    {
    ?>
    <tr>
    <td><font color="000000"><?php echo $newr["t_id"];?></font></td>
    <td><font color="000000"><?php echo $newr["t_name"];?></font></td>
    <td><a href="deletetype.php?t_id=<?php echo $newr["t_id"];?>" class="btn btn-danger"><font color="000000">ลบ</font></a></td>
    <?php
    }
    ?>
    </tr>
    </table>
    </td>
  </tr>

</table>
</body>
</html>