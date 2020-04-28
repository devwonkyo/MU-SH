<?php
session_start();
if(!isset($_SESSION['userId'])){
    echo "<script>alert('로그인후에 댓글작성이 가능합니다.');";
    echo "history.back();</script>";
    exit;
}
$userId = $_SESSION['userId'];
$date_format = date("Y-m-d");
$comment = $_POST['comment'];
$board_num = $_GET['num'];
$board_user = $_GET['boardUser'];

include './model/CommentModel.php';
include './model/AlramModel.php';
$oInsertCommentModel = new CommentModel();
$oInsertAlramModel = new AlramModel();

$insertResult = $oInsertCommentModel->insertComment($board_num,$userId,$date_format,$comment);
$insertAlramResult = $oInsertAlramModel->insertAlram($board_user,$board_num,$userId);

if($insertAlramResult){
    if($insertResult){
        echo "<script>alert('댓글을 등록했습니다.');";
        echo "window.location.replace('boardView.php?num=$board_num');</script>";
        exit;
    }else{
        echo "<script>alert('댓글을 등록에 실패했습니다.');";
        echo "history.back();</script>";
        exit;
    }
}else{
    echo "<script>alert('알람 등록에 실패했습니다.');";
    echo "history.back();</script>";
    exit;
}
?>