<?php
/* Acquiring DbContext.php file */
require_once("helpers/DbContext.php");
/* Acquiring PenaltyService.php file */
require_once("services/PenaltyService.php");
/* Class PenaltyController to handle Penalty Related Task */
class PenaltyController
{
    /* Class attributes  */
    private $view;
    private $PenaltyService;
    /* Default Constructor to initialize some class attributes */
    public function __construct()
    {
        /* Initializing Dd Connection object*/
        $db = new DbContext();
        /* Assign Db Connection to attribute dbConnection */
        $dbConnection = $db->dbConnection;
        /* Initializing Task Service Object by passing db object to handle Task's related database  */
        $this->PenaltyService = new PenaltyService($dbConnection);
    }
    /* Function to display Penalty of user logged in */
    public function index()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Penalty Service Function to fetch penalty of all users */
        $result = $this->PenaltyService->fetchPenalties();
        /* Check if data return successfully */
        if($result != false){
            /* count total result */
            $total_penalties = count($result);
        }else{
            /* make total count as zero */
            $total_penalties = 0;
        }
        /* Closing database connection */
        $this->PenaltyService->closeConnection();
        /* Initialize view attribute */
        $this->view = "modules/PenaltyModule/PenaltyView.php";
        /* Acquiring View file PenaltyView.php */
        require_once($this->view);
    }
    /* Function to view select penalty  page */
    public function select()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Initialize view attribute */
        $this->view = "modules/PenaltyModule/ChoosePenaltyView.php";
        /* Acquiring View file ChoosePenaltyView.php */
        require_once($this->view);
    }
    /* Function to add select penalty */
    public function add($penalty)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Penalty Service Function add data */
        $this->PenaltyService->insertData($penalty);
        /* Closing database connection */
        $this->PenaltyService->closeConnection();
        /* Redirecting */
        header('Location: '.URL_PATH.'/penalty/index');
        /* Stop further execution */
        exit();
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
