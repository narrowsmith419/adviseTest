<?php
//turn on output buffer
ob_start();

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require auto-load file
require_once('vendor/autoload.php');

//start session
session_start();
//edited var_dump($_SESSION);

//Create an instance of the Base class
$f3 = Base::instance();
$con = new Controller($f3);

//instantiate new data layer object
$dataLayer = new DataLayer();

//instantiate new schedule object
$schedule = new Schedule();

//define default route
$f3->route('GET /', function(){

    $GLOBALS['con']->home();

});

//define schedule planner route
$f3->route('GET|POST /schedule', function($f3){

    $GLOBALS['con']->schedule();

});

//define summary route
$f3->route('GET /summary', function(){

    $GLOBALS['con']->summary();

});

//define admin route
$f3->route('GET /admin', function(){

    $GLOBALS['con']->admin();

});

//run fat-free
$f3->run();

//send output to browser
ob_flush();