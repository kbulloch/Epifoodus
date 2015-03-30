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































    }
?>
