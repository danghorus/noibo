<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Chấm công</title>

    <link href="style/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <script
        src="//maps.googleapis.com/maps/api/js?key=AIzaSyDn9EvbhsomO8uBqckF5_EsyusVuhlgbMQ&amp;libraries=places&amp;language=vi&amp;region=VN"></script>
    <script type="text/javascript" charset="UTF-8"
        src="https://maps.googleapis.com/maps-api-v3/api/js/48/7a/intl/vi_ALL/common.js"> </script>
    <script type="text/javascript" charset="UTF-8"
        src="https://maps.googleapis.com/maps-api-v3/api/js/48/7a/intl/vi_ALL/util.js"></script>

</head>
<body action="" method="post" enctype="multipart/form-data">
    

    <?php include_once('includes/header.php');?> 
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion"
                style="background-color:#f4f5f7; color: #5e6e82;">
                <div class="sb-sidenav-menu" style=" color: #5e6e82;">
                    <div class="nav" style=" color: #5e6e82;">
                        <!--<div class="sb-sidenav-menu-heading">Core</div>-->
                        <a class="nav-link" href="trangchu.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg></div>
                            Trang chủ
                        </a>
                        <a class="nav-link" href="nhansu.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg></div>
                            Nhân sự
                        </a>
                        <a class="nav-link" href="chamcong.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                                    <path
                                        d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z" />
                                    <path
                                        d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z" />
                                    <path
                                        d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z" />
                                    <path
                                        d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z" />
                                    <path
                                        d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z" />
                                </svg></div>
                            Chấm công
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                            style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                </svg></div>
                            Giao việc
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion" style="color: #5e6e82;">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="vieccuatoi.php" style="color: #5e6e82;">
                                    <div class="sb-nav-link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                        </svg>
                                    </div>
                                    Việc của tôi
                                </a>
                                <a class="nav-link" href="duan.php" style="color: #5e6e82;">
                                    <div class="sb-nav-link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                                            <path
                                                d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z" />
                                            <path
                                                d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z" />
                                        </svg>
                                    </div>
                                    Dự án
                                </a>
                            </nav>
                        </div>
                        </a>
                        <a class="nav-link" href="yeucaucanduyet.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-calendar4-range" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                    <path
                                        d="M9 7.5a.5.5 0 0 1 .5-.5H15v2H9.5a.5.5 0 0 1-.5-.5v-1zm-2 3v1a.5.5 0 0 1-.5.5H1v-2h5.5a.5.5 0 0 1 .5.5z" />
                                </svg></div>
                            Yêu cầu
                        </a>
                        <a class="nav-link" href="baocao.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
                                </svg></div>
                            Báo cáo
                        </a>
                        <a class="nav-link" href="tinhluong.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                </svg></div>
                            Lương công việc
                        </a>
                        <a class="nav-link" href="tinhthuong.php" style="color: #5e6e82;">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                    <path
                                        d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                </svg></div>
                            Thưởng dự án
                        </a>
                    <center>
                   <input type="button" onclick="time(), changeColor(this)" id="btncheck"
                    style="width:65px; height:65px; margin-top:100%; border-radius: 50%;background-color:#4ab4db; border:0px; color:white; font-size:11px;" value="Check In" />
                    </center><br>
                    <ol class="breadcrumb">
                        &ensp;<li class="breadcrumb">Thời gian check In: </li> &ensp;
                        <li class="breadcrumb" id="datecheck"></li>
                    </ol>
                    <ol class="breadcrumb mb-4">
                        &ensp;<li class="breadcrumb">Thời gian check Out: </li> &ensp;
                        <li class="breadcrumb" id="datecheck"></li>
                    </ol>
                        <script>
                           function time() {
                                var currentdate = new Date();
                                var timenow = + ("0" + currentdate.getHours()).slice(-2) + ":"
                                    + ("0" + currentdate.getMinutes()).slice(-2) + ":"
                                    + ("0" + currentdate.getSeconds()).slice(-2);
                                document.getElementById("datecheck").innerHTML =timenow;
                                let url = "chamcong.php"
                                let xhr = new XMLHttpRequest();
                                xhr.open("POST", url,true);
                                xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
                                var date = currentdate.getFullYear()+'-'+(currentdate.getMonth()+1)+'-'+currentdate.getDate();
                               // var data = JSON.stringify()
                                var data={"time":timenow,"date":date}
                                var data = JSON.stringify(data)
                                //var data = JSON.stringify(data)
                                xhr.send(data);
                            }
                        </script>
                        <script>
                            function changeColor (htmlEl) {
                            htmlEl.style.backgroundColor="#c61313";
                            }
                        </script>   
                        <script>
                            document.getElementById("btncheck").addEventListener(
                                    "click",
                                    function (event) {
                                        if (event.target.value === "Check In") {
                                            event.target.value = "Check Out";
                                            
                                        }
                                        else
                                        {
                                            event.target.value = "Check Out"
                                        }
                                    },
                                    false
                                );
                        </script>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content" style=" margin-top:-20px;">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4" style="text-align:center;">Bảng chấm công</h1>
                <button type="button" style="float:right; color:#999da1; border: 0px; background-color:rgb(255, 255, 255);margin-right: 10px; margin-top:-50px;" onclick="location.href='caidatchamcong.php';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-wrench-adjustable"
                        viewBox="0 0 16 16">
                        <path d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                        <path
                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                    </svg>
                </button>
                
                <table id="datatablesSimple">
                    <thead >
                        <tr>
                            <th style="width:21%; text-align:center; font-size:13px;">Nhân viên</th>
                            <th style="width:3%; text-align:center;padding-left:15px;">01</th>
                            <th style="width:3%; text-align:center;">02</th>
                            <th style="width:3%; text-align:center;">03</th>
                            <th style="width:3%; text-align:center;">04</th>
                            <th style="width:3%; text-align:center;">05</th>
                            <th style="width:3%; text-align:center;">06</th>
                            <th style="width:3%; text-align:center;">07</th>
                            <th style="width:3%; text-align:center;">08</th>
                            <th style="width:3%; text-align:center;">09</th>
                            <th style="width:3%; text-align:center;">10</th>
                            <th style="width:3%; text-align:center;">11</th>
                            <th style="width:3%; text-align:center;">12</th>
                            <th style="width:3%; text-align:center;">13</th>
                            <th style="width:3%; text-align:center;">14</th>
                            <th style="width:3%; text-align:center;">15</th>
                            <th style="width:3%; text-align:center;">16</th>
                            <th style="width:3%; text-align:center;">17</th>
                            <th style="width:3%; text-align:center;">18</th>
                            <th style="width:3%; text-align:center;">19</th>
                            <th style="width:3%; text-align:center;">20</th>
                            <th style="width:3%; text-align:center;">21</th>
                            <th style="width:3%; text-align:center;">22</th>
                            <th style="width:3%; text-align:center;">23</th>
                            <th style="width:3%; text-align:center;">24</th>
                            <th style="width:3%; text-align:center;">25</th>
                            <th style="width:3%; text-align:center;">26</th>
                            <th style="width:3%; text-align:center;">27</th>
                            <th style="width:3%; text-align:center;">28</th>
                            <th style="width:3%; text-align:center;">29</th>
                            <th style="width:3%; text-align:center;">30</th>
                            <th style="width:3%; text-align:center;">31</th>
                        </tr>      
                    </thead>
                    <tbody style="font-size:12px; text-align:center;">
                    
                        <tr >
                            <td style="padding-top:1.5%;">Bùi Ngọc Đăng</td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>        
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                            <td>
                                <div>-:-</div>-<div>-:-</div>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>   
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<script src="style/js/scripts.js"></script>
<script src="style/js/datatables-simple-demo.js"></script>
<script src="style/js/datatables.js"></script>
</body>
</html>
