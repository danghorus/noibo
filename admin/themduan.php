<!DOCTYPE >

<html class="supernova">
<head>
    <title>Thêm dự án</title>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f7ed99c2c2c7240ba580251" />
    <link href="{%static  'css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <form class="form" action="" method="post" enctype="multipart/form-data" name="form" id="form" accept-charset="utf-8" style="border:2px;  padding: 75px 0px 0px 0px;">
        
        <div role="main" class="form-all">
            <style>
                .form-all:before {
                    background: none;
                }
            </style>
            <ul class="form-section page-section" style="background-color:#cfd0d3; border-radius:10px;border:0px;" >
                <li id="cid_34" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-large">
                        <div class="header-text httal htvam">
                            <h1 id="header_34" class="form-header" data-component="header" style="text-align:center; ">Nhập thông tin</h1>
                        </div>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Tên dự án </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" name="name" class="form-textbox" style="width:310px" data-masked="true" value="{{employee.EmployeeName}}" id="name"/>
                        </span>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-2" >
                    <label class="form-label form-label-top form-label-auto" > Mã dự án</label>
                    <div class="form-input-wide" >
                        <input type="text" class="form-textbox" style="width:310px" size="310" value="{{employee.EmployeeId}}" data-component="textbox" disabled/>
                    </div>
                </li>
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Ngày bắt đầu </label>
                    <div class="form-input-wide" >
                        <span class="form-sub-label-container" style="vertical-align:top" >
                            <input type="date" name="ngaybatdau" id="ngaybatdau" type="text" class="form-textbox" style="width:310px" />
                            <script>
                                document.getElementById('ngaybatdau').value = new Date().toISOString().substring(0, 10);
                            </script>
                        </span>
                    </div>
                </li>  
                <li class="form-line form-line-column form-col-1">
                    <label class="form-label form-label-top form-label-auto"> Ngày hoàn thành dự kiến </label>
                    <div class="form-input-wide">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="date" name="ngayketthuc" id="ngayketthuc" type="text" class="form-textbox" style="width:310px" />
                            <script>
                                document.getElementById('ngayketthuc').value = new Date().toISOString().substring(0, 10);
                            </script>
                        </span>
                    </div>
                </li>
                <li class="form-line" >
                    <div class="form-input-wide">
                        <div class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                            <a class="small" href="nhansu.php">
                                <button type="submit" class="btn btn-primary" style="width: 100px; height: 40px;">Lưu</button> &nbsp;&nbsp;
                                                <input class="btn btn-dark" action="action" onclick="window.history.go(-1);return false;" type="submit" value="Huỷ bỏ" style="width: 100px; height: 40px;" />
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rossorigin="anonymous"></script>
    <script src="style/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>