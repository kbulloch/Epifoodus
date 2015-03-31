<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Cuisine.php";

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus_test');

    class CuisineTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Cuisine::deleteAll();
        }

        function test_getType()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);

            //Act
            $result = $test_cuisine->getType();

            //Assert
            $this->assertEquals($type, $result);
        }

        function test_setType()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);

            $new_type = "Mexican";

            //Act
            $test_cuisine->setType($new_type);

            //Assert
            $this->assertEquals($new_type, $test_cuisine->getType());
        }

        function test_getId()
        {
            //Arrange
            $type = "Italian";
            $id = 123;
            $test_cuisine = new Cuisine($type, $id);

            //Act
            $result = $test_cuisine->getId();

            //Assert
            $this->assertEquals(123, $result);
        }

        function test_setId()
        {
            //Arrange
            $type = "Italian";
            $id = 777;
            $test_cuisine = new Cuisine($type, $id);

            //Act
            $test_cuisine->setId(222);

            //Assert
            $result = $test_cuisine->getId();
            $this->assertEquals(222, $result);
        }

        function test_save()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);

            //Act
            $test_cuisine->save();

            //Assert
            $result = Cuisine::getAll();
            $this->assertEquals($test_cuisine, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $type2 = "Mexican";
            $test_cuisine2 = new Cuisine($type2);
            $test_cuisine2->save();


            //Act
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([$test_cuisine, $test_cuisine2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $type2 = "Mexican";
            $test_cuisine2 = new Cuisine($type2);
            $test_cuisine2->save();

            //Act
            Cuisine::deleteAll();
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $type2 = "Mexican";
            $test_cuisine2 = new Cuisine($type2);
            $test_cuisine2->save();

            //Act
            $result = Cuisine::find($test_cuisine->getId());

            //Assert
            $this->assertEquals($test_cuisine, $result);
        }

        function test_addRestaurant()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $name = "Fiorentino Ristorante";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            //Act
            $test_cuisine->addRestaurant($test_restaurant);

            //Assert
            $result = $test_cuisine->getRestaurants();
            $this->assertEquals([$test_restaurant], $result);
        }

        function test_getRestaurants()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $name1 = "Fiorentino Ristorante";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name1, $price_id, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $name2 = "Pomodoro";
            $price_id2 = 2;
            $vegie2 = 0;
            $opentime2 = 0800;
            $closetime2 = 2200;
            $id2 = 2;
            $test_restaurant2 = new Restaurant($name2, $price_id2, $vegie2, $opentime2, $closetime2, $id2);
            $test_restaurant2->save();

            $test_cuisine->addRestaurant($test_restaurant);
            $test_cuisine->addRestaurant($test_restaurant2);

            //Act
            $result = $test_cuisine->getRestaurants();

            //Assert
            $this->assertEquals([$test_restaurant, $test_restaurant2], $result);
        }

        function test_findByType()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            //Act
            $result = Cuisine::findByType("Italian");

            //Assert
            $this->assertEquals($test_cuisine, $result);
        }

        function test_duplicateAddRestaurant()
        {
            //Arrange
            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $name1 = "Fiorentino Ristorante";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name1, $price_id, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $test_cuisine->addRestaurant($test_restaurant);
            $test_cuisine->addRestaurant($test_restaurant);

            //Act
            $result = $test_cuisine->getRestaurants();

            //Assert
            $this->assertEquals([$test_restaurant], $result);
        }
    }
?>
