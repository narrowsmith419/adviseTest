<?php

//  328/adviseTest/controller/controller.php

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

    function schedule()
    {
        //Initialize input variables
        $token = "";
        $fall = "";
        $fallText = "";
        $winter = "";
        $winterText ="";
        $spring = "";
        $springText = "";
        $summer = "";
        $summerText = "";

        //if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $token = $_POST['token'];
            $fall = $_POST['fall'];
            $fallText = $_POST['fallText'];
            $winter = $_POST['winter'];
            $winterText = $_POST['winterText'];
            $spring = $_POST['spring'];
            $springText = $_POST['springText'];
            $summer = $_POST['summer'];
            $summerText = $_POST['summerText'];


            //Redirect user to home page if there are no errors
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('home');
            }

        }

        $this->_f3->set('token', $token);
        $this->_f3->set('fall', $fall);
        $this->_f3->set('fallText', $fallText);
        $this->_f3->set('winter', $winter);
        $this->_f3->set('winterText', $winterText);
        $this->_f3->set('spring', $spring);
        $this->_f3->set('springText', $springText);
        $this->_f3->set('summer', $summer);
        $this->_f3->set('summerText', $summerText);

        $view = new Template();

        echo $view->render('views/schedule.html');
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