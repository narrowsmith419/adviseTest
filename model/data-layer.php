<?php

//Require the database credentials
require_once $_SERVER['DOCUMENT_ROOT'] . '/../pdo-config.php';

class DataLayer
{
    //Add a field to store the database connection object
    private $_dbh;

    //default constructor
    function __construct()
    {
        try {
            //Instantiate a PDO database object
            $this->_dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connection to database successful!";
        } catch (PDOException $e) {
            echo "Error connecting to DB " . $e->getMessage();
        }

    }

    /**
     * insertSchedule accepts a schedule object and inserts it into the DB
     * @param $schedule Schedule object
     * @return string The token of the inserted row
     */
    function insertSchedule($schedule)
    {
        //grab parameters
        $token = $schedule->getToken();
        $fall = $schedule->getFall();
        $fallText = $schedule->getFallText();
        $winter = $schedule->getWinter();
        $winterText = $schedule->getWinterText();
        $spring = $schedule->getSpring();
        $springText = $schedule->getSpringText();
        $summer = $schedule->getSummer();
        $summerText = $schedule->getSummerText();

        //1. Define the query
            $sql = "INSERT INTO adviseIt (token, fall, fallNotes, winter, winterNotes, spring, springNotes,
                      summer, summerNotes)
                VALUES (:token, :fall, :fallText, :winter, :winterText, :spring, :springText, :summer, :summerText)";

            //2. Prepare the statement
            $statement = $this->_dbh->prepare($sql);

            $statement->bindParam(':token', $token);
            $statement->bindParam(':fall', $fall);
            $statement->bindParam(':fallText', $fallText);
            $statement->bindParam(':winter', $winter);
            $statement->bindParam(':winterText', $winterText);
            $statement->bindParam(':spring', $spring);
            $statement->bindParam(':springText', $springText);
            $statement->bindParam(':summer', $summer);
            $statement->bindParam(':summerText', $summerText);


        //4. Execute the query
        $statement->execute();

        //5. Process the results (get the primary key)
        return $this->_dbh->lastInsertId();
    }


    function getMembers()
    {
        //1. Define the query
        //$sql = "SELECT * FROM Member";
        $sql = "SELECT * FROM Member ORDER BY fname";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get the primary key)
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * Return an array of outdoor activities
     * @return string[]
     */
    static function getOutdoor()
    {
        return array('Stalking', 'Bird Watching', 'Murder', 'Hiding', 'Eating Grass', 'Climbing');
    }

    /**
     * Return an array of indoor activities
     * @return string[]
     */
    static function getIndoor()
    {
        return array('Sleeping', 'Resting', 'Scratching Furniture', 'Eating', 'Napping', 'Relaxing', 'Grooming', 'Throwing Up');
    }

    /**
     * Return an array of coat types
     * @return string[]
     */
    static function getCoat()
    {
        return array('long hair', 'short hair', 'hairless', 'tabby', 'calico', 'color point');
    }

    /**
     * Return an array of the united states
     * @return string[]
     */
    static function getStates()
    {
        return array('Washington', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Puerto Rico', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'West Virginia', 'Wisconsin', 'Wyoming');
    }
}

