<?php
class SwapRequestService
{
    private $db;
    function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

	/* Insert information, when user sends swap request */
    public function insertData($user_id,$task_id)
    {
        $sql = "INSERT INTO `swaprequest`(`user_id_from`, `user_id_to`, `task_id`, `accepted`) VALUES (?,?,?,0)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iii", $_SESSION['user_id'] ,$user_id, $task_id);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return $this->db->insert_id;
    }
	
	/* Find all the swap requests recieved by a user which aren't accepted or rejected before */
    public function findNotification()
    {
        $sql = "SELECT `swaprequest`.`id`,`user`.`username`,`tasks`.`task_name`, `tasks`.`start_at`, `tasks`.`end_at`,`tasks`.`id` from `swaprequest` INNER JOIN `user` ON `user`.`id`=`swaprequest`.`user_id_from` INNER  JOIN `tasks` ON `swaprequest`.`task_id` = `tasks`.`id` WHERE `user_id_to`=? AND `accepted`=0";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();

            $stmt->bind_result($swap_id, $username, $task_name, $task_start, $task_end, $task_id);
            while ($stmt->fetch()) {
                $fetchData[] =  [$swap_id, $username, $task_name, $task_start, $task_end , $task_id];
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

	/* Delete the Swap Request once the user accepts or rejects */
    public function deleteSwapRequest($task_id)
    {
        $sql = "DELETE FROM `swaprequest` WHERE task_id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i",$task_id);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return true;
    }


    public function closeConnection()
    {
        $this->db->close();
    }
}
