        <nav class="sb-topnav navbar navbar-expand navbar" style="background-color:#f4f5f7;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="trangchu.php" style="color:#999da1; padding:6px 0px 0px 0px;"><h4>HORUS WORK</h4></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-" id="sidebarToggle" href="#!" style=" margin-left:-48px;">
                <img style="width:35px; height:35px;" src="style/img/12.png" />
            </button>

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" style="border-radius:60px 0px 0px 60px;"/>
                    <button class="btn btn-light" id="btnNavbarSearch" type="button" style="background-color:#999da1;border-radius:0px 60px 60px 0px; border: 1px;"><i class="fas fa-search" style="color:#ffffff; " ></i></button> &ensp;&ensp;
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo" style="color:#999da1;">
                    <center>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                    </center></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 400px; height:900px; border-radius: 5px; border-width: 2px;">      
                        <center>
                            <h4>Thông báo</h4>
                        </center>
                        <hr style="height: 1px; ">
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#999da1;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <form action="" method="post" enctype="multipart/form-data">   
                        <center>
                        <li>
                           <div class="avatar-wrapper">
                            <img class="profile-pic" src="" />
                           </div>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <button type="submit"  class="btn btn-primary" value="1" name="sua">Đăng xuất</button>
                        </center>
                    </form>
                    </ul>
                </li>
            </ul>
        </nav>