<?php

    class Cuisine
    {
        private $type;
        private $id;

        function __construct($type, $id = null)
        {
            $this->type = $type;
            $this->id = $id;
        }

        function getType()
        {
            return $this->type;
        }

        function setType($new_type)
        {
            $this->type = (string) $new_type;
        }

        function getid()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO cuisines (type)
                                                VALUES ('{$this->getType()}')
                                                RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function addRestaurant($new_restaurant)
        {
            $GLOBALS['DB']->exec("INSERT INTO cuisines_restaurants (cuisine_id, restaurant_id)
                                  VALUES ({$this->getId()}, {$new_restaurant->getId()});");
        }

        function getRestaurants()
        {
            $restaurants = array();
            $returned_restaurants = $GLOBALS['DB']->query("SELECT restaurants.* FROM cuisines
                                    JOIN cuisines_restaurants ON (cuisines.id = cuisines_restaurants.cuisine_id)
                                    JOIN restaurants ON (restaurants.id = cuisines_restaurants.restaurant_id)
                                    WHERE cuisine_id = {$this->getId()};");
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

        static function getAll() //READ ALL
        {
            $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
            $cuisines = [];
            foreach($returned_cuisines as $element) {
                $type = $element['type'];
                $id = $element['id'];
                $new_cuisine = new Cuisine($type, $id);
                array_push($cuisines, $new_cuisine);
            }
            return $cuisines;
        }

        static function deleteAll() //DESTROY ALL
        {
            $GLOBALS['DB']->exec("DELETE FROM cuisines *;");
        }

        static function find($search_id) //READ SINGLE
        {
            $found_cuisine = null;
            $cuisines = Cuisine::getAll();
            foreach($cuisines as $my_cuisine) {
                $cuisine_id = $my_cuisine->getId();
                if ($cuisine_id == $search_id) {
                    $found_cuisine = $my_cuisine;
                }
            }
            return $found_cuisine;
        }

        
    }
?>
