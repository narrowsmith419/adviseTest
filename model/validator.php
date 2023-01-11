<?php

class Validator
{

    /**
     * @param $name
     * @return bool
     */
    static function validName($name)
    {
        //validate that name is alphabetic/non numeric
        return ctype_alpha($name);
    }

    /**
     * @param $age
     * @return bool
     */
    static function validAge($age)
    {
        //validate that age is not only a number but between 18 and 118
        return ($age >= 18) && ($age < 118);
    }

    /**
     * @param $phone
     * @return bool
     */
    static function validPhone($phone)
    {
        //validate phone number is at least 7 digits
        return $phone > 1000000;
    }

    /**
     * @param $email
     * @return bool
     */
    static function validEmail($email)
    {
        //validate email is correct format with php filter email function
        return (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * @param $userConds
     * @return bool
     */
    static function validIndoor($userConds)
    {
        //Store the valid interests
        $indoor = DataLayer::getIndoor();

        //Check each selected interest
        foreach ($userConds as $selection) {
            if (!in_array($selection, $indoor)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $userConds
     * @return bool
     */
    static function validOutdoor($userConds)
    {
        //Store the valid interests
        $outdoor = DataLayer::getOutdoor();

        //Check each selected interest
        foreach ($userConds as $selection) {
            if (!in_array($selection, $outdoor)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $coat
     * @return bool
     */
    static function validCoat($coat)
    {
        //validate coat string length is at least the minimum string length of shortest coat name
        return strlen($coat) >= 5;
    }

}