<?php
    session_start();
    $userId = $_SESSION['userId'];
    $userPassword = $_POST['userPassword'];
    $sessionPassword = $_SESSION['userPassword'];

    if($userPassword != $sessionPassword){
        echo "<script>alert('비밀번호가 틀렸습니다.');";
        echo "window.location.replace('userInfoDelete.php');</script>";
        exit;
    }else{
        include './model/LoginModel.php';
        $oUserDeleteModel = new LoginModel();

        $bDeleteResult = $oUserDeleteModel->userDelete($userId);
        if($bDeleteResult){
            session_destroy();
            echo "<script>alert('회원탈퇴 되었습니다.');";
            echo "window.location.replace('main.php');</script>";
            exit;
        }else{
            echo "<script>alert('회원탈퇴에 실패하였습니다.');";
            echo "window.location.replace('userInfoDelete.php');</script>";
            exit;
        }
    }
?>