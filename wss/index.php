<?php
ob_start();
/* Acquiring config.php file */
require_once('config/config.php');
/* Start PHP session by calling PHP function  */
session_start();
/* Default Controller, Action and Parameter if nothing will be specify into URL */
$controller = DEFAULT_CONTROLLER;
$action = DEFAULT_ACTION;
$parameter = null;
/* Check if Controller and Action is specified into URL */
if (isset($_GET['controller']) && isset($_GET['action']))
{
    /* Initialize Controller and Action */
    $controller = strtolower($_GET['controller']);
    $action = strtolower($_GET['action']);
    /* Check if Parameter is specify into URL then initialize that as well */
    $parameter = isset($_GET['parameter']) ? strtolower($_GET['parameter']) : null;
}
?>
<!-- Setting Default HTML template -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Acquiring header.php file -->
    <?php require_once('includes/header.php'); ?>
</head>
<body>
    <!-- Acquiring navigation-bar.php file -->
    <?php require_once('includes/navigation-bar.php'); ?>
    <!-- Acquiring router.php file in order to initialize controller and action -->
    <?php include_once("config/router.php"); ?>
    <!-- Acquiring footer.php file -->
    <?php require_once('includes/footer.php'); ?>
</body>
</html>
<?php ob_end_flush(); ?>