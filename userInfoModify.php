<?php
    session_start();
    include "./model/LoginModel.php";
    include "./info/UserInfo.php";
    $userId =$_SESSION['userId'];

    $selectUserInfoModel = new LoginModel();
    $userInfo = $selectUserInfoModel->getUserInfoFromUserId($_SESSION['userId']);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>회원정보수정</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-signup-image{
            background: url("https://www.lifewire.com/thmb/O0SzazxR77v8oOxsSDFS4TxvjGM=/768x0/filters:no_upscale():max_bytes(150000):strip_icc()/Couple-Sharing-Music-56a67f0d5f9b58b7d0e3407a.jpg");
            background-position: center;
            background-size: cover;
        }

    </style>
</head>

<body class="bg-gradient-success">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-5">
            <!-- Nested Row within Card Body -->

                <!--<div class="col-lg-7">-->
                    <div class="p-5">
                        <div class="text-center">
                            <p style="color: #1cc88a; font-size:x-large" >회원정보수정</p>
                        </div>
                        <form class="user" method="post" action="userInfoModifyAction.php">
                            <div class="form-group">
                                <p style="color: #1cc88a">아이디</p>
                                <input type="text" class="form-control form-control-user" id="userId" name ="userId" placeholder=<?=$userInfo->getUserId();?> readonly>
                            </div>
                            <div class="form-group">
                                <p style="color: #1cc88a">이름</p>
                                <input type="text" class="form-control form-control-user" id="userName" name ="userName" placeholder=<?=$userInfo->getUserName()?>>
                            </div>
                            <div class="form-group">
                                <p style="color: #1cc88a">이메일 주소</p>
                                <input type="email" class="form-control form-control-user" id="userEmail" name ="userEmail" placeholder=<?=$userInfo->getUserEmail()?> readonly>
                            </div>
                            <button type="submit" class ="btn btn-success btn-user btn-block" style="margin-top: 30px">변경</button>

                        </form>
                    </div>
                <!--</div>-->
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

</body>

</html>
