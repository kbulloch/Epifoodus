<?php

    class Price
{

    private $level;
    private $id;

    function __construct($level, $id = null)
    {
        $this->level = $level;
        $this->id = $id;
    }

    function getLevel()
    {
        return $this->level;
    }

    function setLevel($new_level)
    {
        $this->level = (int) $new_level;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($new_id)
    {
        $this->id = (int) $new_id;
    }

    function save()
    {
        $statement = $GLOBALS['DB']->query("INSERT INTO prices (level) VALUES {$this->getLevel()} RETURNING id;");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->setId($result['id']);
    }

    static function getAll()
    {
        $statement = $GLOBALS['DB']->query("SELECT * FROM prices; ");
        $price_array = $statement->fetchAll(PDO::FETCH_ASSOC);
        $return_array = array();

        foreach($price_array as $prices)
        {
            $level = $prices['level'];
            $id = $prices['id'];
            $new_prices = new Price($level, $id);
            array_push($return_array, $new_prices);

        }
            return $return_array;
        }
    }




?>
