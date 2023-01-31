<?php


class Admin extends Schedule
{
    //classes and functions go on different lines, decisions and loops, {} same line
    private $_username;
    private $_password;

    /**
     * default constructor with default values ( ="" )
     */
    public function __construct($token="", $fall="", $fallText="", $winter="", $winterText="",
                                $spring="", $springText="", $summer="", $summerText="", $date="", $advisor="",
                                $username = "", $password = "")
    {
        //call Member constructor
        parent::__construct($token, $fall, $fallText, $winter, $winterText, $spring, $springText, $summer, $summerText,
        $date, $advisor);

        $this->_username = $username;
        $this->_password = $password;
    }

    /**
     * return username
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * set username
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * return password
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * set password
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

}