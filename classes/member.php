<?php


class Member
{
    //classes and functions go on different lines, decisions and loops, {} same line
    private $_fname;
    private $_lname;
    private $_age;
    private $_coat;
    private $_phone;
    private $_email;
    private $_state;
    private $_seekCoat;
    private $_bio;

    /**
     * default constructor with default values ( ="" )
     */
    public function __construct($fname="", $lname="", $age="", $coat="", $phone="")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_coat = $coat;
        $this->_phone = $phone;
    }


    /**
     * return first name
     * @return string
     */
    public function getFirstName()
    {
        return $this->_fname;
    }

    /**
     * set first name
     * @param string $fname
     */
    public function setFirstName($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * return last name
     * @return string
     */
    public function getLastName()
    {
        return $this->_lname;
    }

    /**
     * set last name
     * @param string $lname
     */
    public function setLastName($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * return age
     * @return int
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * set age
     * @param int $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * return coat type
     * @return string
     */
    public function getCoat()
    {
        return $this->_coat;
    }

    /**
     * set coat type
     * @param string $coat
     */
    public function setCoat($coat)
    {
        $this->_coat = $coat;
    }

    /**
     * return phone number
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * set phone number
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * return email
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * set email
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * return state
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * set state
     * @param string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * return seeking coat
     * @return string
     */
    public function getSeekCoat()
    {
        return $this->_seekCoat;
    }

    /**
     * set seeking coat
     * @param string $seekCoat
     */
    public function setSeekCoat($seekCoat)
    {
        $this->_seekCoat = $seekCoat;
    }

    /**
     * return bio
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * set bio
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }





}