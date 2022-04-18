<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Cài đặt chấm công</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="style/css/styles.css " rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body action="" method="post" enctype="multipart/form-data">
    

    <?php include_once('includes/header.php');?>  

    <?php include_once('includes/sidebar.php');?>
    
        <div id="layoutSidenav_content" style=" margin-top:-20px;">
            <main>
                <form action='caidatchamcong.php' method='POST'>
                        
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Cài đặt chấm công</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="chamcong.php">Chấm công</a></li>
                        <li class="breadcrumb-item active">Cài đặt chấm công</li>
                    </ol>
                        <form>
                            <button type="button" onclick="location.href='caidatchamcong.php';"
                                style="height: 40px; background-color: #F5F5F5; border: 0px; border-radius: 5px; width: 250px; color: rgb(61, 155, 111);">
                            Chấm công bằng Camera AI</button>
                            <button type="button" id="daduyet" onclick="location.href='chamcongweb.php';" 
                                style=" height: 40px; background-color: #29A9FF; border: 0px; border-radius: 5px; width: 250px; color: white;">
                            Chấm công trên Website</button>
                            <button type="submit" class="btn btn-primary " onclick="saveSearch()" style="height:40px; background-color: #29A9FF; float: right; border-radius:10px; border:0; ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </button>
                            <input list="your-choices" id="search_input" placeholder="Search user..."
                                style="height:40px; float:right; border-radius:7px; border: 1px; background-color:rgb(245, 249, 253);">
                            <datalist id="your-choices">
                                <option value="Bùi Ngọc Đăng">
                                <option value="Doãn Thế Cường">
                                <option value="Nguyễn Thị Vinh">
                                <option value="Đặng Đình Nam">
                                <option value="Đỗ Văn Minh">
                                <option value="Đặng Đình Nam">
                                <option value="Đỗ Văn Minh">
                            </datalist>
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
                                <th width=8%>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                          
                            <tr id="maintr" >
                                <td>{{ forloop.counter }}</td>
                                <td>{{NhanVien.EmployeeId}}</td>
                                <td> <img src={{NhanVien.Avatar}} alt=" " style="width: 50px; height: 50px; border-radius: 50%;" ></td>
                                <td>{{NhanVien.EmployeeName}}</td>
                                <td>{{NhanVien.Department}}</td>
                                <td>
                                     <button type="submit1" class="btn btn-danger" value={{NhanVien.EmployeeId}} name="delete">Xoá</button>
                                </td>
                                </tr>
                        
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>