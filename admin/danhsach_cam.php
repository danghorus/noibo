<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cấu hình Camera</title>
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
                    <form action='danhsach_cam.php' method='POST'>
                        
                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">Yêu cầu</h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách Camera</li>
                        </ol>
                        <form>
                            <button type="button" onclick="location.href='lienket_cam.php';" style=" height: 40px; background-color: #29A9FF; border: 0px; border-radius: 5px; width: 80px; color: white; float: right;">Thêm</button>
                        </form>
                        <br>
                        <br>
                        <table class="table table-bordered" id="themcam">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width=3%>STT</th>
                                    <th width=3%>ID</th>
                                    <th width=8%>Dòng Camera</th>
                                    <th width=10%>Tên gợi nhớ</th>
                                    <th width=10%>Chi nhánh</th>
                                    <th width=10%>Loại ghi nhận</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td>{{ forloop.counter }}</td>
                                    <td>{{Cam.CamId}}</td>
                                    <td>{{Cam.DongCam}}</td>
                                    <td>{{Cam.Tengoinho}}</td>
                                    <td>{{Cam.Chinhanh}}</td>
                                    <td>{{Cam.Loaighinhan}}</td>
                                </tr>
                                
                                </tbody>
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