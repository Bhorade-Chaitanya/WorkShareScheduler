<?php
/* function to initialize controller and calling their action respectively */
function callAction($controller, $action, $parameter)
{
    /* checking cases of controller using switch statement */
    switch ($controller) {
        /* if controller = home*/
        case "home":
            /* Acquiring HomeController.php file */
            require_once("modules/HomeModule/HomeController.php");
            /* Initialize HomeController Object */
            $controller = new HomeController();
            /* Break Switch Statement */
            break;
        case "user":
            /* Acquiring UserController.php file */
            require_once("modules/UserModule/UserController.php");
            /* Initialize UserController Object */
            $controller = new UserController();
            /* Break Switch Statement */
            break;
        case "task":
            /* Acquiring TaskController.php file */
            require_once("modules/TaskModule/TaskController.php");
            /* Initialize TaskController Object */
            $controller = new TaskController();
            /* Break Switch Statement */
            break;
        case "swap":
            /* Acquiring SwapController.php file */
            require_once("modules/SwapModule/SwapController.php");
            /* Initialize SwapController Object */
            $controller = new SwapController();
            /* Break Switch Statement */
            break;
        case "penalty":
            /* Acquiring PenaltyController.php file */
            require_once("modules/PenaltyModule/PenaltyController.php");
            /* Initialize PenaltyController Object */
            $controller = new PenaltyController();
            /* Break Switch Statement */
            break;
        default:
            /* Calling function to display error message when no controller found */
            pageNotFound();
    }
    /* Check if action exist of respective called controller */
    if (!method_exists($controller, $action)) {
        /* Calling function to display error message when no controller's action */
        pageNotFound();
    }
    /* Check if parameter exist into URL */
    if ($parameter) {
        /* call action and passing parameter of respective called controller */
        $controller->{$action}($parameter);
    } else { // else
        /* call action without parameter of respective called controller */
        $controller->{$action}();
    }
}

/* Function to display error message "404 - Page no found" when no controller and it's action found */
function pageNotFound()
{
    // require_once("modules/HomeModule/HomeController");
    // $controller = new HomeController();
    // $controller->dashboard();
    echo "404 - Page not found";
}
/* Calling function to initialize controller and calling their action respectively */
callAction($controller, $action, $parameter);
