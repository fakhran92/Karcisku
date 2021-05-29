<?php 

/**
 * 
 */
class User_model
{
	
	public function __construct()
	{
		$this->db = new Database;
	}

	public function checkAvailability($fullname,$idcard,$email,$phone,$username,$password)
	{
		$this->db->query('SELECT * FROM users WHERE fullname=:fullname OR idcard=:idcard OR email=:email OR phone=:phone OR username=:username');
		$this->db->bind('fullname',$fullname);
		$this->db->bind('idcard',$idcard);
		$this->db->bind('email',$email);
		$this->db->bind('phone',$phone);
		$this->db->bind('username',$username);

		$this->db->execute();
		$return = $this->db->rowCount();
		$this->db = NULL;

		return $return;
	}

	public function insertToDB($fullname,$idcard,$email,$phone,$username,$password)
	{
		// Hashing Password
		$password = password_hash($password, PASSWORD_DEFAULT);

		$this->db->query('INSERT INTO users (fullname,idcard,email,phone,username,password) VALUES (:fullname,:idcard,:email,:phone,:username,:password)');
		$this->db->bind('fullname',$fullname);
		$this->db->bind('idcard',$idcard);
		$this->db->bind('email',$email);
		$this->db->bind('phone',$phone);
		$this->db->bind('username',$username);
		$this->db->bind('password',$password);

		$this->db->execute();
		$return = $this->db->rowCount();
		$this->db = NULL;

		return $return;

	}


	public function isPasswordValid($username, $password)
	{
		$this->db->query('SELECT * FROM users WHERE username=:username');
		$this->db->bind('username',$username);

		$this->db->execute();
		$result = $this->db->single();
		$this->db = NULL;		

		if (password_verify ($password,$result['password'])) {
			return true;
		}else{
			return false;
		}
	}

	public function isLoggedIn()
	{
		if (isset($_SESSION['karcisku_user'])) {
			return true;
		}else{
			return false;
		}
	}	

	public function getRole()
	{
		$username = $_SESSION['karcisku_user'];
		$this->db->query('SELECT role FROM users WHERE username=:username');
		$this->db->bind('username', $username);
		
		$this->db->execute();
		$result = $this->db->single();
		$this->db = NULL;
		return $result;
		// var_dump($result);
		// if ($result == 'admin') {
		// 	return true;
		// }else{
		// 	return false;
		// }
	}

	public function getUserDetailBySession($username)
	{
		$this->db->query('SELECT * FROM users WHERE username=:username');
		$this->db->bind('username',$username);
		$this->db->execute();
		
		$return = $this->db->resultSet();
		$this->db =NULL;

		return $return;
	}

	public function getUserDetailById($id)
	{
		$this->db->query('SELECT * FROM users WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();
		
		$return = $this->db->single();
		$this->db =NULL;

		return $return;
	}
}