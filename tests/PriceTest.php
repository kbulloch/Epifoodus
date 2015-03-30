<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Price.php";

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus_test');

    class PriceTest extends PHPUnit_Framework_TestCase

    {

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



    }





?>
