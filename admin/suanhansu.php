<?php
	session_start(); 
 ?>
<?php require_once("includes/ketnoidb.php"); ?>

<?php include 'includes/session.php';?>
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
		$bophan = $_POST["bophan"];
		$chucdanh = $_POST["chucdanh"];
		$quyentruycap = $_POST["quyentruycap"];
		$khoanhanvien = 0;
		if (isset($_POST["khoanhanvien"])) {
			$khoanhanvien = $_POST["khoanhanvien"];
		}

		$manhanvien = $_POST["manhanvien"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE users SET hovaten = '$hovaten', anhdaidien='$anhdaidien', sodienthoai='$sodienthoai', email = '$email', ngaysinh='$ngaysinh', diachi='$diachi', bophan='$bophan', chucdanh='$chucdanh', quyentruycap = '$quyentruycap', khoanhanvien = '$khoanhanvien' WHERE manhanvien=$manhanvien";
		// thực thi câu $sql với biến conn lấy từ file ketnoidb.php
		mysqli_query($conn,$sql);
		header('Location: nhansu.php');
	}

	$manhanvien = -1;
	if (isset($_GET['manhanvien'])) {
		$manhanvien = $_GET['manhanvien'];
	}
	$sql = "SELECT * FROM users WHERE manhanvien = ".$manhanvien;
	$query = mysqli_query($conn,$sql);

	function make_permission_dropdown($manhanvien){
		$select_1 = "";
		$select_2 = "";
		$select_3 = "";
        $select_4 = "";
		if ($manhanvien == 0) {
			$select_1 = 'selected = "selected"';
		}
		if ($manhanvien == 1) {
			$select_2 = 'selected = "selected"';
		}
		if ($manhanvien == 2) {
			$select_3 = 'selected = "selected"';
		}
        if ($manhanvien == 3) {
			$select_4 = 'selected = "selected"';
		}
		$select = '<select id="quyentruycap" name="quyentruycap" class="form-textbox validate" type="text" style="width:310px; height: 40px;">
						<option value="-1">Lựa chọn</option>
						<option value="0" '.$select_1.'>Nhân viên</option>
						<option value="1" '.$select_2.'>Leader</option>
						<option value="2" '.$select_3.'>Quản lý</option>
                        <option value="3" '.$select_4.'>Giám đốc</option>
					</select>';

		return $select;
	}


?>

<!DOCTYPE >
<html class="supernova">
<head>
    <title>Chỉnh sửa thông tin nhân viên</title>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f7ed99c2c2c7240ba580251" />
    <link href="style/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$manhanvien = $data['manhanvien'];
			$khoanhanvien = "";
			if ($data['khoanhanvien'] == 1) {
				$khoanhanvien = "checked='checked'";
			}
	?>

    <form class="jotform-form" action="suanhansu.php" method="post" enctype="multipart/form-data" name="form" id="form" accept-charset="utf-8" style="border:2px;">
        
        <div role="main" class="form-all">
            <style>
                .form-all:before {
                    background: none;
                }
            </style>
            <ul class="form-section page-section" style="background-color:#eaeeee;border-radius:10px;">
                <li id="cid_34" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-large">
                        <div class="header-text httal htvam">
                            <h1 id="header_34" class="form-header" data-component="header" style="text-align:center; ">
                               Cập nhật thông tin nhân viên
                            </h1>
                        </div>
                    </div>
                </li>
                <li class="form-input-wide">
                <label class="form-label form-label-top form-label-auto" style="margin-left: 20px;">Ảnh đại diện </label>
                    <div class="avatar-wrapper1" >  
                                <img id="anhdaidien" name="anhdaidien" class="profile-pic" src="Avatar/<?php echo $data['anhdaidien'] ?>" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" name="anhdaidien" id="anhdaidien" type="file" accept="image/*" value="Avatar/4.png" />
                            </div>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Họ và tên </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" name="hovaten" id="hovaten" class="form-textbox" style="width:310px" data-masked="true" value="<?php echo $data['hovaten']; ?>" id="hovaten"/>
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2" >
                    <label class="form-label form-label-top form-label-auto" > Mã nhân viên</label>
                    <div class="form-input-wide" >
                        <input type="text" class="form-textbox" style="width:310px" size="310" name="manhanvien" id="manhanvien" value="<?php echo $data['manhanvien']; ?>" data-component="textbox"/>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Ngày sinh </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="date" id="ngaysinh" type="text" class="form-textbox" style="width:310px" name="ngaysinh" value="<?php echo $data['ngaysinh']; ?>"/>
                        </span>
                    </div>
                </li>  
                
                <li class="form-line form-line-column form-col-1" >
                    <label class="form-label form-label-top form-label-auto" > Số điện thoại </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="tel" class="mask-phone-number form-textbox validate[Fill Mask]" style="width:310px" data-masked="true" name="sodienthoai" id="sodienthoai" value="<?php echo $data['sodienthoai']; ?>" />
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2" >
                    <label class="form-label form-label-top form-label-auto" > Email</label>
                    <div class="form-input-wide" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="email" name="email" id="email" class="form-textbox validate[Email]" style="width:310px" size="310" value="<?php echo $data['email']; ?>"  />
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2" >
                <div class="form-input-wide">
                    <label class="form-label form-label-top form-label-auto" for="bophan">Bộ phận</label>
                    <select class="form-textbox validate" name="bophan" id="bophan" style="width:310px; height: 40px;">
                        <option style="background-color:rgb(30, 182, 228)"><?php echo $data['bophan']; ?></option>
                        <option value="Dev">Dev</option>
                        <option value="Game design">Game design</option>
                        <option value="Art">Art</option>
                        <option value="Tester">Tester</option>
                    </select>
                </div>
                </li>
                <li class="form-line form-line-column form-col-2">
                    <div class="form-input-wide">
                        <label class="form-label form-label-top form-label-auto" for="chucdanh">Chức danh</label>
                        <select class="form-textbox validate" name="chucdanh" type="text" style="width:310px; height: 40px;" id= "chucdanh">
                            <option style="background-color:rgb(30, 182, 228)"><?php echo $data['chucdanh']; ?> </option>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Leader">Leader</option>
                            <option value="Quản lý">Quản lý</option>
                            <option value="Giám đốc">Giám đốc</option>
                        </select>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2">
                    <div class="form-input-wide">
                        <label class="form-label form-label-top form-label-auto" for="quyentruycap">Quyền truy cập</label>
                        <div class="form-input-wide" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <?php echo make_permission_dropdown($data['quyentruycap']); ?>
                        </span>
                    </div>
                        
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Hoạt động </label>
                    <div class="form-input-wide">
                            <input type="quyentruycap" class="mask-phone-number form-textbox validate" style="width:310px" value="<?php echo $data['khoanhanvien']; ?>" disabled/>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1" >
                    <label class="form-label form-label-top form-label-auto" id="label_75" for="input_75_addr_line1"> Địa chỉ </label>
                        <div class="form-input-wide">
                            <input type="text" name="diachi" id="diachi" class="form-textbox form-address-line" value="<?php echo $data['diachi']; ?>" /> 
                        </div>
                </li>
                <li class="form-line" >
                    <div class="form-input-wide">
                        <div class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                            <a class="small" href="nhansu.php">
                                <input type="submit" class="btn btn-primary" name="btn_submit" style="width: 100px; height: 40px;" value="Lưu"/> 
                            </a>
                            &nbsp;&nbsp;&emsp;
                            <a>
                                <input class="btn btn-dark" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Huỷ bỏ" style="width: 100px; height: 40px;" />
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    </form>

<?php  } ?>
</body>

</html>