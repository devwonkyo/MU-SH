<?php


class BoardInfo
{
    private $iNum;
    private $sUserId;
    private $sSubject;
    private $sContent;
    private $sDate;
    private $iHit;
    private $sImage;
    private $sCopiedImage;
    private $sVideoLink;

    /**
     * @return mixed
     */
    public function getSVideoLink()
    {
        return $this->sVideoLink;
    }

    /**
     * @param mixed $sVideoLink
     */
    public function setSVideoLink($sVideoLink)
    {
        $this->sVideoLink = $sVideoLink;
    }




    /**
     * @return mixed
     */
    public function getSImage()
    {
        return $this->sImage;
    }

    /**
     * @param mixed $sImage
     */
    public function setSImage($sImage)
    {
        $this->sImage = $sImage;
    }

    /**
     * @return mixed
     */
    public function getSCopiedImage()
    {
        return $this->sCopiedImage;
    }

    /**
     * @param mixed $sCopiedImage
     */
    public function setSCopiedImage($sCopiedImage)
    {
        $this->sCopiedImage = $sCopiedImage;
    }






    /**
     * @return mixed
     */
    public function getINum()
    {
        return $this->iNum;
    }

    /**
     * @param mixed $iNum
     */
    public function setINum($iNum)
    {
        $this->iNum = $iNum;
    }

    /**
     * @return mixed
     */
    public function getSUserId()
    {
        return $this->sUserId;
    }

    /**
     * @param mixed $sUserId
     */
    public function setSUserId($sUserId)
    {
        $this->sUserId = $sUserId;
    }

    /**
     * @return mixed
     */
    public function getSSubject()
    {
        return $this->sSubject;
    }

    /**
     * @param mixed $sSubject
     */
    public function setSSubject($sSubject)
    {
        $this->sSubject = $sSubject;
    }

    /**
     * @return mixed
     */
    public function getSContent()
    {
        return $this->sContent;
    }

    /**
     * @param mixed $sContent
     */
    public function setSContent($sContent)
    {
        $this->sContent = $sContent;
    }

    /**
     * @return mixed
     */
    public function getSDate()
    {
        return $this->sDate;
    }

    /**
     * @param mixed $sDate
     */
    public function setSDate($sDate)
    {
        $this->sDate = $sDate;
    }

    /**
     * @return mixed
     */
    public function getIHit()
    {
        return $this->iHit;
    }

    /**
     * @param mixed $iHit
     */
    public function setIHit($iHit)
    {
        $this->iHit = $iHit;
    }



}