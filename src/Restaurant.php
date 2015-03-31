<?php
    Class Restaurant
    {
        private $name;
        private $price_id;
        private $vegie;
        private $opentime;
        private $closetime;
        private $id;

        function __construct($name, $price_id, $vegie, $opentime, $closetime, $id = null)
        {
            $this->name = $name;
            $this->price_id = $price_id;
            $this->vegie = $vegie;
            $this->opentime = $opentime;
            $this->closetime = $closetime;
            $this->id = $id;
        }
        //setters
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function setPrice_id($new_price_id)
        {
            $this->price_id = (int) $new_price_id;
        }

        function setVegie ($new_vegie)
        {
            $this->vegie = (int) $new_vegie;
        }

        function setOpentime($new_opentime)
        {
            $this->opentime = (int) $new_opentime;
        }

        function setClosetime($new_closetime)
        {
            $this->closetime = (int) $new_closetime;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }
        //getters
        function getName()
        {
            return $this->name;
        }

        function getPrice_id()
        {
            return $this->price_id;
        }

        function getVegie()
        {
            return $this->vegie;
        }

        function getOpentime()
        {
            return $this->opentime;
        }

        function getClosetime()
        {
            return $this->closetime;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO restaurants (name, price_id, vegie, opentime, closetime)
                VALUES ('{$this->getName()}', {$this->getPrice_id()}, {$this->getVegie()}, {$this->getOpentime()}, {$this->getClosetime()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function updatePrice($new_price_id)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET price_id = {$new_price_id} WHERE id = {$this->getId()};");
            $this->setPrice_id($new_price_id);
        }

        function updateVegie($new_vegie)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET vegie = {$new_vegie} WHERE id = {$this->getId()};");
            $this->setVegie($new_vegie);
        }

        function updateOpentime($new_opentime)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET opentime = {$new_opentime} WHERE id = {$this->getId()};");
            $this->setOpentime($new_opentime);
        }

        static function getAll()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants;");
            $restaurants = array();
            foreach($returned_restaurants as $restaurant) {
                $name = $restaurant['name'];
                $price_id = $restaurant['price_id'];
                $vegie = $restaurant['vegie'];
                $opentime = $restaurant['opentime'];
                $closetime = $restaurant['closetime'];
                $id = $restaurant['id'];
                $new_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);
                array_push($restaurants, $new_restaurant);
            }
            return $restaurants;
        }

        static function find($search_id)
        {
            $found_restaurant = null;
            $restaurants = Restaurant::getAll();
            foreach($restaurants as $restaurant) {
                $restaurant_id = $restaurant->getId();
                if ($restaurant_id == $search_id) {
                    $found_restaurant = $restaurant;
                }
            }
            return $found_restaurant;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants *;");
        }

        //function addCuisine($cuisine)

        //function getCuisines()

    }
?>
