<?php
/* Acquiring DbContext.php file */
require_once("helpers/DbContext.php");
/* Acquiring FormValidation.php file */
require_once("helpers/FormValidation.php");
/* Acquiring TaskService.php file */
require_once("services/TaskService.php");
/* Acquiring UserService.php file */
require_once("services/UserService.php");
/* Class TaskController to handle Tasks */
class TaskController
{
    /* Class attributes  */
    private $view;
    private $TaskService;
    private $UserService;
    /* Default Constructor to initialize some class attributes */
    public function __construct()
    {
        /* Initializing Dd Connection object*/
        $db = new DbContext();
        /* Assign Db Connection to attribute dbConnection */
        $dbConnection = $db->dbConnection;
        /* Initializing Task Service Object by passing db object to handle Task's related database  */
        $this->TaskService = new TaskService($dbConnection);
        /* Initializing User Service Object by passing db object to handle User's related database  */
        $this->UserService = new UserService($dbConnection);
    }
    /* Function to add new Task */
    public function add()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Check if incoming request is post type */
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            /* Initializing Form Validation object */
            $validation = new FormValidation($_POST);
            /* Calling function to validate Task Name */
            $validation->validateTaskName();
            /* Calling function to validate Task Start Date */
            $validation->validateTaskStartDate();
            /* Calling function to validate Task End Date */
            $validation->validateTaskStartEnd();
            /* Calling function to get validation result array */
            $data = $validation->getValidationResults();
            /* Check if validation success e.g contain no input error */
            if($data['validationResult'] == true){
                /* Calling Task Service Function to insert form data */
                $result = $this->TaskService->insertData($data['formData']);
                /* Check if data return successfully */
                if($result != false){
                    /* Closing database connection */
                    $this->TaskService->closeConnection();
                    /* Redirecting */
                    header('Location: '.URL_PATH.'/');
                    /* Stop further execution */
                    exit();
                }
            }
        }
        /* Initialize view attribute */
        $this->view = "modules/TaskModule/AddTaskView.php";
        /* Acquiring View file AddTaskView.php */
        require_once($this->view);
    }
    /* Function to edit Task */
    public function edit($id)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Check if incoming request is post type */
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            /* Initializing Form Validation object */
            $validation = new FormValidation($_POST);
            /* Calling function to validate Task Name */
            $validation->validateTaskName();
            /* Calling function to validate Task Start Date */
            $validation->validateTaskStartDate();
            /* Calling function to validate Task End Date */
            $validation->validateTaskStartEnd();
            /* Calling function to get validation result array */
            $data = $validation->getValidationResults();
            /* Check if validation success e.g contain no input error */
            if($data['validationResult'] == true){
                /* Calling Task Service Function to update form data */
                $result = $this->TaskService->updateTask($id,$data['formData']);
                /* Check if data return successfully */
                if($result != false){
                    /* Closing database connection */
                    $this->TaskService->closeConnection();
                    /* Redirecting */
                    header('Location: '.URL_PATH.'/');
                    /* Stop further execution */
                    exit();
                }
            } else{ // else
                /* Calling Task Service Function to fetch Task Data */
                $fetchData = $this->TaskService->fetchTask($id);
                /* saving task id into data attribute in order to use for view */
                $data['formData']['id'] = $fetchData[0];
            }
        }else{ // else
            /* Calling Task Service Function to fetch Task Data */
            $fetchData = $this->TaskService->fetchTask($id);
            /* saving task data into data attribute in order to use for view */
            $data['formData']['id'] = $fetchData[0];
            $data['formData']['taskName'] = $fetchData[1];
            $data['formData']['taskStart'] = $fetchData[2];
            $data['formData']['taskEnd'] = $fetchData[3];
        }
        /* Closing database connection */
        $this->TaskService->closeConnection();
        /* Initialize view attribute */
        $this->view = "modules/TaskModule/EditTaskView.php";
        /* Acquiring View file EditTaskView.php */
        require_once($this->view);
    }
    /* Function to delete Task */
    public function delete($id)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Task Service Function to delete Task Data */
        $this->TaskService->deleteTask($id);
        /* Closing database connection */
        $this->TaskService->closeConnection();
        /* Redirecting */
        header('Location: '.URL_PATH.'/');
        /* Stop further execution */
        exit();
    }
    /* Function to list user and their Task except logged in user */
    public function listschedule()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling User Service Function to fetch all user except logged in user */
        $result = $this->UserService->fetchUsersExceptLogin();
        /* Check if data return successfully */
        if($result != false){
            /* count total result */
            $total_users = count($result);
        }else{ // else
            /* make total count as zero */
            $total_users = 0;
        }
        /* Closing database connection */
        $this->TaskService->closeConnection();
        /* Initialize view attribute */
        $this->view = "modules/TaskModule/ListMemberScheduleView.php";
        /* Acquiring View file ListMemberScheduleView.php */
        require_once($this->view);
    }
    /* Function to view all respective user's Tasks */
    public function viewschedules($id)
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* Calling Task Service Function to fetch all tasks of specific user */
        $result = $this->TaskService->fetchSpecificUserTasks($id);
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
        $this->view = "modules/TaskModule/ViewMemberScheduleView.php";
        /* Acquiring View file ViewMemberScheduleView.php */
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
