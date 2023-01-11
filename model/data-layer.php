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
            //echo "Connection to database successful!";
        } catch (PDOException $e) {
            echo "Error connecting to DB " . $e->getMessage();
        }

    }

    /**
     * insertMember accepts a member object and inserts it into the DB
     * @param $member Member object
     * @return string The member_id of the inserted row
     */
    function insertMember($member)
    {
        //grab parameters
        $fname = $member->getFirstName();
        $lname = $member->getLastName();
        $age = $member->getAge();
        $coat = $member->getCoat();
        $phone = $member->getPhone();
        $email = $member->getEmail();
        $state = $member->getState();
        $seekCoat = $member->getSeekCoat();
        $bio = $member->getBio();
        $nonPremium = 0;
        $premium = 1;

        //1. Define the query
        //if premium
        if ($member instanceof PremiumMember) {
            $interests = $member->inDoorToString() . $member->outDoorToString();

            $sql = "INSERT INTO Member (fname, lname, age, coat, phone, email, state, seekCoat, bio, premium, interests)
                VALUES (:fname, :lname, :age, :coat, :phone, :email, :state, :seekCoat, :bio, :premium, :interests)";

            //2. Prepare the statement
            $statement = $this->_dbh->prepare($sql);


            //3. Bind the parameters
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':age', $age);
            $statement->bindParam(':coat', $coat);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':state', $state);
            $statement->bindParam(':seekCoat', $seekCoat);
            $statement->bindParam(':bio', $bio);
            $statement->bindParam(':premium', $premium);
            $statement->bindParam(':interests', $interests);


        } //if nonpremium
        else {
            $sql = "INSERT INTO Member (fname, lname, age, coat, phone, email, state, seekCoat, bio, premium)
                VALUES (:fname, :lname, :age, :coat, :phone, :email, :state, :seekCoat, :bio, :premium)";

            //2. Prepare the statement
            $statement = $this->_dbh->prepare($sql);

            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':age', $age);
            $statement->bindParam(':coat', $coat);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':state', $state);
            $statement->bindParam(':seekCoat', $seekCoat);
            $statement->bindParam(':bio', $bio);
            $statement->bindParam(':premium', $nonPremium);

        }


        //4. Execute the query
        $statement->execute();

        //5. Process the results (get the primary key)
        $id = $this->_dbh->lastInsertId();
        return $id;
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

