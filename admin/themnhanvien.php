<?php require_once("includes/ketnoidb.php"); ?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Thêm nhân viên</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="style/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body action="" method="post" enctype="multipart/form-data">
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$hovaten = $_POST["hovaten"];
        $anhdaidien= $_FILES["anhdaidien"]['name'];
        if(!empty($anhdaidien)){
			move_uploaded_file($_FILES['anhdaidien']['tmp_name'], 'Avatar/'.$anhdaidien);	
		}
		$sodienthoai = $_POST["sodienthoai"];
		$email = $_POST["email"];
		$ngaysinh = $_POST["ngaysinh"];
        $diachi = $_POST["diachi"];
		$password = $_POST["password"];
		$bophan = $_POST["bophan"];
		$chucdanh = $_POST["chucdanh"];
        $quyentruycap = $_POST["quyentruycap"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($hovaten == "" || $password == "" || $sodienthoai == "" || $email == "" || $bophan == "" || $chucdanh == "" || $quyentruycap == "" ) {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			$sql = "INSERT INTO users(hovaten, anhdaidien, sodienthoai, email, password, ngaysinh, diachi, bophan, chucdanh, quyentruycap) VALUES ( '$hovaten', '$anhdaidien', '$sodienthoai', '$email', '$password', '$ngaysinh', '$diachi', '$bophan', '$chucdanh', '$quyentruycap' )";
			// thực thi câu $sql với biến conn lấy từ file ketnoidb.php
			mysqli_query($conn,$sql);
			header('Location: nhansu.php');
		}
	}

?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content" >
                <main>
                        <div class="row justify-content-center" style=" margin-top: 50px; ">
                            <div class="col-lg-3">
                                <div class="card shadow-lg border-0 rounded-lg mt-1" style="background-color:#eaeeee; border-radius:15px;">
                                    <div class="card-header">
                                        <h2 class="text-center font-weight-light my-4">Nhập thông tin</h2>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" class="form" id="form"  enctype="multipart/form-data" action="themnhanvien.php">
                                            
                                            <div class="avatar-wrapper2">
                                                <img class="profile-pic" src="style/img/avt1.jpg" />
                                                <div class="upload-button">
                                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                                </div>
                                                <input class="file-upload" name="anhdaidien" id="anhdaidien" type="file" accept="image/*" />
                                            </div>
                                            <br />
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="hovaten" id="hovaten" type="text" placeholder="..." />
                                                <label for="hovaten">Họ và tên:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="sodienthoai" id="sodienthoai" type="tel" placeholder="..." />
                                                <label for="sodienthoai">Số điện thoại:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="email" type="Email" placeholder="..." />
                                                <label for="email">Email:</label>
                                            </div>
                                             <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="password" type="password" value="chamchi123" />
                                                <label for="password">Password:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="ngaysinh" id="ngaysinh" type="date" value="2000-01-01" />
                                                <label for="ngaysinh">Ngày sinh:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="diachi" id="diachi" type="text" placeholder="..." />
                                                <label for="diachi ">Địa chỉ :</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="bophan" id="bophan" type="text" placeholder="...">
                                                    <option >Lựa chọn</option>
                                                    <option value="Dev">Dev</option>
                                                    <option value="Game design">Game design</option>
                                                    <option value="Art">Art</option>
                                                    <option value="Tester">Tester</option>
                                                </select>
                                                <label for="bophan">Bộ phận:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="chucdanh" id="chucdanh" type="text" placeholder="...">
                                                    <option >Lựa chọn</option>
                                                    <option value="Nhân viên">Nhân viên</option>
                                                    <option value="Leader">Leader</option>
                                                    <option value="Quản lý">Quản lý</option>
                                                    <option value="Giám đốc">Giám đốc</option>
                                                </select>
                                                <label for="chucdanh">Chức danh:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="quyentruycap" id="quyentruycap" type="text" placeholder="...">
                                                    <option >Lựa chọn</option>
                                                    <option value="0">Nhân viên</option>
                                                    <option value="1">Leader</option>
                                                    <option value="2">Quản lý</option>
                                                    <option value="3">Giám đốc</option>
                                                </select>
                                                <label for="quyentruycap">Quyền truy cập:</label>
                                            </div>
                                            <center>
                                                <input type="submit" class="btn btn-primary" name="btn_submit" style="width: 100px; height: 40px;" value="Lưu"/>
                                                &nbsp;&nbsp;&emsp;
                                                <input class="btn btn-dark" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Huỷ bỏ" style="width: 100px; height: 40px;" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </main>
                </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="style/js/datatables-simple-demo.js"></script>
    </body>
</html>
