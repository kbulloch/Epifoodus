// <?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Restaurant.php";
    require_once "src/Cuisine.php";

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus');

    Class RestaurantTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Restaurant::deleteAll();
            Cuisine::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getAddress()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getAddress();

            //Assert
            $this->assertEquals($address, $result);
        }

        function test_getPhone()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getPhone();

            //Assert
            $this->assertEquals($phone, $result);
        }

        function test_getPrice()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getPrice();

            //Assert
            $this->assertEquals($price, $result);
        }

        function test_getVegie()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getVegie();

            //Assert
            $this->assertEquals($vegie, $result);
        }

        function test_getOpentime()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getOpentime();

            //Assert
            $this->assertEquals($opentime, $result);
        }

        function test_getClosetime()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getClosetime();

            //Assert
            $this->assertEquals($closetime, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $result = $test_restaurant->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);

            //Act
            $test_restaurant->setId(2);
            $result = $test_restaurant->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            //Act
            $result = Restaurant::getAll();

            //Assert
            $this->assertEquals($test_restaurant, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $name2 = "Kingsland";
            $address2 = "124 SW 5th";
            $phone2 = "456-292-2801";
            $price2 = 2;
            $vegie2 = 0;
            $opentime2 = 0800;
            $closetime2 = 2200;
            $id2 = 2;
            $test_restaurant2 = new Restaurant($name2, $address2, $phone2, $price2, $vegie2, $opentime2, $closetime2, $id2);
            $test_restaurant2->save();

            //Act
            $result = Restaurant::getAll();

            //Assert
            $this->assertEquals([$test_restaurant, $test_restaurant2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $name2 = "Kingsland";
            $address2 = "124 SW 5th";
            $phone2 = "456-292-2801";
            $price2 = 2;
            $vegie2 = 0;
            $opentime2 = 0800;
            $closetime2 = 2200;
            $id2 = 2;
            $test_restaurant2 = new Restaurant($name2, $address2, $phone2, $price2, $vegie2, $opentime2, $closetime2, $id2);
            $test_restaurant2->save();

            //Act
            Restaurant::deleteAll();
            $result = Restaurant::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $name2 = "Kingsland";
            $address2 = "124 SW 5th";
            $phone2 = "456-292-2801";
            $price2 = 2;
            $vegie2 = 0;
            $opentime2 = 0800;
            $closetime2 = 2200;
            $id2 = 2;
            $test_restaurant2 = new Restaurant($name2, $address2, $phone2, $price2, $vegie2, $opentime2, $closetime2, $id2);
            $test_restaurant2->save();

            //Act
            $result = Restaurant::find($test_restaurant->getId());

            //Assert
            $this->assertEquals($test_restaurant, $result);
        }

        function test_updateName()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_name = "Phat Phood";

            //Act
            $test_restaurant->updateName($new_name);

            //Assert
            $this->assertEquals($new_name, $test_restaurant->getName());
        }

        function test_updateAddress()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_address = "789 SW 4th";

            //Act
            $test_restaurant->updateAddress($new_address);

            //Assert
            $this->assertEquals($new_address, $test_restaurant->getAddress());
        }

        function test_updatePhone()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_phone = "308-282-4291";

            //Act
            $test_restaurant->updatePhone($new_phone);

            //Assert
            $this->assertEquals($new_phone, $test_restaurant->getPhone());
        }

        function test_updatePrice()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_price = 2;

            //Act
            $test_restaurant->updatePrice($new_price);

            //Assert
            $this->assertEquals($new_price, $test_restaurant->getPrice());
        }

        function test_updateVegie()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_vegie = 1;

            //Act
            $test_restaurant->updateVegie($new_vegie);

            //Assert
            $this->assertEquals($new_vegie, $test_restaurant->getVegie());
        }

        function test_updateOpentime()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_opentime = 0930;

            //Act
            $test_restaurant->updateOpentime($new_opentime);

            //Assert
            $this->assertEquals($new_opentime, $test_restaurant->getOpentime());
        }

        function test_updateClosetime()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $new_closetime = 2200;

            //Act
            $test_restaurant->updateClosetime($new_closetime);

            //Assert
            $this->assertEquals($new_closetime, $test_restaurant->getClosetime());
        }

        function test_addCuisine()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            //Act
            $test_restaurant->addCuisine($test_cuisine);

            //Assert
            $this->assertEquals($test_restaurant->getCuisines(), [$test_cuisine]);
        }

        function test_getCuisines()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            $type2 = "Mexican";
            $test_cuisine2 = new Cuisine($type2);
            $test_cuisine2->save();

            //Act
            $test_restaurant->addCuisine($test_cuisine);
            $test_restaurant->addCuisine($test_cuisine2);

            //Assert
            $this->assertEquals($test_restaurant->getCuisines(), [$test_cuisine, $test_cuisine2]);
        }

        function test_delete()
        {
            //Arrange
            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $type = "Italian";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            //Act
            $test_restaurant->addCuisine($test_cuisine);
            $test_restaurant->delete();

            //Assert
            $this->assertEquals([], $test_cuisine->getRestaurants());
        }
    }
// ?>
