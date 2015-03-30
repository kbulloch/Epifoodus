<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Cuisine.php";

    // $DB = new PDO('pgsql:host=localhost;dbname=epifoodus_test');

    class CuisineTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Cuisine::deleteAll();
        // }

        function test_getName()
        {
            //Arrange
            $name = "Italian";
            $test_cuisine = new Cuisine($name);

            //Act
            $result = $test_cuisine->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Italian";
            $test_cuisine = new Cuisine($name);

            $new_name = "Mexican";

            //Act
            $test_cuisine->setName($new_name);

            //Assert
            $this->assertEquals($new_name, $test_cuisine->getName());
        }

        function test_getId()
        {
            //Arrange
            $name = "Italian";
            $id = 123;
            $test_cuisine = new Cuisine($name, $id);

            //Act
            $result = $test_cuisine->getId();

            //Assert
            $this->assertEquals(123, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Italian";
            $id = 777;
            $test_cuisine = new Cuisine($name, $id);

            //Act
            $test_cuisine->setId(222);

            //Assert
            $result = $test_cuisine->getId();
            $this->assertEquals(222, $result);
        }
































    }
?>
