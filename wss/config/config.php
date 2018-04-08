<?php
    // Default module
    const DEFAULT_CONTROLLER = "user";
    const DEFAULT_ACTION = "login";

    // Specify URL path without forward slash at the end
    const URL_PATH = "http://localhost/wss";

    // Server configurations
    const SERVER_NAME = "localhost";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "wss";

?>

<script type="text/javascript">
    // URL path for javascript use
    var URL_PATH = "<?php echo URL_PATH; ?>";
</script>
