<?php
class UserService
{
    private $db;
    function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }
	
	/* To insert user signup form data into table `user` */
    public function insertData($data)
    {
        $sql = "INSERT INTO `user`(`username`, `password`, `email`) VALUES (?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $data['username'], md5($data['password']), $data['email']);
        if (!$stmt->execute())
        {
            $stmt->close();
            return false;
        }
        $stmt->close();
        return $this->db->insert_id;
    }
	
	/* To validate user login data that contains valid email and password */
    public function validateCredentials($data)
    {
        $sql = "SELECT `id`,`username`,`email` from `user` WHERE `email`=? AND `password`=?";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("ss", $data['email'], md5($data['password']));
            $stmt->execute();

            $stmt->bind_result($id,$username,$email);
            while ($stmt->fetch()) {
                $fetchData =  [$id, $username,$email];
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

	/* To fetch all user except logged in user */
	public function fetchUsersExceptLogin()
    {
        $sql = "SELECT `id`,`username` from `user` WHERE `id`!=?";
        if($stmt = $this->db->prepare($sql))
        {
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();

            $stmt->bind_result($id,$username);
            while ($stmt->fetch()) {
                $fetchData[] =  [$id, $username];
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
