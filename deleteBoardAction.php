<?php
session_start();
$num = $_GET['boardNum'];
include './model/BoardModel.php';
include './info/BoardInfo.php';
$upload_dir = '/var/www/html/img/';
$oBoardDeleteModel = new BoardModel();
$getSelectedBoardResult = new BoardInfo();

$getSelectedBoardResult = $oBoardDeleteModel->getBoardFromBoardNum($num);
$boardDeleteResult = $oBoardDeleteModel->deleteBoardFromBoardNum($num);


$image_name =$upload_dir.$getSelectedBoardResult->getSCopiedImage();

unlink($image_name);


if($boardDeleteResult){
    echo "<script>alert('게시물을 삭제했습니다.');";
    echo "window.location.replace('board.php');</script>";
    exit;
}else{
    echo "<script>alert('게시물 삭제에 실패했습니다.');";
    echo "window.location.replace('board.php');</script>";
    exit;
}
?>