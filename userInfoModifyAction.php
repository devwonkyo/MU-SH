<?php
session_start();
$userId = $_SESSION['userId'];
$userName = $_POST['userName'];



include "./model/LoginModel.php";
$oUserInfoModifyModel = new LoginModel();

$updateUserInfoResult = $oUserInfoModifyModel->updateUserInfoFromUserId($userId,$userName);

if($updateUserInfoResult){
    echo "<script>alert('회원정보를 변경했습니다. /r');";
    echo "window.location.replace('main.php');</script>";
    exit;
}else{
    echo "<script>alert('회원정보 변경에 실패했습니다.');";
    echo "window.location.replace('userInfoModify.php');</script>";
    exit;
}
?>