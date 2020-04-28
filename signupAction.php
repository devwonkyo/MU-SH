<?php
    session_start();
    include './model/LoginModel.php';
    $oSignUpModel = new LoginModel();
    $userId = $_POST['userId'];
    $userPassword = $_POST['userPassword'];
    $userPasswordCheck = $_POST['userPasswordCheck'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];

    $pattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';

    if(!preg_match($pattern ,$userPassword)){
        print("<script>
            alert('비밀번호는 영/대소문자,숫자 및 특수문자 8자리이상 15자리 이하로 입력해주세요.'); history.back();
                </script>");
        exit;
    }


    if ($userPassword != $userPasswordCheck) {
        echo "<script>alert('비밀번호를 일치시켜주세요.');";
        echo "window.location.replace('signup.php');</script>";
        exit;
    }
    $iUserIdCHeck = $oSignUpModel->getUserIdCheck($userId);

    if ($iUserIdCHeck == 1) {
        echo "<script>alert('이미 존재하는 아이디 입니다.');";
        echo "window.location.replace('signup.php');</script>";
        exit;
    } else {
        $bSignUpResult = $oSignUpModel->userSignup($userId,$userName,$userEmail,$userPassword);


        if ($bSignUpResult == true) {
            echo "<script>alert('회원가입이 완료되었습니다.');";
            echo "window.location.replace('main.php');</script>";
            exit;
        } else {
            echo "<script>alert('회원가입이 실패되었습니다.');";
            echo "window.location.replace('signup.php');</script>";
            exit;
        }
    }


?>
