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
    <img src="img/s13.jpg" alt="">
    <br>
    <br>
    <form action="save_editmember.php?ID=<?php echo $newr5["ID"];?>" method="post">
    <div class="container">
    <div class="form-group col-7">
    <label for="">Username</label>
    <input type="text"  class="form-control" value="<?php echo $newr5["username"];?>" placeholder="Username"id="" disabled>
    </div>
    <div class="form-group col-7">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control"value="<?php echo $newr5["password"];?> " required>
    </div>
    <div class="form-group col-7">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control"value="<?php echo $newr5["name"];?> "placeholder="ชื่อผู้ใช้"id="" required>
    </div>
    <div class="form-group col-7">
    <label for="">Address</label>
   <textarea name="address" id=""class="form-control" cols="30" rows="10"placeholder="ที่อยู่"id="" required><?php echo $newr5["address"];?></textarea>
    </div>
    <div class="form-group col-7">
    <label for="">E-mail</label>
    <input type="email" name="email" class="form-control"value="<?php echo $newr5["email"];?> " placeholder="อีเมล"id="" required>
    </div>
    <div class="form-group col-7">
    <label for="">Phone</label>
    <input type="text" name="phone" class="form-control"value="<?php echo $newr5["phone"];?> " placeholder="เบอร์โทร"id="" required>
    </div>
    <input type="submit" value="แก้ไข" class="btn btn-success"> 
    </div>
    </form>
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>