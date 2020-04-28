<?php
class AlramInfo{
    private $alramNum;
    private $boardUser;
    private $boardId;
    private $commentUser;

    /**
     * @return mixed
     */
    public function getAlramNum()
    {
        return $this->alramNum;
    }

    /**
     * @param mixed $alramNum
     */
    public function setAlramNum($alramNum)
    {
        $this->alramNum = $alramNum;
    }

    /**
     * @return mixed
     */
    public function getBoardUser()
    {
        return $this->boardUser;
    }

    /**
     * @param mixed $boardUser
     */
    public function setBoardUser($boardUser)
    {
        $this->boardUser = $boardUser;
    }

    /**
     * @return mixed
     */
    public function getBoardId()
    {
        return $this->boardId;
    }

    /**
     * @param mixed $boardId
     */
    public function setBoardId($boardId)
    {
        $this->boardId = $boardId;
    }

    /**
     * @return mixed
     */
    public function getCommentUser()
    {
        return $this->commentUser;
    }

    /**
     * @param mixed $commentUser
     */
    public function setCommentUser($commentUser)
    {
        $this->commentUser = $commentUser;
    }




}
