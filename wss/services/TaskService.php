<?php
class TaskService
{
    private $db;
    function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

	/* To insert new tasks into table `tasks` */
    public function insertData($data)
    {
        $sql = "INSERT INTO `tasks`(`user_id`, `task_name`, `start_at`, `end_at`) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss",$_SESSION['user_id'], $data['taskName'], $data['taskStart'], $data['taskEnd']);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return $this->db->insert_id;
    }

	/* To fetch users tasks */
    public function fetchUserTasks()
    {
        $sql = "SELECT `id`,`task_name`,`start_at`,`end_at` from `tasks` WHERE `user_id`=?";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();

            $stmt->bind_result($id,$taskName, $startAt,$endAt);
            while ($stmt->fetch()) {
                $fetchData[] =  [$id,$taskName, $startAt,$endAt];
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

	/* To fetch all tasks of a specific user */
    public function fetchSpecificUserTasks($id)
    {
        $sql = "SELECT `user`.`username`,`tasks`.`task_name`,`tasks`.`start_at`,`tasks`.`end_at` from `tasks` LEFT JOIN `user` ON `user`.`id`=`tasks`.`user_id` WHERE `user`.`id`=?";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->bind_result($username,$taskName, $startAt,$endAt);
            while ($stmt->fetch()) {
                $fetchData[] =  [$username,$taskName, $startAt,$endAt];
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

	/* To fetch task data */
    public function fetchTask($id)
    {
        $sql = "SELECT `id`,`task_name`,`start_at`,`end_at` from `tasks` WHERE `id`=? AND `user_id`=?";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("ii", $id ,$_SESSION['user_id']);
            $stmt->execute();

            $stmt->bind_result($id,$taskName, $startAt,$endAt);
            while ($stmt->fetch()) {
                $fetchData =  [$id,$taskName, $startAt,$endAt];
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
	
	/* To update a task when user wishes to edit it */ 
    public function updateTask($id,$data)
    {
        $sql = "UPDATE `tasks` SET `task_name`=?,`start_at`=?,`end_at`=? WHERE `id`=? AND `user_id`=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssii",$data['taskName'], $data['taskStart'], $data['taskEnd'],$id, $_SESSION['user_id']);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return true;
    }

	/* Deleting a user selected task */
    public function deleteTask($id)
    {
        $sql = "DELETE FROM `tasks` WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i",$id);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return true;
    }
	
	/* To search users if available for a swap request */
    public function searchAvailableUserForSwapTask($id)
    {
        $result = $this->fetchTask($id);
        $fetchData[0] = $result;
        $sql = "SELECT `user`.`username`,`user`.id, `tasks`.`start_at`,`tasks`.`end_at` from `tasks` INNER JOIN `user` ON `user`.`id`=`tasks`.`user_id`
where `user`.`id` NOT IN (Select `tasks`.`user_id` from `tasks` where (`tasks`.`start_at` BETWEEN '{$fetchData[0][2]}' AND '{$fetchData[0][3]}') OR (`tasks`.`end_at` BETWEEN '{$fetchData[0][2]}' AND '{$fetchData[0][3]}') GROUP BY `tasks`.`user_id`) AND `user`.`id` !=? group by `user`.`id`
";
      

        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();

            $stmt->bind_result($username,$user_id,$start_at,$end_at);
            while ($stmt->fetch()) {
                $fetchData[1][] =  [$username,$user_id,$start_at,$end_at];
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

	/* To update task when user approves a swap request */
    public  function swapTask($id)
    {
        $sql = "UPDATE `tasks` SET `user_id`=? WHERE `id`=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $_SESSION['user_id'], $id);
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
