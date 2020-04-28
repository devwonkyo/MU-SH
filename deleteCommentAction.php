<?php
session_start();
$commentNum = $_GET['num'];
include './model/CommentModel.php';
$oCommentDeleteModel = new CommentModel();

$commentDeleteResult = $oCommentDeleteModel->deleteCommentFromCommentNum($commentNum);

if($commentDeleteResult){
    echo "<script>alert('댓글을 삭제했습니다.');";
    echo "history.back();</script>";
    exit;
}else{
    echo "<script>alert('댓글삭제에 실패했습니다.');";
    echo "history.back();</script>";
    exit;
}
?>
