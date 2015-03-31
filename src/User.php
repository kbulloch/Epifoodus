<?php

class User
{
	private $username;
	private $password;
	private $id;


	function __construct($new_username,$new_password,$new_id =null){
           $this->id = $new_id;
           $this->password=$new_password;
           $this->username=$new_username;
	}

	function getUsername()
	{
	return $this->username;
	}
	function setUsername($new_username)
	{
	$this->username =  $new_username;
	}
	function getId()
	{
	return $this->id;
	}
	function setId($new_id)
	{
	$this->id = (int) $new_id;
	}
    function getPassword()
    {
    return $this->password;
    }
    function setPassword($new_password)
    {
     $this->password = $new_password;
    }

    function save(){  $statemnt= $GLOBALS['DB']->query("INSERT INTO users (username, password) VALUES
    ('{$this->getUsername()}', '{$this->getPassword()}')RETURNING id;");
    $result= $statemnt->fetch(PDO::FETCH_ASSOC);
    $this->setId($result['id']);
    }
    
    static function getAll(){
       $returned_users =$GLOBALS['DB']->query("SELECT * FROM users ;");
       $users=  array();
       foreach($returned_users as $user){
       	$username=$user['username'];
       	$password=$user['password'];
       	$id=$user['id'];
       	$new_user= new User($username,$password,$id);
       	array_push($users, $new_user);

       }

      return $users;
    }

    static function deleteAll()
    {
    	
       $GLOBALS['DB']->exec("DELETE FROM users *;");
    
    }

    static function find($search_id){
    	$returned_user =null;
    	$all_users= User::getAll();
    	foreach ($all_users as $user) {
          $user_id=$user->getId();
          if ($user_id==$search_id){
               $returned_user= $user;
          }
    	}

  return $returned_user;
    }

   function update(){

   	
   }
}

?>