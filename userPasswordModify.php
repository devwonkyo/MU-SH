<?php
    session_start();
    $sessionPassword = $_SESSION['userPassword']; ?>
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

<div class="container" >

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-5">
            <!-- Nested Row within Card Body -->

            <!--<div class="col-lg-7">-->
            <div class="p-5">

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">비밀번호 변경</h1>
                </div>
                <form class="user" method="post" action="userPasswordModifyAction.php">
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="inputPassword" name ="inputPassword" placeholder="현재 비밀번호">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="userPassword" name ="userPassword" placeholder="새 비밀번호" onfocus="pwCheck()">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="userPasswordCheck" name="userPasswordCheck" placeholder="새 비밀번호 확인" onfocus="pwCheck()">
                        </div>
                    </div>

                    <div class="alert alert-success" id="alert-success" style="display:none">비밀번호가 일치합니다.</div>
                    <div class="alert alert-danger" id="alert-danger" style="display:none">비밀번호가 일치하지 않습니다.</div>


                    <button type="submit" class ="btn btn-success btn-user btn-block">변경</button>

                </form>
            </div>
            <!--</div>-->
        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript-->
<script type="text/javascript">
    function pwCheck() {
       /* $("#alert-success").hide();
        $("#alert-danger").hide();*/
        $('input').keyup(function pwCheck() {
            var pwd1 = $("#userPassword").val();
            var pwd2 = $("#userPasswordCheck").val();
            if (pwd1 != "" || pwd2 != "") {
                if (pwd1 == pwd2) {
                    $("#alert-success").show();
                    $("#alert-danger").hide();
                    $("#submit").removeAttr("disabled");
                } else {
                    $("#alert-success").hide();
                    $("#alert-danger").show();
                    $("#submit").attr("disabled", "disabled");
                }
            }
        });
    }

</script>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
