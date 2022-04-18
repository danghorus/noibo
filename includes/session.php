<?php 
//Gọi file connection.php ở bài trước
require_once("includes/ketnoidb.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
	// lấy thông tin người dùng
	$email = $_POST["email"];
	$password = $_POST["password"];
	//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$email = strip_tags($email);
	$email = addslashes($email);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($email == "" || $password =="") {
		echo "Email hoặc Password bạn không được để trống!";
	}else{
		$sql = "select * from users where email = '$email' and password = '$password' ";
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			echo "Email hoặc Password không đúng !";
		}else{
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
	    		$_SESSION["manhanvien"] = $data["manhanvien"];
				$_SESSION['anhdaidien'] = $data["anhdaidien"];
				$_SESSION['hovaten'] = $data["hovaten"];
				$_SESSION['sodienthoai'] = $data["sodienthoai"];
				$_SESSION['email'] = $data["email"];
				$_SESSION["ngaysinh"] = $data["ngaysinh"];
				$_SESSION["diachi"] = $data["diachi"];
				$_SESSION["bophan"] = $data["bophan"];
				$_SESSION["chucdanh"] = $data["chucdanh"];
				$_SESSION["khoanhanvien"] = $data["khoanhanvien"];
				$_SESSION["quyentruycap"] = $data["quyentruycap"];
	    	}
			
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			header('Location: trangchu.php');
		}
	}
}
?>