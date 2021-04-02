<?php
	//Lay tat ca chung loai
	$sql = 'select * from `nn_department`';
	$rs = mysqli_query($link,$sql);
	
?>
<table width="600" border="1">
  <caption>
    DANH SÁCH CHỦNG LOẠI
  </caption>
  <tr>
    <th width="63" scope="col">#</th>
    <th width="219" scope="col">Tên</th>
    <th width="82" scope="col">Thứ tự</th>
    <th width="88" scope="col">Ẩn</th>
    <th width="114" scope="col"><a href="?mod=dept_add">+ Thêm</a></th>
  </tr>
  <?php
  	$i = 1;
  	while($r = mysqli_fetch_assoc($rs)):
  ?>
      <tr>
        <td align="center"><?=$i++?></td>
        <td><?=$r['name']?></td>
        <td align="center"><?=$r['order']?></td>
        <td align="center"><?php if($r['active']==0) echo 'X';?></td>
        <td align="center"><a href="?mod=dept_edit&id=<?=$r['id']?>">Sửa</a> | <a href="?mod=dept_del&id=<?=$r['id']?>">Xóa</a></td>
      </tr>
  <?php
  	endwhile;
  ?>
</table>
