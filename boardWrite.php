<?php                  //글쓰기 수정 가능.
session_start();
include './model/AlramModel.php';
include './info/AlramInfo.php';
if(!isset($_SESSION['userId'])){
    echo "<script>alert('로그인이 필요한 페이지 입니다.');";
    echo "window.location.replace('board.php');</script>";
    exit;
}
if(isset($_GET['modify'])){//수정 할 게시물 번호
    include './model/BoardModel.php';
    include './info/BoardInfo.php';
    $boardNum = $_GET['modify'];
    $oGetBoardModel = new BoardModel();
    $board = $oGetBoardModel->getBoardFromBoardNum($boardNum);
}

if(isset($_SESSION['userId'])){
    $getAlramModel = new AlramModel();

    $alramList = $getAlramModel->getUserAlramFromUserId($_SESSION['userId']);

    $filterdAlramList = array();

    foreach ($alramList as $alram){
        if($_SESSION['userId'] != $alram->getCommentUser()){
            array_push($filterdAlramList,$alram);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>게시물 작성</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!--    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">-->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->



</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-headphones"></i>
            </div>
            <div class="sidebar-brand-text mx-3">MU<sup>sic</sup>:SH<sup>are</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="main.php">
                <i class="fas fa-home"></i>
                <span>home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Tables -->
        <li class="nav-item active">
            <a class="nav-link" href="board.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Board</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <?php
        if(isset($_SESSION['userId'])){  //로그인 되어있을 때 ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Account
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-user-alt"></i>
                    <span>mypage</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens</h6>
                        <a class="collapse-item" href="userInfoModify.php">회원정보</a>
                        <a class="collapse-item" href="userPasswordModify.php">비밀번호변경</a>
                        <a class="collapse-item" href="userInfoDelete.php">회원탈퇴</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
            <?php     //로그인 되어있지 않을 때.
        }else{?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">
                    <i class="fas fa-plus-square"></i>
                    <span>SignUp</span></a>
            </li>
            <?php
        }
        ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <!--<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>-->

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="board.php" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="제목으로 게시글 검색" aria-label="Search" aria-describedby="basic-addon2" name="search" id="search">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <?php
                if(isset($_SESSION['userId'])){ ?>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?=count($filterdAlramList)?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    댓글 알림
                                </h6>
                                <?php
                                if(count($filterdAlramList)>0){
                                    foreach($filterdAlramList as $value){?>
                                        <a class="dropdown-item d-flex align-items-center" href="boardView.php?num=<?=$value->getBoardId()?>&alram=<?=$value->getAlramNum()?>">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">알림</div>
                                                <span class="font-weight-bold"><?=$value->getCommentUser()?>님 께서 댓글을 달았습니다.</span>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                }else{?>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-danger">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">알림</div>
                                            알림이 없습니다.
                                        </div>
                                    </a>
                                    <?php
                                }
                                ?>
                                <a class="dropdown-item text-center small text-gray-500" href="#">닫기</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdo기wn no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                                echo $_SESSION['userId'];
                                ?></span>
                                <img class="img-profile rounded-circle" src="https://image.shutterstock.com/image-vector/user-icon-trendy-flat-style-260nw-418179865.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="userInfoModify.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    회원정보
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    로그아웃
                                </a>
                            </div>
                        </li>

                    </ul>

                    <?php
                }else{?>
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow mx-1">

                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdo기wn no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                                echo "please login";
                                ?></span>
                                <img class="img-profile rounded-circle" src="https://image.shutterstock.com/image-vector/user-icon-trendy-flat-style-260nw-418179865.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="login.php">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login
                                </a>
                                <a class="dropdown-item" href="signup.php">
                                    <i class="fas fa-plus-square"></i>
                                    Signup
                                </a>
                            </div>

                        </li>

                    </ul>

                    <?php
                }
                ?>


            </nav>
            <!--  ///////////////////////////////////////////////////////////////메뉴 구간//////////////////////////////////////-->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">글쓰기</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php if($_GET['modify']){echo "boardModifyAction.php?num=".$_GET['modify'];}else{ echo "boardWriteAction.php";}?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="subject" class="text-success">제목</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="<?php if(isset($_GET['modify'])){echo $board->getSSubject();}?>" placeholder="제목을 입력하세요." required>
                            </div>
                            <div class="form-group">
                                <label class="text-success" for="userId">작성자</label>
                                <input type="text" class="form-control" id="userId" name="userId" placeholder="<?=$_SESSION['userId']?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-success" for="videoLink">동영상 링크</label>
                                <input type="text" class="form-control" id="videoLink" name="videoLink" value="<?php if(isset($_GET['modify'])){echo $board->getSVideoLink();}?>" placeholder="꼭 올바른 동영상 링크를 입력해주세요.">
                            </div>
                            <div class="form-group">
                                <label class="text-success" for=content">내용</label>
                                <textarea class="form-control" id="content" name="content" rows="10" placeholder="내용을 입력하세요."required><?php if(isset($_GET['modify'])){echo $board->getSContent();}?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="text-success" for=upfile">이미지 파일</label><br>
                                <input type="file" class="form-control" id="upfile" name="upfile">
                                <?php
                                if(isset($_GET['modify'])){
                                    if($board->getSCopiedImage()!=null){
                                        echo '<br>';
                                        echo $board->getSImage().' 파일이 등록되어 있습니다.';
                                    }
                                }
                                ?>
                            </div>
                            <hr/>
                            <?php if($_GET['modify']){?>
                                <a href="deleteBoardAction.php<?php echo '?boardNum='.$_GET['modify'];?>" class="btn btn-danger fa-pull-right">삭제</a>
                                <button class="btn btn-success fa-pull-right" style="margin-right: 10px" type="submit">수정</button>
                            <?php
                            }else{ ?>
                                <button class="btn btn-success fa-pull-right" type="submit">작성</button>
                            <?php
                            }?>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">로그아웃 하시겠습니까?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
                <a class="btn btn-success" href="logout.php">로그아웃</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
