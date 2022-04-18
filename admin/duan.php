<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dự án</title>
    <link href="style/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body action="" method="post" enctype="multipart/form-data">
    

     <?php include_once('includes/header.php');?>  

    <?php include_once('includes/sidebar.php');?>
    
        <div id="layoutSidenav_content" style=" margin-top:-20px;">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dự Án</h1>
                        <a href="themduan.php" style="float: right; margin-right:10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder-plus" margin-right="10px;"color="#5da3af" viewBox="0 0 16 16">
                                <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </a>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Dự án</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th width=3% style="text-align: center;">STT</th>
                                            <th width=15% style="text-align: center;"><a href="#" >Dự án</a></th>
                                            <th width=10% style="text-align: center;">Tỉ lệ hoàn thành</th>
                                            <th width=6% style="text-align: center;">Ngày bắt đầu</th>
                                            <th width=6% style="text-align: center;">Ngày kết thúc</th>
                                            <th width=10% style="text-align: center;">Số lượng công việc</th>
                                            <th width=10% style="text-align: center;">Trạng thái dự án</th>
                                            <th width=10% style="text-align: center;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <tr>
                                            <td></td>
                                            <td> <input type="text" class="form-control" ></td>
                                            <td> 
                                                <input type="range" class="range" value="0" min="0" max="100" oninput="this.nextElementSibling.value = this.value" />
                                                <style>
                                                    html input[type="range"] {
                                                        outline: 0;
                                                        border: 0;
                                                        border-radius: 50px;
                                                        width: 100%;
                                                        max-width: 100%;
                                                        margin: 4px 0 0px;
                                                        transition: box-shadow 0.2s ease-in-out;
                                                    }
                                                    @media screen and (-webkit-min-device-pixel-ratio: 0) {
                                                        html input[type="range"] {
                                                            overflow: hidden;
                                                            height: 30px;
                                                            -webkit-appearance: none;
                                                            background-color: #ddd;
                                                        }
                                                        html input[type="range"]::-webkit-slider-runnable-track {
                                                            height: 30px;
                                                            -webkit-appearance: none;
                                                            color: #444;
                                                            transition: box-shadow 0.2s ease-in-out;
                                                        }
                                                        html input[type="range"]::-webkit-slider-thumb {
                                                            width: 30px;
                                                            -webkit-appearance: none;
                                                            height: 30px;
                                                            cursor: ew-resize;
                                                            background: #fff;
                                                            box-shadow: -340px 0 0 320px #1597ff, inset 0 0 0 30px #1597ff;
                                                            border-radius: 50%;
                                                            transition: box-shadow 0.2s ease-in-out;
                                                            position: relative;
                                                        }
                                                        html input[type="range"]:active::-webkit-slider-thumb {
                                                            background: #fff;
                                                            box-shadow: -340px 0 0 320px #1597ff, inset 0 0 0 3px #1597ff;
                                                        }
                                                    }                                                   
                                                </style>
                                            </td>
                                            <td> 
                                            <input type="date" class="form-control" id="tu"></td>
                                            <script>
                                                document.getElementById('tu').value = new Date().toISOString().substring(0, 10);
                                            </script>
                                            <td> <input type="date" class="form-control" id="den"></td>
                                            <script>
                                                document.getElementById('den').value = new Date().toISOString().substring(0, 10);
                                            </script>
                                            <td> <input type="text" class="form-control" value="2550" style="text-align: center;"></td>
                                            <td>
                                            <select type="options" class="form-control" style="text-align: center;">
                                                <option selected>Lựa chọn</option>
                                                <option style="color: rgb(252, 34, 34);">Quá hạn</option>
                                                <option style="color: rgb(98, 219, 148);">Đã xong</option>
                                                <option style="color: rgb(240, 194, 69);">Đang làm</option>
                                            </select>
                                            </td>
                                            <td> 
                                                <button type="submit" class="btn" value={{Duan.DuanId}} name="update" href="suaduan.php">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-folder-symlink"color="#5da3af" viewBox="0 0 16 16">
                                                        <path d="m11.798 8.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z" />
                                                        <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                                    </svg>
                                                </button>
                                                <button type="submit1" class="btn" value={{Duan.DuanId}} name="delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-folder-minus" color="red"  viewBox="0 0 16 16">
                                                        <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                                        <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 1 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <script src="style/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="style/js/datatables-simple-demo.js"></script>
</body>

</html>