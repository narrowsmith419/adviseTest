<?php

//  328/dating/controller/controller.php

class Controller
{
    private $_f3; //F3 object

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personal()
    {
        //Initialize input variables
        $fname = "";
        $lname = "";
        $age = "";
        $coat = "";
        $number = "";

        //if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $coat = $_POST['coat'];
            $number = $_POST['number'];

            //If premium membership was selected
            if (isset($_POST['premium'])) {
                //instantiate PremiumMember object
                $_SESSION['member'] = new PremiumMember();
            }
            else{
                //instantiate member object
                $_SESSION['member'] = new Member();
            }


            //Validate the data
            if(Validator::validName($fname)) {

                //Add the data to the session variable
                $_SESSION['member']->setFirstName($fname);
            }
            else {

                //Set an error
                $this->_f3->set('errors["fname"]', 'Please enter a valid First Name');
            }

            //Validate the data
            if(Validator::validName($lname)) {

                //Add the data to the session variable
                $_SESSION['member']->setLastName($lname);
            }
            else {

                //Set an error
                $this->_f3->set('errors["lname"]', 'Please enter a valid Last Name');
            }

            //Validate the data
            if(Validator::validAge($age)) {

                //Add the data to the session variable
                $_SESSION['member']->setAge($age);
            }
            else {

                //Set an error
                $this->_f3->set('errors["age"]', 'Please enter a valid Age');
            }

            if(Validator::validCoat($coat)) {

                //Add the data to the session variable
                $_SESSION['member']->setCoat($coat);
            }

            //Validate the data
            if(Validator::validPhone($number)) {

                //Add the data to the session variable
                $_SESSION['member']->setPhone($number);
            }
            else {

                //Set an error
                $this->_f3->set('errors["number"]', 'Please enter a valid phone number');
            }

            //Redirect user to next page if there are no errors
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('profile');
            }

        }

        $this->_f3->set('fname', $fname);
        $this->_f3->set('lname', $lname);
        $this->_f3->set('userCoat', $coat);
        $this->_f3->set('coats', DataLayer::getCoat());
        $this->_f3->set('age', $age);
        $this->_f3->set('number', $number);

        $view = new Template();

        echo $view->render('views/personal-info.html');
    }

    function profile()
    {
        //Initialize input variables
        $email = "";
        $seekCoat = "";
        $biography = "";
        $state = "";

        //if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email = $_POST['email'];

            //add data to the session variable
            $_SESSION['state'] = $_POST['state'];

            /*maybe*/
            $state = $_POST['state'];
            $_SESSION['member']->setState($state);

            /*$_SESSION['biography'] = $_POST['biography'];*/
            $seekCoat = $_POST['seekCoat'];
            $biography = $_POST['biography'];

            //Validate the data
            if(Validator::validEmail($email)) {

                //Add the data to the session variable
                $_SESSION['member']->setEmail($email);

            }
            else {

                //Set an error
                $this->_f3->set('errors["email"]', 'Please enter a valid Email');
            }

            if(Validator::validCoat($seekCoat)) {

                //Add the data to the session variable
                $_SESSION['member']->setSeekCoat($seekCoat);

            }

            if(strlen($biography) > 1){

                //Add the data to the session variable
                $_SESSION['member']->setBio($biography);

            }


            //Redirect user to next page if there are no errors
            //this is where we check if user is premium or not

            if (empty($this->_f3->get('errors'))) {

                if($_SESSION['member'] instanceof PremiumMember) {
                    $this->_f3->reroute('interests');
                }
                else{
                    $this->_f3->reroute('summary');
                }
            }

        }

        $this->_f3->set('email', $email);
        $this->_f3->set('states', DataLayer::getStates());
        $this->_f3->set('userCoat', $seekCoat);
        $this->_f3->set('coats', DataLayer::getCoat());
        $this->_f3->set('biography', $biography);

        $view = new Template();

        echo $view->render('views/profile-info.html');

    }

    function interests()
    {
        //Get the interests from the model and add to F3 hive
        $this->_f3->set('in', DataLayer::getIndoor());
        $this->_f3->set('out', DataLayer::getOutdoor());

        //if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            //Add the data to the session variable
            //If indoor interests were selected
            if (isset($_POST['in'])) {

                $in = $_POST['in'];

                //If interests are valid
                if (Validator::validIndoor($in)) {

                    $_SESSION['member']->setInDoorInterests($in);

                }
                else {
                    $this->_f3->set("errors['ins']", "Invalid selection");
                }
            }
            else {

                $in = "No indoor interests selected";
            }

            //Add the data to the session variable
            //If outdoor interests were selected
            if (isset($_POST['out'])) {

                $out = $_POST['out'];

                //If interests are valid
                if (Validator::validOutDoor($out)) {

                    $_SESSION['member']->setOutdoorInterests($out);
                }
                else {
                    $this->_f3->set("errors['outs']", "Invalid selection");
                }
            }
            else {
                $out = "No outdoor interests selected";
            }

            //Redirect user to summary page
            if (empty($this->_f3->get('errors'))) {
                $_SESSION['in'] = $in;
                $_SESSION['out'] = $out;
                $this->_f3->reroute('summary');
            }

        }

        $view = new Template();

        echo $view->render('views/interests.html');

    }



    function summary()
    {

        $GLOBALS['dataLayer']->insertMember($_SESSION['member']);

        $view = new Template();
        echo $view->render('views/summary.html');

        //Clear the session data
        session_destroy();
    }

    function admin()
    {

        //Get the data from the model
        $members = $GLOBALS['dataLayer']->getMembers();
        $this->_f3->set('members', $members);

        $view = new Template();
        echo $view->render('views/admin.html');
    }


}