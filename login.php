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
    <img src="img/l2.jpg" alt="">
    <br>
    <br>
    <form action="check_login.php" method="post">
    <div class="container">
    <div class="form-group col-7">
    <label for="">Username</label>
    <input type="text" name="username" class="form-control" id="">
    </div>
    <div class="form-group col-7">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control" id="">
    </div>
    <input type="submit" value="เข้าสู่ระบบ" class="btn btn-success">  
    </div>
    </form>
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>