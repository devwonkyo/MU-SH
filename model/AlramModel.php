<?php
class AlramModel{
    private $connect;


    public function __construct()
    {
        $this->connect = mysqli_connect('localhost','user1','jlj393839@J','db');

    }

    public function insertAlram($board_user,$board_id,$comment_user){
        $sInsertAlramQuery = "insert into alram values (null,'$board_user','$board_id','$comment_user')";
        $insertAlramResult = mysqli_query($this->connect,$sInsertAlramQuery);

        return $insertAlramResult;
    }

    public function getUserAlramFromUserId($userId){
        $sGetAlramQuery = " select * from alram where board_user = '$userId' ";
        $getAlramResult = mysqli_query($this->connect,$sGetAlramQuery);

        if(mysqli_num_rows($getAlramResult)>0){
            $listAlram = array();
            while($row = mysqli_fetch_assoc($getAlramResult)){
                $oAlram = new AlramInfo();
                $oAlram->setAlramNum($row['num']);
                $oAlram->setBoardUser($row['board_user']);
                $oAlram->setBoardId($row['board_id']);
                $oAlram->setCommentUser($row['comment_user']);
                array_push($listAlram,$oAlram);
            }
            return $listAlram;
        }
    }


    public function deleteAlram($alramNum){
        $sDeleteAlramQuery = "delete from alram where num ='$alramNum'";
        $deleteAlramResult = mysqli_query($this->connect,$sDeleteAlramQuery);
        return $deleteAlramResult;
    }


}
