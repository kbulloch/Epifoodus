<?php 

class Response
{
	private $answer;
	private $restaurant_id;
	private $user_id;
	private $id;

	function __construct($answer = 1, $restaurant_id = null, $user_id = null, $id = null)
	{
		$this->answer = $answer;
		$this->restaurant_id = $restaurant_id;
		$this->user_id = $user_id;
		$this->id = $id;
	}

	function getAnswer()
	{
		return $this->answer;
	}

	function getRestaurantId()
	{
		return $this->restaurant_id;
	}

	function getUserId()
	{
		return $this->user_id;
	}

	function getId()
	{
		return $this->id;
	}

	function setAnswer($new_answer)
	{
		$this->answer = (int) $new_answer;
	}

	function setRestaurantId($new_restaurant_id)
	{
		$this->restaurant_id = (int) $new_restaurant_id;
	}

	function setUserId($new_user_id)
	{
		$this->user_id = (int) $new_user_id;
	}

	function setId($new_id)
	{
		$this->id = (int) $new_id;
	}
}

?>