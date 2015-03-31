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



}

?>