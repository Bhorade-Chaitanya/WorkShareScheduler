<?php
/* Acquiring DbContext.php file */
require_once("helpers/DbContext.php");
/* Acquiring TaskService.php file */
require_once("services/TaskService.php");
/* Class HomeController to handle Home Page Related Task */
class HomeController
{
    /* Class attributes  */
    private $view;
    private $TaskService;
    /* Default Constructor to initialize some class attributes */
    public function __construct()
    {
        /* Initializing Dd Connection object*/
        $db = new DbContext();
        /* Assign Db Connection to attribute dbConnection */
        $dbConnection = $db->dbConnection;
        /* Initializing Task Service Object by passing db object to handle Task's related database  */
        $this->TaskService = new TaskService($dbConnection);
    }
    /* Function to display logged in user tasks and welcome message */
    public function index()
    {
        /* Setting Default timezone */
        date_default_timezone_set ("America/New_York");
        /* Getting Current Time */
        $b = time();
        /* Getting Current hour */
        $hour = date("g", $b);
        /* Getting Current minute */
        $m    = date("A", $b);
        /* checks to get right welcome message */
		if ($m == "AM") {
            $msg = "Good Morning,";
            }
        else if ($m == "PM") {
            if ($hour == 12 || ($hour >1 && $hour <6 )) {
                $msg = "Good Afternoon,";
            } else	{
                $msg = "Good Evening,";
            }
        }
        /* Calling Task Service Function to fetch user tasks */
        $result = $this->TaskService->fetchUserTasks();
        /* Check if data return successfully */
        if($result != false){
            /* count total result */
            $total_tasks = count($result);
        }else{
            /* make total count as zero */
            $total_tasks = 0;
        }
        /* Initialize view attribute */
        $this->view = "modules/HomeModule/HomeView.php";
        /* Acquiring View file ListMemberScheduleView.php */
        require_once($this->view);
    }
    /* Function to display user profile page */
    public function profile()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Initialize view attribute */
        $this->view = "modules/HomeModule/ProfileView.php";
        /* Acquiring View file ProfileView.php */
        require_once($this->view);
    }
    /* Function to validate is user logged in or not  */
    public function validateUserAuthentication($redirect = null, $authentic = false)
    {
        /* check if redirect link is set and user already logged in the redirect toward specific given redirect link */
        if(isset($redirect) && isset($_SESSION['user_id'])){
            /* Redirecting */
            header('Location: '.URL_PATH.$redirect);
            /* Stop further execution */
            exit();
        }
        /* else if user not logged in and given authentic variable is also false then redirect toward login page
           this if statement specifically written for log in and sign up URL checks
         */
        else if(!isset($_SESSION['user_id']) && $authentic !=true ){
            header('Location: '.URL_PATH.'/user/login');
            exit();
        }else{ // else
            /* return true */
            return true;
        }
    }
}
