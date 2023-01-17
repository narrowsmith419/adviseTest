<?php


class Schedule
{
    //classes and functions go on different lines, decisions and loops, {} same line
    private $_token;
    private $_fall;
    private $_fallText;
    private $_winter;
    private $_winterText;
    private $_spring;
    private $_springText;
    private $_summer;
    private $_summerText;
    private $_date;

    /**
     * default constructor with default values ( ="" )
     */
    public function __construct($token="", $fall="", $fallText="", $winter="", $winterText="",
                                $spring="", $springText="", $summer="", $summerText="", $date="")
    {
        $this->_token = $token;
        $this->_fall = $fall;
        $this->_fallText = $fallText;
        $this->_winter = $winter;
        $this->_winterText = $winterText;
        $this->_spring = $spring;
        $this->_springText = $springText;
        $this->_summer = $summer;
        $this->_summerText = $summerText;
        $this->_date = $date;
    }

    /**
     * return token
     * @return string
     */
    public function getToken()
    {
        return $this->_token;
    }

    /**
     * set token
     * @param string $token
     */
    public function setToken($token)
    {
        $this->_token = $token;
    }

    /**
     * return fall classes
     * @return string
     */
    public function getFall()
    {
        return $this->_fall;
    }

    /**
     * set fall classes
     * @param string $fall
     */
    public function setFall($fall)
    {
        $this->_fall = $fall;
    }

    /**
     * return fallText
     * @return string
     */
    public function getFallText()
    {
        return $this->_fallText;
    }

    /**
     * set fallText
     * @param string $fallText
     */
    public function setFallText($fallText)
    {
        $this->_fallText = $fallText;
    }

    /**
     * return winter classes
     * @return string
     */
    public function getWinter()
    {
        return $this->_winter;
    }

    /**
     * set winter classes
     * @param string $winter
     */
    public function setWinter($winter)
    {
        $this->_winter = $winter;
    }

    /**
     * return winterText
     * @return string
     */
    public function getWinterText()
    {
        return $this->_winterText;
    }

    /**
     * set winterText
     * @param string $winterText
     */
    public function setWinterText($winterText)
    {
        $this->_winterText = $winterText;
    }

    /**
     * return spring classes
     * @return string
     */
    public function getSpring()
    {
        return $this->_spring;
    }

    /**
     * set spring classes
     * @param string $spring
     */
    public function setSpring($spring)
    {
        $this->_spring = $spring;
    }

    /**
     * return springText
     * @return string
     */
    public function getSpringText()
    {
        return $this->_springText;
    }

    /**
     * set springText
     * @param string $springText
     */
    public function setSpringText($springText)
    {
        $this->_springText = $springText;
    }

    /**
     * return summer classes
     * @return string
     */
    public function getSummer()
    {
        return $this->_summer;
    }

    /**
     * set summer classes
     * @param string $summer
     */
    public function setSummer($summer)
    {
        $this->_summer = $summer;
    }

    /**
     * return summerText
     * @return string
     */
    public function getSummerText()
    {
        return $this->_summerText;
    }

    /**
     * set summerText
     * @param string $summerText
     */
    public function setSummerText($summerText)
    {
        $this->_summerText = $summerText;
    }

    /**
     * return date
     * @return string
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * set date
     * @param string $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }







}