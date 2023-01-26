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

            //send user to editSchedule page
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('editSchedule');
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
        $this->_f3->set('isNew', true);

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
        $this->_f3->set('isNew', false);

        $view = new Template();

        echo $view->render('views/editSchedulePlan.html');

    }

    function summary()
    {

        //if new schedule, insert into db, else update
        if($this->_f3->get('isNew'))
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

    function admin()
    {

        //Get the single schedule data from the model by schedule object token
        $schedule = $GLOBALS['dataLayer']->getSchedule($_SESSION['schedule']);

        $this->_f3->set('schedule', $schedule);

        $view = new Template();
        echo $view->render('views/admin.html');

        //Clear the session data
        session_destroy();
    }


}