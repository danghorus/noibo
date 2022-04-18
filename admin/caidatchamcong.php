
<?php
	session_start(); 
 ?>
<?php require_once("includes/ketnoidb.php"); ?>

<?php include 'includes/session.php';?>

<?php
	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn,$sql);
?><!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cài đặt chấm công</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <link href="style/css/styles.css " rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body action="" method="post" enctype="multipart/form-data">
    

     <?php include_once('includes/header.php');?>  

    <?php include_once('includes/sidebar.php');?>
    
        <div id="layoutSidenav_content" style=" margin-top:-20px;">
            <main>
                <form  method='POST'>
                        
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Cài đặt chấm công</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="chamcong.php">Chấm công</a></li>
                        <li class="breadcrumb-item active">Cài đặt chấm công</li>
                    </ol>
                        <form>
                            <button type="button" onclick="location.href='caidatchamcong.php';" style=" height: 40px; background-color: #29A9FF; border: 0px; border-radius: 5px; width: 250px; color: white;">Chấm công bằng Camera AI</button>
                            <button type="button" onclick="location.href='chamcongweb.php';" style="height: 40px; background-color: #F5F5F5; border: 0px; border-radius: 5px; width: 250px; color: rgb(61, 155, 111);">Chấm công trên Webiste</button>
                            <button type="button" onclick="location.href='danhsach_cam.php';"
                                style="height: 40px; background-color: rgb(61, 155, 111); border: 0px; border-radius: 5px; width: 170px; color:#ffffff ; float: right;">Danh sách Camera</button>
                            <!--<button type="button" onclick="location.href='#';" style=" height: 40px; background-color: #29A9FF; border: 0px; border-radius: 5px; width: 80px; color: white; float: right;">Thêm</button>-->
                        </form>
                    <br>
                    <br>
                        

                    <table class="table table-bordered" id="yeucaub">
                        <thead>
                            <tr style="text-align: center;">
                                <th width=3%>STT</th>
                                <th width=5%>Mã nhân viên</th>
                                <th width=10%>Ảnh đại diện</th>
                                <th width=10%>Họ và tên</th>
                                <th width=10%>Bộ phận</th>
                                <th width=10%>Hình ảnh nhận diện</th>
                                <th width=8%>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                        <?php 
                            while ( $data = mysqli_fetch_array($query) ) {
                                    $i = 1;
                                    $manhanvien = $data['manhanvien'];
                        ?>
                            <tr id="maintr" >
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['manhanvien'] ?></td>
                                <td><img style="width:35px; height:35px;border-radius:50%;" src="Avatar/<?php echo $data['anhdaidien'] ?>" /></td>
                                <td><?php echo $data['hovaten']; ?></td>
                                <td><?php echo $data['bophan']; ?></td>
                                <td><img style="width:35px; height:35px;border-radius:50%;" src="Avatar/<?php echo $data['anhdaidien'] ?>" /></td>
                                <td>
                                    <button type="button" class="btn btn-primary"  value={{NhanVien.EmployeeId}} name="update" onclick="location.href='idface.php';">Sửa ảnh</button>
                                </td> 
                            </tr>
                        <?php 
                            $i++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="style/js/scripts.js"></script>
</body>

</html>