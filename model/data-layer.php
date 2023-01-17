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

            echo'<pre>';
            var_dump($_SESSION);
            echo'</pre>';

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


    function getSchedule($schedule)
    {

        //grab parameters
        $token = $schedule->getToken();

        //1. Define the query
        // $sql = "SELECT * FROM adviseIt WHERE token = :token";
        $sql = "SELECT * FROM adviseIt WHERE token = :token";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':token', $token);

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get the primary key)
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        echo $result['token'];

        return $result;
    }


}

