<?php
	if(isset($_POST['name']))
	{
		$name = $_POST['name'];
		$order = $_POST['order'];
		$active = $_POST['active'];
		
		//Insert vao DB
		$sql = "INSERT INTO `nn_department` VALUES(NULL,'$name','$order','$active')";
		mysqli_query($link, $sql);
		
		//Chuyen den trang chung loai
		header('location:?mod=dept');
	}
?>
<form name="form1" method="post" action="">
  <table width="400" border="1">
    <caption>
      THÊM CHỦNG LOẠI
    </caption>
    <tr>
      <th width="126" scope="row">Tên</th>
      <td width="258"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <th scope="row">Thứ tự</th>
      <td><input type="number" min="1" name="order" id="order"></td>
    </tr>
    <tr>
      <th scope="row">Hiển thị</th>
      <td><p>
        <label>
          <input name="active" type="radio" id="active_0" value="1" checked>
          Hiện</label>
        <br>
        <label>
          <input type="radio" name="active" value="0" id="active_1">
          Ẩn</label>
        <br>
      </p></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type="submit" id="submit" value="Thêm"></td>
    </tr>
  </table>
</form>
