<?php
    include './model/LoginModel.php';
    session_start();

    $userId = $_POST['userId'];
    $userPassword = $_POST['userPassword'];

    $oLoginModel = new LoginModel();
    $loginNum = $oLoginModel->getUserLogin($userId, $userPassword);

    if($loginNum == 1){
        $_SESSION['userId'] = $userId;
        $_SESSION['userPassword'] = $userPassword;

        setcookie("userId",$userId,time()+3600);

        echo "<script>alert('로그인 되었습니다.');";
        echo "window.location.replace('main.php');</script>";
        exit;
    }else{
        echo "<script>alert('아이디 혹은 비밀번호가 틀렸습니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }


?>