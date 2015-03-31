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

	function save()
	{
		$statement = $GLOBALS['DB']->query("INSERT INTO responses (answer, restaurant_id, user_id) VALUES ({$this->getAnswer()}, '{$this->getRestaurantId()}', {$this->getUserId()}) RETURNING id;");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->setId($result['id']);
	}

	static function getAll()
    {
        $all_responses = $GLOBALS['DB']->query("SELECT * FROM responses;");
        $returned_responses = array();
        foreach ($all_responses as $response){
            $answer = $response['answer'];
            $restaurant_id = $response['restaurant_id'];
            $user_id = $response['user_id'];
            $id = $response['id'];
            $new_response = new Response($answer, $restaurant_id, $user_id, $id);
            array_push ($returned_responses, $new_response);
        }
        return $returned_responses;
    }

    static function deleteAll()
    {
    	 $GLOBALS['DB']->exec("DELETE FROM responses *;");
    }
}

?>