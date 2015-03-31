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
        $statement = $GLOBALS['DB']->query("INSERT INTO prices (level) VALUES ('{$this->getLevel()}') RETURNING id;");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->setId($result['id']);
    }

    function updateLevel($new_level)
    {
        $GLOBALS['DB']->exec("UPDATE prices SET level = {$new_level};");
        $this->setLevel($new_level);
    }

    static function findId($search_id)
    {
        $statement = $GLOBALS['DB']->query("SELECT * FROM prices WHERE id = {$search_id};");
        $price_array = $statement->fetchAll(PDO::FETCH_ASSOC);
        $return_price = null;

        foreach ($price_array as $price)
        {
            $level = $price['level'];
            $id = $price['id'];
            $return_price = new Price($level, $id);

        }
        return $return_price;
    }


    static function findByLevel($search_level)
    {
        $returned_price = null;
        $all_prices = Price::getAll();
        foreach ($all_prices as $price)
        {
            $price_level = $price->getLevel();
            if ($price_level == $search_level)
            {
                $returned_price = $price;
            }


        }
        return $returned_price;

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


    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM prices *;");
    }



    }





?>
