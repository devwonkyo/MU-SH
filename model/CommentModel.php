<?php


class CommentModel
{
    private $connect;


    public function __construct()
    {
        $this->connect = mysqli_connect('localhost','user1','jlj393839@J','db');

    }


    public function insertComment($board_id,$user_id,$date_format,$comment){
        $sInsertCommentQuery ="insert into comments values (null,'$board_id','$user_id','$date_format','$comment')";
        $result = mysqli_query($this->connect,$sInsertCommentQuery);
        return $result;
    }

    public function getAllCommentsFromBoardId($board_num){

        $sGetAllCommentQuery ="select * from comments where board_id ='$board_num'";
        $getAllCommentResult = mysqli_query($this->connect,$sGetAllCommentQuery);
            if(mysqli_num_rows($getAllCommentResult)>0){
                $listComment = array();
                while($row = mysqli_fetch_assoc($getAllCommentResult)){
                    $oComment = new CommentInfo();
                    $oComment->setNum($row['num']);
                    $oComment->setBoardId($row['board_id']);
                    $oComment->setUserId($row['user_id']);
                    $oComment->setDate($row['date_format']);
                    $oComment->setComment($row['comment']);
                    array_push($listComment,$oComment);
                }
                return $listComment;
            }

    }


    public function deleteCommentFromCommentNum($iNum){
        $sDeleteCommentQuery ="delete from comments where num = '$iNum'";
        $deleteCommentResult = mysqli_query($this->connect,$sDeleteCommentQuery);
        return $deleteCommentResult;
    }

    public function countCommentFromBoardNum($boardNum){
        $sCountCommentQuery = " select * from comments where board_id = '$boardNum' ";
        $countCommentResult = mysqli_query($this->connect,$sCountCommentQuery);
        return mysqli_num_rows($countCommentResult);
    }
}