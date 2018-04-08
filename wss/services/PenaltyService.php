<?php
class PenaltyService
{
    private $db;
    function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }
	
	/* Insert the selected penalty data by a user*/
    public function insertData($penalty)
    {
        $sql = "INSERT INTO `penalty`(`user_id`, `choice`) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("is", $_SESSION['user_id'] ,$penalty);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return $this->db->insert_id;
    }

	/* Fetch all the penalties taken by all the users */
    public function fetchPenalties()
    {
        $sql = "SELECT `user`.`username`,`penalty`.`choice` from `penalty` INNER  JOIN `user` ON `user`.`id` = `penalty`.`user_id`";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->execute();

            $stmt->bind_result($username,$penalty_choice);
            while ($stmt->fetch()) {
                $fetchData[] =  [$username,$penalty_choice];
            }
            $stmt->close();
            if(isset($fetchData)){
                return $fetchData;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function closeConnection()
    {
        $this->db->close();
    }
}
