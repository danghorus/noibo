<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Chỉnh sửa thông tin nhân viên</title>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f7ed99c2c2c7240ba580251" />
    <link href="style/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body action="" method="post" enctype="multipart/form-data">
    

     <?php include_once('includes/header.php');?>  

        <?php include_once('includes/sidebar.php');?>
    
        <div id="layoutSidenav_content" style=" margin-top:-20px;">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Cài đặt chấm công</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="chamcong.php">Chấm công</a></li>
                        <li class="breadcrumb-item"><a href="caidatchamcong">Cài đặt chấm công</a></li>
                        <li class="breadcrumb-item active">Sửa ảnh nhận diện Camera AI</li>
                    </ol>
                    <center>
                    <form  method='POST'enctype="multipart/form-data" name="form" id="form" accept-charset="utf-8" style="border:2px;">
                            
                    <ul class="form-section page-section" style="background-color:#eaeeee;border-radius:10px; width:30%;">
                        <li id="cid_34" class="form-input-wide" data-type="control_head">
                            <div class="form-header-group  header-large">
                                <div class="header-text httal htvam">
                                    <h1 id="header_34" class="form-header" data-component="header" style="text-align:center; ">
                                    Cập nhật ảnh nhận diện
                                    </h1>
                                </div>
                            </div>
                        </li>
                        <li class="form-line form-line-column form-col-1">
                            <label class="form-label form-label-top form-label-auto"> Họ và tên </label>
                            <div class="form-input-wide">
                                <span class="form-sub-label-container" style="vertical-align:top">
                                    <input type="text" name="name" class="form-textbox" style="width:310px" data-masked="true" value="{{employee.EmployeeName}}" id="name" disabled/>
                                </span>
                            </div>
                        </li>
                        <li class="form-line form-line-column form-col-2" >
                            <label class="form-label form-label-top form-label-auto" > Mã nhân viên</label>
                            <div class="form-input-wide" >
                                <input type="text" class="form-textbox" style="width:310px" size="310" value="{{employee.EmployeeId}}" data-component="textbox" disabled/>
                            </div>
                        </li>
                        <li class="form-line" >
                            <div class="avatar-wrapper1">
                                <img class="profile-pic" src="/MEDIA/{{employee.Image}}" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" name =Image type="file" accept="image/*" />
                            </div>   
                        </li>
                        <li class="form-line" >
                            <div class="form-input-wide">
                                <div class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                                    <a>
                                        <input type="submit" class="btn btn-primary" style="width: 100px; height: 40px;" value="Lưu"/> 
                                    </a>
                                    &nbsp;&nbsp;&emsp;
                                    <a>
                                        <input class="btn btn-dark" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Huỷ bỏ" style="width: 100px; height: 40px;" />
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </center>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="style/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>