<?php

    class BoardModel
    {
        private $connect;


        public function __construct()
        {
            $this->connect = mysqli_connect('localhost','user1','jlj393839@J','db');

        }

        /*$sUserId,$sUserName,$sContent,$date,$sSubject,$hit*/

        public function insertContent($sUserId,$sSubject,$sContent,$sDate,$iHit,$sUpfileName,$sCopiedFileName,$sVideoLink){
            $sInsertContentQuery ="insert into board values (null,'$sUserId','$sSubject','$sContent','$sDate','$iHit','$sUpfileName','$sCopiedFileName','$sVideoLink')";
           /* $sInsertContentQuery ="insert into board (num,user_id) values (0,'$sUserId')";*/
            $result = mysqli_query($this->connect,$sInsertContentQuery);
            return $result;
        }


        public function getAllContent(){
            $sGetAllContentQuery ="select * from board order by num desc";
            $getAllContentResult = mysqli_query($this->connect,$sGetAllContentQuery);


            if(mysqli_num_rows($getAllContentResult)>0){
                $listBoard = array();
                while($row = mysqli_fetch_assoc($getAllContentResult)){
                    $oBoard = new BoardInfo();
                    $oBoard->setINum($row['num']);
                    $oBoard->setSUserId($row['user_id']);
                    $oBoard->setSSubject($row['subject']);
                    $oBoard->setSContent($row['content']);
                    $oBoard->setSDate($row['date_format']);
                    $oBoard->setIHit($row['hit']);
                    array_push($listBoard,$oBoard);
                }
                return $listBoard;
            }

        }


        /**
         *
         * 게시물갯수에 의한 페이지 수 가져오기
         *
         * @param $iPageRecordNum
         * @return float
         */
        public function getTotalPageFromRecordNum($iPageRecordNum){
            $sGetAllContentQuery ="select count(*) from board ";
            $getAllContentResult = mysqli_query($this->connect,$sGetAllContentQuery);

            $totalRows = mysqli_fetch_array($getAllContentResult)[0];
            $totalPages = ceil($totalRows/$iPageRecordNum);

            return $totalPages;
        }

        /**
         *
         * 페이지마다의 게시물 가져오기
         *
         * @param $iOffset
         * @param $iPageRecordNum
         * @return array
         */
        public function getPageRecordFromOffset($iOffset, $iPageRecordNum){
            $sGetAllContentQuery ="select count(*) from board ";
            $getAllContentResult = mysqli_query($this->connect,$sGetAllContentQuery);

            $totalRows = mysqli_fetch_array($getAllContentResult)[0];
            $totalPages = ceil($totalRows/$iPageRecordNum);

            $getSelectPageRecordsQuery = "select * from board order by num desc limit $iOffset , $iPageRecordNum";
            $getSelectPageRecordsResult = mysqli_query($this->connect,$getSelectPageRecordsQuery);

            if(mysqli_num_rows($getSelectPageRecordsResult)>0){
                $listBoard = array();
                while($row = mysqli_fetch_assoc($getSelectPageRecordsResult)){
                    $oBoard = new BoardInfo();
                    $oBoard->setINum($row['num']);
                    $oBoard->setSUserId($row['user_id']);
                    $oBoard->setSSubject($row['subject']);
                    $oBoard->setSContent($row['content']);
                    $oBoard->setSDate($row['date_format']);
                    $oBoard->setIHit($row['hit']);
                    array_push($listBoard,$oBoard);
                }
                return $listBoard;
            }

        }


        /**
         *
         * 게시물번호로 게시글 가져오기.
         *
         * @param $iNum
         * @return BoardInfo
         */
        public function getBoardFromBoardNum($iNum){
            $sGetBoardQuery = "select * from board where num=$iNum";
            $getBoardResult = mysqli_query($this->connect,$sGetBoardQuery);
            $oBoard = new BoardInfo();
            if(mysqli_num_rows($getBoardResult)>0){
                while($row = mysqli_fetch_assoc($getBoardResult)){
                    $oBoard->setINum($row['num']);
                    $oBoard->setSUserId($row['user_id']);
                    $oBoard->setSSubject($row['subject']);
                    $oBoard->setSContent($row['content']);
                    $oBoard->setSDate($row['date_format']);
                    $oBoard->setIHit($row['hit']);
                    $oBoard->setSImage($row['file_name']);
                    $oBoard->setSCopiedImage($row['file_copied_name']);
                    $oBoard->setSVideoLink($row['video_link']);
                }
                return $oBoard;
            }

        }


        public function getBoardFromBoardSubject($sSubject){
            $sGetBoardQuery = "select * from board where subject='$sSubject'";
            $getBoardResult = mysqli_query($this->connect,$sGetBoardQuery);

            if(mysqli_num_rows($getBoardResult)>0){
                $boardList = array();
                while($row = mysqli_fetch_assoc($getBoardResult)){
                    $oBoard = new BoardInfo();
                    $oBoard->setINum($row['num']);
                    $oBoard->setSUserId($row['user_id']);
                    $oBoard->setSSubject($row['subject']);
                    $oBoard->setSContent($row['content']);
                    $oBoard->setSDate($row['date_format']);
                    $oBoard->setIHit($row['hit']);
                    $oBoard->setSImage($row['file_name']);
                    $oBoard->setSCopiedImage($row['file_copied_name']);
                    $oBoard->setSVideoLink($row['video_link']);
                    array_push($boardList,$oBoard);
                }
                return $boardList;
            }

        }


        /**
         *
         *
         * 게시글 수정
         *
         *
         * @param $num
         * @param $subject
         * @param $content
         * @param $date
         * @return bool|mysqli_result
         */
        public function updateBoardFromBoardNum($num, $subject, $content, $date ,$upfile_name,$copied_file_name ,$videoLink){
            $sUpdateBoardQuery ="update board set subject='$subject', content='$content', date_format='$date',file_name ='$upfile_name',file_copied_name='$copied_file_name',video_link='$videoLink' where num='$num'";
            $updateBoardResult =mysqli_query($this->connect,$sUpdateBoardQuery);
            return $updateBoardResult;
        }


        /**
         *
         * 게시글 삭제
         *
         * @param $iNum
         * @return bool|mysqli_result
         */
        public function deleteBoardFromBoardNum($iNum){
            $sDeleteBoardQuery ="delete from board where num = '$iNum'";
            $deleteBoardResult = mysqli_query($this->connect,$sDeleteBoardQuery);
            return $deleteBoardResult;
        }

        /**
         *
         * 조회수 업데이트
         *
         * @param $iNum
         * @param $iHit
         * @return bool|mysqli_result
         */
        public function updateBoardHitFromBoardNum($iHit, $iNum){
            $sUpdateBoardQuery ="update board set hit ='$iHit' where num='$iNum'";
            $updateBoardResult =mysqli_query($this->connect,$sUpdateBoardQuery);
            return $updateBoardResult;
        }
    }
