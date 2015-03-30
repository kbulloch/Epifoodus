<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Restaurant.php";

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus_test');

    Class RestaurantTest extends PHPUnit_Framework_TestCase
    {
        // function tearDown()
        // {
        //     Restaurant::deleteAll();
        // }

        function test_getName()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getPriceId()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getPrice_id();

            //Assert
            $this->assertEquals($price_id, $result);
        }

        function test_getVegie()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getVegie();

            //Assert
            $this->assertEquals($vegie, $result);
        }

        function test_getOpentime()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getOpentime();

            //Assert
            $this->assertEquals($opentime, $result);
        }

        function test_getClosetime()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getClosetime();

            //Assert
            $this->assertEquals($closetime, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Little Big Burger";
            $price_id = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $price_id, $vegie, $opentime, $closetime, $id);

            //Act
            $test_restaurant->setId(2);
            $result = $test_restaurant->getId();

            //Assert
            $this->assertEquals(2, $result);
        }
    }
?>
