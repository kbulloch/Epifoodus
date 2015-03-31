<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Price.php";

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus_test');

    class PriceTest extends PHPUnit_Framework_TestCase

    {
        protected function tearDown()
       {
           Price::deleteAll();

       }

        function test_getLevel()
        {
            //Arrange
            $level = 10.00;
            $id = 1;
            $test_price = new Price($level, $id);

            //Act
            $result = $test_price->getLevel();

            //Arrange
            $this->assertEquals(10.00, $result);

        }

        function test_setLevel()
        {
            //Arrange
            $level = 2.00;
            $id = 4;
            $test_price = new Price($level, $id);
            $new_level = 5.00;

            //Act
            $test_price->setLevel($new_level);
            $result = $test_price->getLevel();

            //Arrange
            $this->assertEquals(5.00, $result);
        }

        function test_getId()
        {
            //Arrange
            $level = 4.00;
            $id =2;
            $test_price = new Price($level, $id);

            //Act
            $result = $test_price->getId();

            //Arrange
            $this->assertEquals(2, $result);
        }

        function test_setId()
        {
            //Arrange
            $level = 6.00;
            $id = 2;
            $test_price = new Price($level, $id);
            $new_id = 4;

            //Act
            $test_price->setId($new_id);
            $result = $test_price->getId();

            //Arrange
            $this->assertEquals(4, $result);
        }

        function test_save()
        {
            //Arrange
            $level = 6.00;
            $id = 3;
            $test_price = new Price($level, $id);
            $test_price->save();

            //Act
            $result = $test_price->getAll();

            //Arrange
            $this->assertEquals([$test_price], $result);
        }

        function test_getAll()
        {
            //Arrange
            $level = 4.00;
            $id = 1 ;
            $test_price = new Price($level, $id);
            $test_price->save();

            $level1 = 5.00;
            $id1 = 2;
            $test_price1  = new Price($level1, $id1);
            $test_price1->save();

            //Act
            $result = Price::getAll();

            //Arrange
            $this->assertEquals([$test_price,$test_price1], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $level = 5.00;
            $id = 1;
            $test_price = new Price($level, $id);
            $test_price->save();

            //Act
            Price::deleteAll();
            $result = Price::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_findId()
        {

            //Arrange
            $level = 5.00;
            $id = 1;
            $test_price = new Price($level, $id);
            $test_price->save();

            $level1 = 6.00;
            $id1 = 3;
            $test_price1 = new Price($level1, $id1);
            $test_price1->save();

            //Act
            $result = Price::findId($test_price->getId());

            //Assert
            $this->assertEquals($test_price, $result);
        }



    }





?>
