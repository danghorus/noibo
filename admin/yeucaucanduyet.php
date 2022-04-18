<?php
	session_start(); 
 ?>
<?php require_once("includes/ketnoidb.php"); ?>

<?php include 'includes/session.php';?>

<?php
	$sql = "SELECT * FROM yeucau";
	$query = mysqli_query($conn,$sql);
?> 
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
                    <form action='yeucaucanduyet.php' method='POST'>
                        
                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">Yêu cầu</h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Yêu cầu</li>
                        </ol>
                        <form >
                            <button type="button" id="yeucaucanduyet1" onclick="location.href='yeucaucanduyet.php';">Yêu cầu cần duyệt</button>
                            <button type="button" id="daduyet" onclick="location.href='daduyet.php';">Đã duyệt</button>
                            <button type="button" id="tuchoi" onclick="location.href='tuchoi.php';">Từ chối</button>
                            <button type="button" id="taoyeucau" data-bs-toggle="dropdown" aria-expanded="false" style="width:120px;height:40px;background-color:#2285b3;border:0px;border-radius:5px;color:#ffffff ;float: right;">Tạo yêu cầu</button>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="taoyeucau">
                                    <li><a class="dropdown-item" href="dmvs.php">Đi muộn về sớm</a></li>
                                    <li><a class="dropdown-item" href="nghiphep.php">Nghỉ phép</a></li>
                                    <li><a class="dropdown-item" href="nghiviec.php">Nghỉ việc </a></li>
                                    
                                </ul>          
                        </form>
                    <br>
                    <br>
                        <table class="table table-bordered" id="yeucaub">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width=3% >STT</th>
                                    <th width=3%>ID</th>
                                    <th width=8%>Người yêu cầu</th>
                                    <th width=10%>Thông tin</th>
                                    <th width=10%>Ngày giờ bắt đầu</th>
                                    <th width=10%>Ngày giờ kết thúc</th>
                                    <th width=15%>Lý do</th>     
                                    <th width=10%>Ngày gửi</th>
                                    <th width=8%>Người duyệt</th>
                                    <th width=10%>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php 
                                    while ( $data = mysqli_fetch_array($query) ) {
                                        $i = 1;
                                        $yeucauid = $data['yeucauid'];
                                ?>
                                <tr>
                                     <td><?php echo $i; ?></td>
                                    <td><?php echo $data['yeucauid']; ?></td>
                                    <td><?php echo $data['nguoiyeucau']; ?></td>
                                    <td><?php echo $data['loaiyeucau']; ?></td>
                                    <td><?php echo $data['giotu']."-".$data['ngaytu']; ?></td>
                                    <td><?php echo $data['gioden']."-".$data['ngaytu']; ?></td>
                                    <td><?php echo $data['lydo']; ?></td>
                                    <td><?php echo $data['ngaygui']; ?></td>
                                    <td><?php echo $data['nguoiduyet']; ?></td>
                                    <td> <button type="submit" value="" name="duyet" style="background-color:rgb(255, 255, 255); border:0px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="rgb(15, 206, 164)" class="bi bi-check2-circle"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                    </button>
                                        &nbsp;
                                        <button type="submit1" value="" name="tuchoi" style="background-color:white; border:0px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="rgb(180, 37, 37)" class="bi bi-x-circle"
                                                viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <?php 
                                    $i++;
                                    }
                                ?>
                                
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