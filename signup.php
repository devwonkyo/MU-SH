<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>회원가입</title>

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

    <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 100px">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-signup-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <p style="color: #1cc88a; font-size:x-large" >회원가입</p>
                        </div>
                        <form class="user" method="post" action="signupAction.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="userId" name ="userId" placeholder="아이디">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="userName" name ="userName" placeholder="이름">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="userEmail" name ="userEmail" placeholder="이메일 주소">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="userPassword" name ="userPassword" placeholder="비밀번호는 영/대소문자,숫자 및 특수문자 8자리이상 15자리 이하로 입력해주세요..">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="userPasswordCheck" name="userPasswordCheck" placeholder="비밀번호 확인">
                                </div>
                            </div>
                            <button type="submit" class ="btn btn-success btn-user btn-block">회원가입</button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">비밀번호를 잊어버리셨나요?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">이미 계정이 있으신가요?</a>
                        </div>
                    </div>
                </div>
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

</body>

</html>
