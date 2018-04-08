<?php
/* Class FormValidation to validate incoming form data */
class FormValidation
{
    /* Class attributes  */
    private $data;
    private $dataErrsMsg;
    private $allValidated;
    /* Default Constructor to initialize some class attributes */
    public function __construct($formData)
    {
        $this->data = $formData;
        $this->allValidated = true;
    }
    /* Function to validate email */
    public function validateEmail()
    {
        /* check if email empty */
        if (empty($this->data["email"])) {
            /* storing error message */
            $this->dataErrsMsg['emailErr'] = "Email is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        } else { // else
            /* calling test_input in order to remove white spaces etc */
            $email = $this->test_input($this->data["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                /* storing error message */
                $this->dataErrsMsg['emailErr'] = "Invalid email format.";
                /* make allValidated attribute to false in order to stop further code process */
                $this->allValidated = false;
            }
            /* calling test_input in order to remove white spaces etc and saving back data to data attribute */
            $this->data['email'] = $this->test_input($this->data["email"]);
        }
    }
    /* Function to validate username */
    public function validateUsername()
    {
        /* check if username empty */
        if (empty($this->data["username"])) {
            /* storing error message */
            $this->dataErrsMsg['userNameErr'] = "Username is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        }
        /* calling test_input in order to remove white spaces etc and saving data back to data attribute */
        $this->data['username'] = $this->test_input($this->data["username"]);
    }
    /* Function to validate password */
    public function validatePassword()
    {
        /* check if password empty */
        if (empty($this->data["password"])) {
            /* storing error message */
            $this->dataErrsMsg['passwordErr'] = "Password is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        }
        /* calling test_input in order to remove white spaces etc and saving data back to data attribute */
        $this->data['password'] = $this->test_input($this->data["password"]);
    }
    /* Function to validate confirm password */
    public function validateConfirmPassword()
    {
        /* check if confirm password empty */
        if (empty($this->data["confirmPassword"])) {
            /* storing error message */
            $this->dataErrsMsg['confirmPasswordErr'] = "Confirm Password is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        } else { // else
            /* calling test_input in order to remove white spaces etc */
            $confirmPassword = $this->test_input($this->data["confirmPassword"]);
            /* check if password and confirm password do not match */
            if ($confirmPassword != $this->data["password"]) {
                /* storing error message */
                $this->dataErrsMsg['confirmPasswordErr'] = "Confirm Password do not match.";
                /* make allValidated attribute to false in order to stop further code process */
                $this->allValidated = false;
            }
            /* calling test_input in order to remove white spaces etc and saving data back to data attribute */
            $this->data['confirmPassword'] = $this->test_input($this->data["confirmPassword"]);
        }
    }
    /* Function to validate Task Name */
    public function validateTaskName()
    {
        /* check if Task Name empty */
        if (empty($this->data["taskName"])) {
            /* storing error message */
            $this->dataErrsMsg['taskNameErr'] = "Task Name is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        }
        /* calling test_input in order to remove white spaces etc and saving data back to data attribute */
        $this->data['taskName'] = $this->test_input($this->data["taskName"]);
    }
    /* Function to validate Task Start Date */
    public function validateTaskStartDate()
    {
        /* check if Task Start Date empty */
        if (empty($this->data["taskStart"])) {
            /* storing error message */
            $this->dataErrsMsg['taskStartErr'] = "Start Date is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        }
        /* calling test_input in order to remove white spaces etc and saving data back to data attribute */
        $this->data['taskStart'] = $this->test_input($this->data["taskStart"]);
    }
    /* Function to validate Task End Date */
    public function validateTaskStartEnd()
    {
        /* check if Task End Date empty */
        if (empty($this->data["taskEnd"])) {
            /* storing error message */
            $this->dataErrsMsg['taskEndErr'] = "End Date is required.";
            /* make allValidated attribute to false in order to stop further code process */
            $this->allValidated = false;
        }
        /* calling test_input in order to remove white spaces etc and saving data back to data attribute */
        $this->data['taskEnd'] = $this->test_input($this->data["taskEnd"]);
    }
    /* Function to test input and remove white spaces etc */
    function test_input($data) {
        /* PHP function to remove strip whitespace (or other characters) from the beginning and end of a string. */
        $data = trim($data);
        /* PHP function to removes backslashes */
        $data = stripslashes($data);
        /* PHP function to convert some predefined characters to HTML entities */
        $data = htmlspecialchars($data);
        /* return data */
        return $data;
    }
    /* Function to return associative array which contains [error message array, form data array, allValidated attribute] */
    function getValidationResults()
    {
        return ['errMessages' => $this->dataErrsMsg, 'formData' => $this->data, 'validationResult' => $this->allValidated];
    }
}