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
    <table class=" table table-bordered" width="100%" >
    <p></p>
    <center><font color="000000"> รายงานสมาชิก</font></center>
    <p></p>
    <?php
    include('db.php');
    $news= "SELECT*FROM member WHERE name LIKE '%$keyword%' or username LIKE '%$keyword%' or address LIKE '%$keyword%' ";
    $newq = mysqli_query($newc,$news);
    ?>
    <tr>
    <td><font color="000000">ลำดับ</font></td>
    <td><font color="000000">Username</font></td>
    <td><font color="000000">Password</font></td>
    <td><font color="000000">ชื่อ</font></td>
    <td><font color="000000">ที่อยู่</font></td>
    <td><font color="000000">อีเมล</font></td>
    <td><font color="000000">เบอร์โทร</font></td>
    <td><font color="000000">สถานะ</font></td>
    <td><font color="000000">แก้ไข</font></td>
    <td><font color="000000">ลบ</font></td>
    </tr>
    <?php 
    while ($newr=mysqli_fetch_array($newq))
    {
    ?>
    <tr>
    <td><font color="000000"><?php echo $newr["ID"];?></font></td>
    <td><font color="000000"><?php echo $newr["username"];?></font></td>
    <td><font color="000000"><?php echo $newr["password"];?></font></td>
    <td><font color="000000"><?php echo $newr["name"];?></font></td>
    <td><font color="000000"><?php echo $newr["address"];?></font></td>
    <td><font color="000000"><?php echo $newr["email"];?></font></td>
    <td><font color="000000"><?php echo $newr["phone"];?></font></td>
    <td><font color="000000"><?php echo $newr["status"];?></font></td>
    <td><a href="edituser.php?ID=<?php echo $newr["ID"];?>" class="btn btn-success"><font color="000000">แก้ไข</font></a></td>
    <td><a href="deleteuser.php?ID=<?php echo $newr["ID"];?>" class="btn btn-danger"><font color="000000">ลบ</font></a></td>
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