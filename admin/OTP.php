<!DOCTYPE html>

<html lang="en">

<head>



    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="style/css/styles.css " rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <script language="javascript">
                        var otp_from_back ="{{request.session.data}}"
                        //  var test =window.location.href
                        //  var URLSearchParamsa = new URLSearchParams(window.location.href); 
                        //  console.log(URLSearchParamsa);
                        </script>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Mã xác nhận</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="" onsubmit="return verify_otp()">
                                             
                                            <div id="verify_text_div"></div>
                                            <p style="text-align: center; color:#d1d0d0">{{request.session.data}} </p>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputOTP" type="text" placeholder="..."/>
                                                <label for="inputEmail">Mã xác nhận</label>
                                            </div>
                                            <div class="small mb-3 text-muted">Vui lòng nhập mã xác thực đã được gửi tới email của bạn.</div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input action="action" onclick="window.history.go(-1); return false;" type="button" value="Quay lại màn hình đăng nhập"
                                                style="border:0px; color:blue; background-color:#ffffff;" >
                                                <input class="btn btn-primary" type="submit" value="Đồng ý"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script> 
            function verify_otp(){
                var user_otp=document.getElementById("inputOTP").value;
                    if (user_otp==otp_from_back){
                        document.getElementById("verify_text_div").style.color="green";            
                        document.getElementById("verify_text_div").innerHTML="Mã xác nhận chính xác!";
                        document.getElementById("otp_div").style.display="none";
                        document.getElementById("form_div").style.display="block";
                        return true
                    }
                    else{
                        document.getElementById("verify_text_div").style.color="red";
                        document.getElementById("verify_text_div").innerHTML="Mã xác nhận không đúng. Vui lòng kiểm tra lại!";
                        return false
                    }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>