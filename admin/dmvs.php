<?php require_once("includes/ketnoidb.php"); ?>

<!DOCTYPE >

<html class="supernova">
<head>
    <title>Yêu cầu</title>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f7ed99c2c2c7240ba580251" />
    <link href="style/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body action="" method="post" enctype="multipart/form-data">
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
        $loaiyeucau = $_POST["loaiyeucau"];
		$nguoiyeucau = $_POST["nguoiyeucau"];
        $manhanvien = $_POST["manhanvien"];
        $giotu = $_POST["giotu"];
		$ngaytu = $_POST["ngaytu"];
        $gioden = $_POST["gioden"];
		$lydo = $_POST["lydo"];
		$nguoiduyet = $_POST["nguoiduyet"];
        $trangthaiduyet = $_POST["trangthaiduyet"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			$sql = "INSERT INTO yeucau(loaiyeucau ,nguoiyeucau, manhanvien, giotu, ngaytu, gioden, lydo, nguoiduyet, trangthaiduyet, ngaygui) 
            VALUES ( '$loaiyeucau', '$nguoiyeucau', '$manhanvien', '$giotu', '$ngaytu', '$gioden', '$lydo', '$nguoiduyet', '$trangthaiduyet', now())";
			// thực thi câu $sql với biến conn lấy từ file ketnoidb.php
			mysqli_query($conn,$sql);
			header('Location: yeucaucanduyet.php');
		}
    $manhanvien = -1;
	if (isset($_GET['manhanvien'])) {
		$manhanvien = $_GET['manhanvien'];
	}
	$sql = "SELECT * FROM users WHERE manhanvien = ".$manhanvien;
	$query = mysqli_query($conn,$sql);

?>
    <form class="form" action="" method="post" enctype="multipart/form-data" name="form" id="form_yeucaunghi" accept-charset="utf-8" style="border:2px;">
        
        <div role="main" class="form-all">
            <style>
                .form-all:before {
                    background: none;
                }
            </style>
            <ul class="form-section page-section" style="background-color:#eaeeee;border-radius:10px;">
                <li id="cid_34" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-large">
                        <input class="" name="loaiyeucau" id="loaiyeucau" value="Đi muộn về sớm" style="font-size:35px; border:0px; background-color:#eaeeee; margin-left:30%;" readonly>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Người yêu cầu </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" name="nguoiyeucau" id="hovaten" class="form-textbox" style="width:310px" data-masked="true" value="" />
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2" >
                    <label class="form-label form-label-top form-label-auto" > Mã nhân viên</label>
                    <div class="form-input-wide" >
                        <input type="text" name="manhanvien" id="manhanvien" class="form-textbox" style="width:310px" size="310" data-component="textbox" value=""/>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto">  Ngày  </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="date" name="ngaytu" id="ngay" type="text" class="form-textbox" style="width:310px" />
                            <script>
                                document.getElementById('ngay').value = new Date().toISOString().substring(0, 10);
                            </script>
                        </span>
                    </div>
                </li>  
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto">  Thời gian từ  </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="time" name="giotu" id="giotu" type="text" class="form-textbox" style="width:310px" value="08:00" />
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto">  Đến  </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="time" name="gioden" id="ngayden" type="text" class="form-textbox" style="width:310px" value="17:00"/>
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto">  Người duyệt  </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="text" name="nguoiduyet" id="nguoiduyet" type="text" class="form-textbox" style="width:310px" />
                        </span>
                    </div>
                </li>
                <li class="form-line">
                    <label class="form-label form-label-top form-label-auto">  Lý do  </label>
                    <div class="form-input-wide" >
                        <textarea type="text" name="lydo" id="lydo" type="text" class="form-textbox" style="height:200px;" ></textarea>
                    </div>
                </li>
                <li class="form-line">
                    <div class="form-input-wide">
                        <div class="form-buttons-wrapper form-buttons-auto jsTest-button-wrapperField">
                            <input type="submit" class="btn btn-primary" name="btn_submit" style="width: 100px; height: 40px;" value="Lưu"/>
                            &nbsp;&nbsp;&emsp;
                            <input class="btn btn-dark" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Huỷ bỏ" style="width: 100px; height: 40px;" />
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="style/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>
</html>