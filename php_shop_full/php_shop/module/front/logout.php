<?php
	unset($_SESSION['id'],$_SESSION['name']);
	//Chuyen den trang dang nhap
	echo 'Đăng xuất thành công, Hệ thống đang chuyển trang ...';
?>
<script>
	setTimeout("window.location='?mod=login'",3000);
</script>