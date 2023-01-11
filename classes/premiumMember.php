<?php


class PremiumMember extends Member
{

    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * default constructor with default values ( ="" )
     */
    public function __construct($fname="", $lname="", $age="", $coat="", $phone="", $inDoorInterests=[], $outDoorInterests=[])
    {
        //call Member constructor
        parent::__construct($fname, $lname, $age, $coat, $phone);

        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;

    }

    /**
     * return inDoorInterests
     * @return array
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * set inDoorInterests
     * @param array $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        //clear array
        $this->_inDoorInterests = array();

        foreach($inDoorInterests as $value)
        {
            array_push($this->_inDoorInterests, $value);
        }
    }

    /**
     * return outDoorInterests
     * @return array
     */
    public function getOutDoorInterests()
    {

        return $this->_outDoorInterests;

    }

    /**
     * set outDoorInterests
     * @param array $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        //clear array
        $this->_outDoorInterests = array();

        foreach($outDoorInterests as $value)
        {
            array_push($this->_outDoorInterests, $value);
        }
    }

    /**
     * return inDoorInterests in a string
     * @return string
     */
    public function inDoorToString()
    {
        $readOut = implode(", ", $this->_inDoorInterests);

        //add default readout if no interests selected
        if(sizeof($this->_inDoorInterests) == 0)
        {
            $readOut = "No indoor interests selected";
        }

        //add comma
        $readOut .= ", ";

        return $readOut;

    }

    /**
     * return outDoorInterests in a string
     * @return string
     */
    public function outDoorToString()
    {


        $readOut = implode(", ", $this->_outDoorInterests);

        //add default readout if no interests selected
        if(sizeof($this->_outDoorInterests) == 0)
        {
            $readOut = "No outdoor interests selected";
        }

        return $readOut;

    }










}