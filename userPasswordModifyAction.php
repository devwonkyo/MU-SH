<?php
session_start();
$userId = $_SESSION['userId'];
$currentPassword =$_SESSION['userPassword'];//세션에 저장되어있는 현재 패스워드
$inputPassword =$_POST['inputPassword'];//입력받은 현재 패스워드
$newUserPassword = $_POST['userPassword'];//새로운 패스워드
$newUserPasswordCheck = $_POST['userPasswordCheck'];//재 입력 받은 새로운 패스워드

if($currentPassword != $inputPassword){ //세션에 저장된것이랑 입력받은 패스워드가 다르면 변경불가.
    echo "<script>alert('계정 비밀번호가 틀렸습니다.');";
    echo "window.location.replace('userPasswordModify.php');</script>";
    exit;
}


if($newUserPassword != $newUserPasswordCheck){
    echo "<script>alert('비밀번호를 일치시켜주세요.');";
    echo "window.location.replace('userPasswordModify.php');</script>";
    exit;
}


include './model/LoginModel.php';

$oUpdatePasswordModel = new LoginModel();

$updatePasswordResult = $oUpdatePasswordModel->updateUserPasswordFromUserId($userId,$newUserPassword);

if($updatePasswordResult){
    session_destroy();
    echo "<script>alert('비밀번호를 변경하였습니다. 다시 로그인 해주세요');";
    echo "window.location.replace('main.php');</script>";
    exit;
}else{
    echo "<script>alert('비밀번호 변경에 실패하였습니다.');";
    echo "window.location.replace('userPasswordModify.php');</script>";
    exit;
}


?>