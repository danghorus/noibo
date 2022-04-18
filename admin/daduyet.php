<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Yêu cầu</title>
        <link href="style/css/styles.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body action="" method="post" enctype="multipart/form-data">
        
    
        <?php include_once('includes/header.php');?> 

        <?php include_once('includes/sidebar.php');?>
        
            <div id="layoutSidenav_content" style=" margin-top:-20px;">
                <main>
                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">Yêu cầu</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Yêu cầu</li>
                        </ol>
                        <form >
                            <button type="button" id="yeucaucanduyet" onclick="location.href='yeucaucanduyet.php';">Yêu cầu cần duyệt</button>
                            <button type="button" id="daduyet1" onclick="location.href='daduyet.php';">Đã duyệt</button>
                            <button type="button" id="tuchoi" onclick="location.href='tuchoi.php';">Từ chối</button>
                            <button type="button" id="taoyeucau" data-bs-toggle="dropdown" aria-expanded="false"
                                style="width:120px;height:40px;background-color:#2285b3;border:0px;border-radius:5px;color:#ffffff ;float: right;">Tạo yêu cầu</button>
                            <ul class="dropdown-menu dropdown-menu" aria-labelledby="taoyeucau">
                                <li><a class="dropdown-item" href="dmvs.php">Đi muộn về sớm</a></li>
                                <li><a class="dropdown-item" href="nghiphep.php">Nghỉ phép</a></li>
                                <li><a class="dropdown-item" href="nghiviec.php">Nghỉ việc </a></li>
                            </ul>
                        </form>
                    <br>
                        <table class="table table-bordered" id="yeucaub">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width=3%>STT</th>
                                    <th width=3%>ID</th>
                                    <th width=8%>Người yêu cầu</th>
                                    <th width=10%>Thông tin</th>
                                    <th width=10%>Ngày giờ bắt đầu</th>
                                    <th width=10%>Ngày giờ kết thúc</th>
                                    <th width=15%>Lý do</th>
                                    <th width=10%>Ngày gửi</th>
                                    <th width=8%>Người duyệt</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>   
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
    </body>
</html>
