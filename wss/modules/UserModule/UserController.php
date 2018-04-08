<?php
/* Acquiring DbContext.php file */
require_once("helpers/DbContext.php");
/* Acquiring FormValidation.php file */
require_once("helpers/FormValidation.php");
/* Acquiring UserService.php file */
require_once("services/UserService.php");
/* Class UserController to handle Users */
class UserController
{
    /* Class attributes  */
    private $view;
    private $UserService;
    /* Default Constructor to initialize some class attributes */
    public function __construct()
    {
        /* Initializing Dd Connection object*/
        $db = new DbContext();
        /* Assign Db Connection to attribute dbConnection */
        $dbConnection = $db->dbConnection;
        /* Initializing User Service Object by passing db object to handle User's related database  */
        $this->UserService = new UserService($dbConnection);
    }
    /* Function to check and do user login */
    public function login()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication('/home/index', true);
        /* Check if incoming request is post type */
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            /* Initializing Form Validation object */
            $validation = new FormValidation($_POST);
            /* Calling function to validate Email */
            $validation->validateEmail();
            /* Calling function to validate Password */
            $validation->validatePassword();
            /* Calling function to get validation result array */
            $data = $validation->getValidationResults();
            /* Check if validation success e.g contain no input error */
            if($data['validationResult'] == true){
                /* Calling User Service Function to validate user data that contain valid email and password */
                $result = $this->UserService->validateCredentials($data['formData']);
                /* Check if data return successfully */
                if($result != false){
                    /* storing user_id into Session */
                    $_SESSION['user_id'] = $result[0];
                    /* storing username into Session */
                    $_SESSION['username'] = $result[1];
                    /* storing user email into Session */
                    $_SESSION['user_email'] = $result[2];
                    /* Closing database connection */
                    $this->UserService->closeConnection();
                    /* Redirecting */
                    header('Location: '.URL_PATH.'/');
                    /* Stop further execution */
                    exit();
                }else{ // else
                    /* storing error message if no user match found */
                    $data['errMessages']['noMatchFound'] = "Email or Password is incorrect. Try again!";
                }
            }
        }
        /* Initialize view attribute */
        $this->view = "modules/UserModule/UserLoginView.php";
        /* Acquiring View file UserLoginView.php */
        require_once($this->view);
    }
    /* Function to do user sign up */
    public function signup()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication('/home/index', true);
        /* Check if incoming request is post type */
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            /* Initializing Form Validation object */
            $validation = new FormValidation($_POST);
            /* Calling function to validate Email */
            $validation->validateEmail();
            /* Calling function to validate Username */
            $validation->validateUsername();
            /* Calling function to validate Password */
            $validation->validatePassword();
            /* Calling function to validate Confirm Password */
            $validation->validateConfirmPassword();
            /* Calling function to get validation result array */
            $data = $validation->getValidationResults();
            /* Check if validation success e.g contain no input error */           
			if($data['validationResult'] != false){
                /* Calling User Service Function to insert form data */
                $result = $this->UserService->insertData($data['formData']);
                /* Check if data return successfully */
                if($result != false){
                    /* storing user_id into Session */
                    $_SESSION['user_id'] = $result;
                    /* storing username into Session */
                    $_SESSION['username'] = $data['formData']['username'];
                    /* storing user email into Session */
                    $_SESSION['user_email'] = $data['formData']['email'];
                    /* Closing database connection */
                    $this->UserService->closeConnection();
                    /* Redirecting */
                    header('Location: '.URL_PATH.'/');
                    /* Stop further execution */
                    exit();
                }
            }
        }
        /* Initialize view attribute */
        $this->view = "modules/UserModule/UserSignUpView.php";
        /* Acquiring View file UserSignUpView.php */
        require_once($this->view);
    }
    /* Function to do user log out */
    public function logout()
    {
        /* Function to check if user logged in else redirect towards login */
        $this->validateUserAuthentication();
        /* unset user_id Session */
        unset($_SESSION['user_id']);
        /* unset username Session */
        unset($_SESSION['username']);
        /* Redirecting */
        header('Location: '.URL_PATH.'/user/login');
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
