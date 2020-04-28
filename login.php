<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>로그인</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-jswon-test {
            /*https://www.lifewire.com/thmb/O0SzazxR77v8oOxsSDFS4TxvjGM=/768x0/filters:no_upscale():max_bytes(150000):strip_icc()/Couple-Sharing-Music-56a67f0d5f9b58b7d0e3407a.jpg*/
            background: url("https://media.cntraveler.com/photos/584ed797d457a1ac0353d2b1/master/pass/GettyImages-569044237.jpg");
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gradient-success">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 100px">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-jswon-test"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <p style="color: #1cc88a; font-size:x-large" >Welcome to MU:SH!</p>
                                </div>
                                <form class="user" action="loginAction.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="userId" name="userId" placeholder="아이디">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="userPassword" name="userPassword" placeholder="비밀번호">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block" >로그인</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">비밀번호를 잊어버리셨나요?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="signup.php">회원가입을 안하셨나요?</a>
                                </div>
                            </div>
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
