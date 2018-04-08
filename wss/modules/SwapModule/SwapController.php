<?php
/* Acquiring DbContext.php file */
require_once("helpers/DbContext.php");
/* Acquiring TaskService.php file */
require_once("services/TaskService.php");
/* Acquiring SwapRequestService.php file */
require_once("services/SwapRequestService.php");
/* Class SwapController to handle Swap Request related task */
class SwapController
{
    /* Class attributes  */
    private $view;
    private $TaskService;
    private $SwapRequestService;
    /* Default Constructor to initialize some class attributes */
    public function __construct()
    {
        /* Initializing Dd Connection object*/
        $db = new DbContext();
        /* Assign Db Connection to attribute dbConnection */
        $dbConnection = $db->dbConnection;
        /* Initializing Task Service Object by passing db object to handle Task's related database  */
        $this->TaskService = new TaskService($dbConnection);
        /* Initializing Swap Request Service Object by passing db object to handle User's related database  */
        $this->SwapRequestService = new SwapRequestService($dbConnection);
    }
    /* Function to list all tasks of logged in user */
    public function index()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Task Service Function to fetch user tasks of logged in user */
        $result = $this->TaskService->fetchUserTasks();
        /* Check if data return successfully */
        if($result != false){
            /* count total result */
            $total_tasks = count($result);
        }else{ // else
            /* make total count as zero */
            $total_tasks = 0;
        }
        /* Closing database connection */
        $this->TaskService->closeConnection();
        /* Initialize view attribute */
        $this->view = "modules/SwapModule/SwapView.php";
        /* Acquiring View file SwapView.php */
        require_once($this->view);
    }
    /* Function to search users if user available for swap request */
    public function search($id)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Task Service Function to search users if user available for swap request */
        $result = $this->TaskService->searchAvailableUserForSwapTask($id);
        /* Check if data return successfully */
        if($result != false){
            /* make total count as zero */
            $total_users = 0;
            /* check if users found */
            if(isset($result[1])){
                /* count total result */
                $total_users = count($result[1]);
            }
        }else{ // else
            /* make total count as zero */
            $total_users = 0;
        }
        /* Closing database connection */
        $this->TaskService->closeConnection();
        /* Initialize view attribute */
        $this->view = "modules/SwapModule/SearchResultView.php";
        /* Acquiring View file ListMemberScheduleView.php */
        require_once($this->view);
    }
    /* Function to send swap request */
    public function send($user_id){
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Swap Request Service Function to insert swap data */
        $result = $this->SwapRequestService->insertData($user_id,$_GET['task_id']);
        /* Closing database connection */
        $this->SwapRequestService->closeConnection();
        /* Redirecting */
        header('Location: '.URL_PATH.'/swap/index');
        /* Stop further execution */
        exit();
    }
    /* Function to show all notification for swap request */
    public function notification()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Swap Request Service Function to find all notification */
        $result = $this->SwapRequestService->findNotification();
        /* Check if data return successfully */
        if($result != false){
            /* count total result */
            $notifications = count($result);
        }else{
            /* make total count as zero */
            $notifications = 0;
        }
        /* Closing database connection */
        $this->SwapRequestService->closeConnection();
        /* Initialize view attribute */
        $this->view = "modules/SwapModule/NotificationView.php";
        /* Acquiring View file NotificationView.php */
        require_once($this->view);
    }
    /* Function to accept swap request */
    public function accept($task_id)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Task Service Function to swap tasks */
        $result = $this->TaskService->swapTask($task_id);
        /* Check if data return successfully */
        if($result != false){
            /* Calling Swap Request Service Function to delete data */
            $this->SwapRequestService->deleteSwapRequest($task_id);
        }
        /* Closing database connection */
        $this->SwapRequestService->closeConnection();
        /* Redirecting */
        header('Location: '.URL_PATH.'/swap/index');
        /* Stop further execution */
        exit();
    }
    /* Function to reject swap request */
    public function reject($task_id)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Swap Request Service Function to delete data */
        $result = $this->SwapRequestService->deleteSwapRequest($task_id);
        /* Check if data return successfully */
        if($result != false){
            /* Closing database connection */
            $this->SwapRequestService->closeConnection();
        }
        /* Redirecting */
        header('Location: '.URL_PATH.'/swap/index');
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
