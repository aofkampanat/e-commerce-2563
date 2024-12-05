<?php
session_start();
 include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
<style type="text/css">
body{
    margin:0px;
    padding:0px;
}
ul {
	text-align: center;
	display: block;
	margin: 0px;
	height: 50px;
	padding-top: 10px;
	list-style-type: none;
	background-color: #039;
}
#nav1 a {
	color: #FFF;
	text-decoration: none;
	background-color: #039;
	text-align: center;
	display: block;
	margin: 0px;
	height: 35px;
	width: 150px;
	padding-top: 5px;
}
#nav1 a:hover {
	color: #FFF;
	text-decoration: none;
	background-color: #036;
	text-align: center;
	display: block;
	margin: 0px;
	height: 35px;
	width: 150px;
	padding-top: 5px;
}
#nav1 li ul a {
background-color: #ffffff;
color: #000000;
}
#nav1 li ul {
	position: absolute;
	visibility: hidden;
}
#nav1 li {
	float: left;
	position: relative;
}
#nav1 li:hover ul {
	visibility: visible;
	margin: 0px;
	padding: 0px;
}
</style>
</head>
<body>
    <ul id="nav1">
    <li><a href="index.php">หน้าแรก</a></li>

    <li><a href="product.php">สินค้า</a>
    <ul>
	<?php include('db.php');
    $news="SELECT t.*,count(p.ProductID) as ptotal
	FROM product_type as t
	LEFT JOIN product as p on t.t_id=p.c_id
	GROUP BY  t.t_id";
    $newq=mysqli_query($newc,$news);
    ?>
	<li><a href="product.php">สินค้าหมด</a></li>
    <?php
    while($newr=mysqli_fetch_array($newq))
    {
      ?>
    <li><a href="product.php?ProductID=show&t_id=<?php echo $newr["t_id"];?>"><?php echo $newr["t_name"];?> (<?php echo $newr["ptotal"];?>)</a></li>
	<?php
	}
	?>
    </ul>
    </li>
    <li><a href="view.php">วิธีการสั่งซื้อ</a></li>
    <li><a href="comment.php">เกี่ยวกับ</a></li>
    <li>
    <form action="count_name.php"method="post">
    <input type="text" name="keyname" placeholder="ค้นหารายการสั่งซื้อ">
    <input type="submit"value="ค้นหา" class="btn btn-danger btn-sm">
    </form>
    </li>
    <li><a href="register.php">สมัครสมาชิก</a></li>
    <li><a href="login.php">เข้าสู่ระบบ</a></li>
    </ul>
</body>
<img src="img/bg3.gif" width="100%" alt="">
<br><br>
</html>