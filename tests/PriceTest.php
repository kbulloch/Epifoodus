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
            $level = 1;
            $id = 1;
            $test_price = new Price($level, $id);

            //Act
            $result = $test_price->getLevel();

            //Arrange
            $this->assertEquals(1, $result);

        }

        function test_setLevel()
        {
            //Arrange
            $level = 2;
            $id = 4;
            $test_price = new Price($level, $id);
            $new_level = 5;

            //Act
            $test_price->setLevel($new_level);
            $result = $test_price->getLevel();

            //Arrange
            $this->assertEquals(5, $result);
        }

        function test_getId()
        {
            //Arrange
            $level = 4;
            $id =2;
            $test_price = new Price($level, $id);

            //Act
            $result = $test_price->getId();

            //Arrange
            $this->assertEquals(2, $result);
        }



    }





?>
