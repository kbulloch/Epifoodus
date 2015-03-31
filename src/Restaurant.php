<?php
    Class Restaurant
    {
        private $name;
        private $price;
        private $vegie;
        private $opentime;
        private $closetime;
        private $id;

        function __construct($name, $price, $vegie, $opentime, $closetime, $id = null)
        {
            $this->name = $name;
            $this->price = $price;
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

        function setPrice($new_price)
        {
            $this->price = (int) $new_price;
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

        function getPrice()
        {
            return $this->price;
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
            $statement = $GLOBALS['DB']->query("INSERT INTO restaurants (name, price, vegie, opentime, closetime)
                VALUES ('{$this->getName()}', {$this->getPrice()}, {$this->getVegie()}, {$this->getOpentime()}, {$this->getClosetime()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function updatePrice($new_price)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET price = {$new_price} WHERE id = {$this->getId()};");
            $this->setPrice($new_price);
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

        function updateClosetime($new_closetime)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET closetime = {$new_closetime} WHERE id = {$this->getId()};");
            $this->setClosetime($new_closetime);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM cuisines_restaurants WHERE id = {$this->getId()};");
        }

        static function getAll()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants;");
            $restaurants = array();
            foreach($returned_restaurants as $restaurant) {
                $name = $restaurant['name'];
                $price = $restaurant['price'];
                $vegie = $restaurant['vegie'];
                $opentime = $restaurant['opentime'];
                $closetime = $restaurant['closetime'];
                $id = $restaurant['id'];
                $new_restaurant = new Restaurant($name, $price, $vegie, $opentime, $closetime, $id);
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
