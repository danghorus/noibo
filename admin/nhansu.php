<?php
	session_start(); 
 ?>
<?php require_once("includes/ketnoidb.php"); ?>

<?php include 'includes/session.php';?>

<?php
	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn,$sql);
?>
<?php
	if (isset($_GET["manhanvien_delete"])) {
		$sql = "DELETE FROM users WHERE manhanvien = ".$_GET["manhanvien_delete"];
		mysqli_query($conn,$sql);
	}
	
?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nhân sự</title>
        <link href="style/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    
    </head>
<body action="" method="post" enctype="multipart/form-data">
    

     <?php include_once('includes/header.php');?>  

        <?php include_once('includes/sidebar.php');?>
    
           <div id="layoutSidenav_content" style=" margin-top:-20px;">
                <main>
                    <form action='nhansu.php' method='POST'>
                        
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Nhân sự</h1>
                                    <a href="themnhanvien.php" style="float: right; margin-right:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill"
                                        viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg></a>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Nhân sự</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th width=3% style="text-align: center;">STT</th>
                                                <th width=5% style="text-align: center;">MNV</th>
                                                <th width=8% style="text-align: center;">Ảnh đại diện</th>
                                                <th width=10% style="text-align: center;">Họ và tên</th>
                                                <th width=8% style="text-align: center;">Số điện thoại</th>
                                                <th width=8% style="text-align: center;">Email</th>
                                                <th width=8% style="text-align: center;">Ngày sinh</th>
                                                <th width=6% style="text-align: center;">Bộ phận</th>
                                                <th width=6% style="text-align: center;">Chức danh</th>
                                                <th width=6% style="text-align: center;">Hoạt động</th>
                                                <th width=8% style="text-align: center;">Quyền truy cập</th>
                                                <th width=10% style="text-align: center;">Thao tác</th>
                                            </tr>
                                        </thead> 
                                        <tbody style="text-align: center;">
                                            <?php 
                                                while ( $data = mysqli_fetch_array($query) ) {
                                                    $i = 1;
                                                    $manhanvien = $data['manhanvien'];
                                            ?>
                                                <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $data['manhanvien'] ?></td>
                                                        <td><img style="width:35px; height:35px;border-radius:50%;" src="Avatar/<?php echo $data['anhdaidien'] ?>" /></td>
                                                        <td><?php echo $data['hovaten']; ?></td>
                                                        <td><?php echo $data['sodienthoai']; ?></td>
                                                        <td><?php echo $data['email']; ?></td>
                                                        <td><?php echo $data['ngaysinh']; ?></td>
                                                        <td><?php echo $data['bophan']; ?></td>
                                                        <td><?php echo $data['chucdanh']; ?></td>  
                                                        <td><?php echo ($data['khoanhanvien'] == 1) ? "Không hoạt động" : "Hoạt động"; ?></td>
			                                            <td>
                                                            <?php 
                                                                if ($data['quyentruycap'] == 0){
                                                                    echo "Nhan vien";
                                                                } elseif ($data['quyentruycap'] == 1){
                                                                    echo "Leader";
                                                                }elseif ($data['quyentruycap'] == 2){
                                                                    echo "Quản lý";
                                                                }else{
                                                                    echo "Giám đốc";
                                                                }
                                                            ?>
                                                        </td> 
                                                        <td>
                                                            <a href="suanhansu.php?manhanvien=<?php echo $manhanvien;?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" color="rgb(68, 162, 224)"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <a href="nhansu.php?manhanvien_delete=<?php echo $manhanvien;?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-dash" color="rgb(184, 35, 35)"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                                    <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                                                </svg>
                                                            </a>
                                                        </td>

                                                </tr> 
                                            <?php 
                                                    $i++;
                                                }
                                            ?>          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                             
                    </form>
                </main>
           </div>
        <script src="style/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
        <script src="style/js/datatables.js"></script>
        <script src="style/js/datatables-simple-demo.js"></script>
</body>

</html>
