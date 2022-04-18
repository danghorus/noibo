<?php
if (isset($_SESSION['manhanvien']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: index.php');
}else {
	if (isset($_SESSION['quyentruycap']) == true) {
		// Ngược lại nếu đã đăng nhập
		$quyentruycap = $_SESSION['quyentruycap'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($quyentruycap == '0') {
			// Nếu không phải admin thì xuất thông báo
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='trangchu.php'> Click để về lại trang chủ</a>";
			exit();
		}
	}
}
?>