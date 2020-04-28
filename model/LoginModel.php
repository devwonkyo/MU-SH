<?php


class LoginModel
{
    private $conn;


    public function __construct()
    {
        $this->conn = mysqli_connect('localhost','user1','jlj393839@J','db');

    }

    /**
     * model 로그인 함수
     *
     * @param $userId
     * @param $userPassword
     * @return int
     */
    public function getUserLogin($userId, $userPassword)
    {
        $sLoginQuery = " select * from users where user_id = '$userId' && user_password = '$userPassword'";
        $aLoginResult = mysqli_query($this->conn, $sLoginQuery);
        $iLoginNum = mysqli_num_rows($aLoginResult);

        return $iLoginNum;
    }

    /**
     * model  회원가입 아이디체크 함수
     * @param $sUserId
     * @return int
     */
    public function getUserIdCheck($sUserId){
        $sCheckUserIdQuery = " select * from users where user_id = '$sUserId' ";
        $aUserCheckResult = mysqli_query($this->conn,$sCheckUserIdQuery);
        $iUserIdNum = mysqli_num_rows($aUserCheckResult);

        return $iUserIdNum;
    }


    /**
     *
     * model 회원가입 함수
     * @param $sUserId
     * @param $sUserName
     * @param $sUserEmail
     * @param $sUserPassword
     * @return bool|mysqli_result
     */
    public function userSignup($sUserId, $sUserName, $sUserEmail, $sUserPassword)
    {
        $sSignupQuery ="insert into users values ('$sUserId','$sUserName','$sUserEmail','$sUserPassword')" ;
        $bResult = mysqli_query($this->conn,$sSignupQuery);

        return $bResult;
    }

    /**
     * 회원탈퇴 함수
     *
     * @param $sUserId
     * @return bool|mysqli_result
     */
    public function userDelete($sUserId){
        $sUserDeleteQuery = "delete from users where user_id ='$sUserId'";
        $bDeleteResult = mysqli_query($this->conn,$sUserDeleteQuery);

        return $bDeleteResult;
    }

    /**
     * 유저ID로 유저정보 가져오기.
     *
     * @param $sUserId
     * @return UserInfo
     */
    public function getUserInfoFromUserId($sUserId){
        $sGetUserInfoQuery = "select * from users where user_id = '$sUserId'";
        $bGetUserInfoResult = mysqli_query($this->conn,$sGetUserInfoQuery);
        $userInfo = new UserInfo();
        if(mysqli_num_rows($bGetUserInfoResult)>0){
            while($row = mysqli_fetch_assoc($bGetUserInfoResult)){
                $userInfo->setUserId($row['user_id']);
                $userInfo->setUserPassword($row['user_password']);
                $userInfo->setUserEmail($row['user_email']);
                $userInfo->setUserName($row['user_name']);
            }
            return $userInfo;
        }

    }


    /**
     *
     * 유저ID로 회원정보 업데이트(수정)
     *
     * @param $sUserId
     * @param $sUserName
     * @return bool|mysqli_result
     */
    public function updateUserInfoFromUserId($sUserId, $sUserName){
        $sUpdateUserInfoQuery = "update users set user_name = '$sUserName' where user_id ='$sUserId'";
        $bUpdateUserInfoResult = mysqli_query($this->conn,$sUpdateUserInfoQuery);
        return $bUpdateUserInfoResult;
    }


    /**
     *
     * 유저ID 로 비밀번호 업데이트(수정)
     *
     * @param $sUserId
     * @param $sUserPassword
     * @return bool|mysqli_result
     */
    public function updateUserPasswordFromUserId($sUserId, $sUserPassword){
        $sUpdateUserPasswordQuery = "update users set user_password = '$sUserPassword' where user_id ='$sUserId'";
        $bUpdateUserPasswordResult = mysqli_query($this->conn,$sUpdateUserPasswordQuery);
        return $bUpdateUserPasswordResult;
    }



}
?>