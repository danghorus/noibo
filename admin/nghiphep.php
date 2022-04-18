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
        $hinhthucnghiphep = $_POST["hinhthucnghiphep"];
        $giotu = $_POST["giotu"];
		$ngaytu = $_POST["ngaytu"];
        $gioden = $_POST["gioden"];
        $ngayden = $_POST["ngayden"];
		$lydo = $_POST["lydo"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			$sql = "INSERT INTO yeucau(loaiyeucau ,nguoiyeucau, hinhthucnghiphep, giotu, ngaytu, gioden, ngayden, lydo, ngaygui) 
            VALUES ( '$loaiyeucau', '$nguoiyeucau', '$hinhthucnghiphep', '$giotu', '$ngaytu', '$gioden', '$ngayden', '$lydo', now())";
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
<body>
    <form class="form" action="" method="post" enctype="multipart/form-data" name="form" id="form_yecaunghi" accept-charset="utf-8" style="border:2px;">
        
        <div role="main" class="form-all">
            <style>
                .form-all:before {
                    background: none;
                }
            </style>
            <ul class="form-section page-section" style="background-color:#eaeeee;border-radius:10px;">
                <li id="cid_34" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-large">
                        <input class="" name="loaiyeucau" id="loaiyeucau" value="Nghỉ phép" style="font-size:35px; border:0px; background-color:#eaeeee; margin-left:30%;" readonly>
                    </div>
                </li>
                <li class="form-line ">
                    <label class="form-label form-label-top form-label-auto"> Người yêu cầu </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" name="nguoiyeucau" class="form-textbox" style="width:310px" data-masked="true" id="nguoiyeucau"/>
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2">
                    <label class="form-label form-label-top form-label-auto">Hình thức nghỉ phép</label>
                    <div class="form-input-wide">
                        <select class="form-control" name="hinhthucnghiphep" id="hinhthucnghiphep">
                            <option disabled selected value>Lựa chọn</option>
                            <option value="Tiêu chuẩn">Tiêu chuẩn</option>
                            <option value="Không lương">Không lương</option>
                        </select>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2">
                    <label class="form-label form-label-top form-label-auto">Loại nghỉ phép</label>
                    <div class="form-input-wide">
                        <select class="form-control" name="payFor" id="payFor">
                            <option selected disabled value>Lựa chọn</option>
                            <option value="trongngay">Trong ngày</option>
                            <option value="nhieungay">Nhiều ngày</option>
                        </select>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Thời gian bắt đầu </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="time" name="giotu" id="" type="text" class="form-textbox" style="width:310px"
                                value="08:00" />
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1" >
                    <label class="form-label form-label-top form-label-auto"> Thời gian kết thúc </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="time" name="gioden" id="" type="text" class="form-textbox" style="width:310px"
                                value="17:00" />
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto">Ngày </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="date" name="ngaytu" id="nhieungaybd" type="text" class="form-textbox" style="width:310px" />
                            <script>
                                document.getElementById('nhieungaybd').value = new Date().toISOString().substring(0, 10);
                            </script>
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1" style="display: none;" id="ngayden">
                    <label class="form-label form-label-top form-label-auto"> Ngày </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="date" name="ngayden" id="nhieungaykt" type="text" class="form-textbox" style="width:310px" />
                            <script>
                                document.getElementById('nhieungaykt').value = new Date().toISOString().substring(0, 10);
                            </script>
                        </span>
                    </div>
                </li>
                <script>
                    document.getElementById('payFor').addEventListener("change", function (e) {
                        if (e.target.value === 'nhieungay') {
                            document.getElementById('ngayden').style.display = 'block';
                        } else{
                            document.getElementById('ngayden').style.display = 'none';
                        }
                    });
                </script>
                
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    </form>
</body>
</html>