<?php

//  328/adviseTest/controller/controller.php

class Controller
{
    private $_f3; //F3 object

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function uniqueToken()
    {
        $uniqueToken = "224466";
        return $uniqueToken;
    }

    function home()
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
        $date = "";
        $advisor = "";

        //test
        $_SESSION['admin'] = new Schedule();

        //if the token field has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Initialize input variables
            $token = $_POST['token'];
            $fall = $_POST['fall'];
            $fallText = $_POST['fallText'];
            $winter = $_POST['winter'];
            $winterText = $_POST['winterText'];
            $spring = $_POST['spring'];
            $springText = $_POST['springText'];
            $summer = $_POST['summer'];
            $summerText = $_POST['summerText'];
            $date = $_POST['date'];
            $advisor = $_POST['advisor'];


            //instantiate schedule object
            $_SESSION['reSchedule'] = new Schedule();

            //Add the token number to the session variable
            $_SESSION['reSchedule']->setToken($token);
            $_SESSION['reSchedule']->setFall($fall);
            $_SESSION['reSchedule']->setFallText($fallText);
            $_SESSION['reSchedule']->setWinter($winter);
            $_SESSION['reSchedule']->setWinterText($winterText);
            $_SESSION['reSchedule']->setSpring($spring);
            $_SESSION['reSchedule']->setSpringText($springText);
            $_SESSION['reSchedule']->setSummer($summer);
            $_SESSION['reSchedule']->setSummerText($summerText);
            $_SESSION['reSchedule']->setDate($date);
            $_SESSION['reSchedule']->setAdvisor($advisor);

            //test

            $_SESSION['newToken'] = $token;

            //send user to editSchedule page
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('editSchedule'.'_token='.$token);
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
        $this->_f3->set('date', $date);
        $this->_f3->set('advisor', $advisor);

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
        $advisor = "";

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
            $advisor = $_POST['advisor'];

            //instantiate schedule object
            $_SESSION['schedule'] = new Schedule();

            //Add the data to the session variable
            $_SESSION['schedule']->setToken($token);
            $_SESSION['schedule']->setFall($fall);
            $_SESSION['schedule']->setFallText($fallText);
            $_SESSION['schedule']->setWinter($winter);
            $_SESSION['schedule']->setWinterText($winterText);
            $_SESSION['schedule']->setSpring($spring);
            $_SESSION['schedule']->setSpringText($springText);
            $_SESSION['schedule']->setSummer($summer);
            $_SESSION['schedule']->setSummerText($summerText);
            $_SESSION['schedule']->setAdvisor($advisor);
            $_SESSION['schedule']->setIsNew(true);

            //Redirect user to home page if there are no errors
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('summary');
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
        $this->_f3->set('advisor', $advisor);

        $view = new Template();

        echo $view->render('views/schedulePlan.html');

    }

    function editSchedule()
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

            //instantiate schedule object
            $_SESSION['schedule'] = new Schedule();

            //Add the data to the session variable
            $_SESSION['schedule']->setToken($token);
            $_SESSION['schedule']->setFall($fall);
            $_SESSION['schedule']->setFallText($fallText);
            $_SESSION['schedule']->setWinter($winter);
            $_SESSION['schedule']->setWinterText($winterText);
            $_SESSION['schedule']->setSpring($spring);
            $_SESSION['schedule']->setSpringText($springText);
            $_SESSION['schedule']->setSummer($summer);
            $_SESSION['schedule']->setSummerText($summerText);
            $_SESSION['schedule']->setIsNew(false);

            //Redirect user to home page if there are no errors
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('summary');
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

        echo $view->render('views/editSchedulePlan.html');

    }

    function summary()
    {

        //if new schedule, insert into db, else update
        if($_SESSION['schedule']->getIsNew())
        {
            $GLOBALS['dataLayer']->insertSchedule($_SESSION['schedule']);
        }
        else
        {
            $GLOBALS['dataLayer']->updateSchedule($_SESSION['schedule']);
        }

        $view = new Template();
        echo $view->render('views/summary.html');

        //Clear the session data
        session_destroy();
    }

    function login()
    {

        //if user is already logged in, send to admin page
        if ($_SESSION['admin']->getFall() != null)
        {
            $this->_f3->reroute('admin');
        }

        //Initialize input variables
        $username = "";
        $password = "";


        //if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //instantiate admin object
            $_SESSION['admin'] = new Schedule();

            //require credentials file
            require('creds.php');

            //if username is in array and passwords match
            if (array_key_exists($username, $logins) && $password == $logins[$username]) {

                //record username into sessions array || might be able to delete this
                $_SESSION['username'] = $username;

                //Add the data to the session variable
                $_SESSION['admin']->setFall($username);
                $_SESSION['admin']->setFallText($password);

                //Redirect user to admin page if there are no errors
                if (empty($this->_f3->get('errors'))) {
                    $this->_f3->reroute('admin');
                }
            }
            else
            {
                $this->_f3->reroute('errorAdmin');
            }

        }

        $view = new Template();
        echo $view->render('views/login.html');
    }

    function errorAdmin()
    {
        $view = new Template();
        echo $view->render('views/errorAdmin.html');
    }

    function admin()
    {
        //if user is not logged in, send to error page
        if ($_SESSION['admin']->getFall() == null)
        {
            $this->_f3->reroute('errorAdmin');
        }

        //get all data from the model
        $schedules = $GLOBALS['dataLayer']->getAllSchedules();
        $this->_f3->set('schedules', $schedules);


        $view = new Template();
        echo $view->render('views/admin.html');

        //Clear the session data
        //session_destroy();
    }


}