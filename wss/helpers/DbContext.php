<?php
/* DbContext to initialize database connection */
class DbContext
{
    /* Class attributes and initialize them with constants from config.php */
    private $servername = SERVER_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $dbName = DB_NAME;
    public $dbConnection;

    /* Default Constructor to initialize database connection */
    public function __construct(){
        /* Initializing database connection */
        $this->dbConnection = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbName
        );
    }
}