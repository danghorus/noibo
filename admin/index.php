<?php
session_start();
error_reporting(0);
include('includes/ketnoidb.php');

if(isset($_POST['login']))
  {
    $users=$_POST['email'];
    $password=($_POST['password']);
    $query=mysqli_query($con,"select manhanvien from users where  email='$users' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['usersid']=$ret['manhanvien'];
     header('location:trangchu.php');
    }
    else{
    $msg="Tên đăng nhập hoặc mật khẩu không đúng. Xin vui lòng thử lại.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="style/css/styles.css " rel="stylesheet" />
        <link href="./css/theme.css " rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="animsition">
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h2 class="text-center font-weight-light my-4">ĐĂNG NHẬP</h2>
                                    </div>
                                    <div class="card-body">
                                        <p style="font-size:16px; color:red" align="center">
                                            <?php 
                                                if($msg){
                                                    echo $msg;
                                                 }  
                                            ?> 
                                        </p>
                                        <div class="login-form">
                                            <form action="" method="post" name="login">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="username" type="text" required="true" placeholder="admin" />
                                                    <label for="username">Tên đăng nhập</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="password" type="password" required="true" placeholder="Mật khẩu" />
                                                    <label for="password">Mật khẩu</label>
                                                </div>
                                                <div class="login-checkbox">
                                                    <label>
                                                        <a href="forgot-password.php"> Quên mật khẩu</a>
                                                    </label>
                                                </div>
                                                <center>
                                                <button class="btn btn-primary" type="submit" name="login">Đăng nhập</button>
                                            </form>                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="style/js/scripts.js"></script>
    <script src="./js/main.js"></script>

</body>

</html>
