<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/User.php";
    //require_once "src/Like.php";
    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus;user=abeer;password=abeer');
  class UserTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
         {
            User::deleteAll();
            //Like::deleteAll();
         }
        //Initialize a Store with a User and be able to get it back out of the object using getUser().
        function testGetUser()
        {
            //Arrange
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $test_User = new User($user,$password,$id);
           
            //Act
            $result = $test_User->getUsername();
            //Assert
            $this->assertEquals($user, $result);
        }
        function testsetUserName()
        { //can I change the User in the object with setUserName() after initializing it?
            //Arrange
            $User = "HIST100";
            $password= "Abeer";
            $test_User = new User($User,$password);
            //No need to save here because we are communicating with the object only and not the database.
            //Act
            $test_User->setUsername("Famous Footware");
            $result = $test_User->getUsername();
            //Assert
            $this->assertEquals("Famous Footware", $result);
        }
        // //Next, let's add the Id property to our User User. Like any other property it needs a getter and setter.
        // //Create a User with the id in the constructor and be able to get the id back out.
        function testGetId()
        {
            //Arrange

            $User = "Famous Footware";
            $id=1;
            $password= "Abeer";
            $test_User = new User($User,$password,$id);
            //Act
            $result = $test_User->getId();
            //Assert
            $this->assertEquals(1, $result);
        }
        //Create a User with the id in the constructor and be able to change its value, and then get the new id out.
        function testSetId()
        {
            //Arrange

            $User = "Famous Footware";
            $password= "Abeer";
            $test_User = new User($User,$password);
            //Act
            $test_User->setId(2);
            //Assert
            $result = $test_User->getId();
            $this->assertEquals(2, $result);
        }
        //
        function testSave()
        {
            //Arrange
            $User = "Prada";
            $password="password";
            $test_User = new User($User,$password);
            $test_User->save();
            //Act
            $result = User::getAll();

            //Assert
            $this->assertEquals($test_User, $result[0]);
        }
        //
        function testSaveSetsId()
        {
            //Arrange
            $User = "Famous Footware";
            $password="password";
            $test_User = new User($User,$password);
            //Act
            //save it. Id should be assigned in database, then Userd in object.
            $test_User->save();
            //Assert
            //That id in the object should be numeric (not null)
            $this->assertEquals(true, is_numeric($test_User->getId()));
        }
        
        function testGetAll()
        {
            //Arrange
            $User = "Famous Footware";
            $password="password";
            
            $test_User = new User($User,$password);
            $test_User->save();
            $name2 = "Epicodus PHP";
            $password2="passwommmmrd";


            $test_User2 = new User($name2,$password2);
            $test_User2->save();
            //Act
            $result = User::getAll();
            //Assert
            $this->assertEquals([$test_User, $test_User2], $result);
        }
      
        function testDeleteAll()
        {
            //Arrange
            //We need some categories saved into the database so that we can make sure our deleteAll method removes them all.
            $User = "sHOE sTORE";
            $test_User = new User($User,$password="password");
            $test_User->save();
            $name2 = "Epicodus Ruby";

            $test_User2 = new User($name2,$password="pass");
            $test_User2->save();
            //Act
            //Delete categories.
            User::deleteAll();
            //Assert
            //Now when we call getAll, we should get an empty array because we deleted all categories.
            $result = User::getAll();
            $this->assertEquals([], $result);
        }
        function testFind()
        {
            //Arrange
            //Create and save 2 categories.
            $User = "sHOE sTORE";

            $test_User = new User($User,$password="password");
            $test_User->save();
            $name2 = "Home Economics";

            $test_User2 = new User($name2,$password="pasnnnsword");
            $test_User2->save();
            $result = User::find($test_User->getId());
            $this->assertEquals($test_User, $result);
        }
        function testUpdate()
        {
            //Arrange
            $User = "sHOE sTORE";
            $test_User = new User($User,$password="pasnnnsword");
            $test_User->save();
            $new_name = "Home Economics";
            //Act
            $test_User->update($new_name);
            //Assert
            $this->assertEquals("Home Economics", $test_User->getUser());
        }
        function testDeleteUser()
        {
            //Arrange
            $User = "sHOE sTORE";
            $test_User = new User($User,$password="pasnnnsword");
            $test_User->save();

            $name2 = "Home Economics";
            $test_User2 = new User($name2,$password="pasnnnsword");
            $test_User2->save();
            //Act
            $test_User->delete();
            //Assert
            $this->assertEquals([$test_User2], User::getAll());
        }
        // function testAddUser()
        // {
        //     //Arrange
        //     //We need a User and a User saved
        //     $User = "sHOE sTORE";
        //     $test_User = new User($User);
        //     $test_User->save();

        //     $name= "Drupal";
        //     $test_store = new Store($name);
        //     $test_store->save();

        //     $test_User->addStore($test_store);
        //     $this->assertEquals($test_User->getStores(), [$test_store]);
        // }
        // //Now we write a test for the getStores method since we need it to be able to test the Add User method.
        // function testGetStores()
        // {
        //     //Arrange
        //     //start with a User
        //     $User = "sHOE sTORE";
        //     $test_User = new User($User);
        //     $test_User->save();

        //     $name= "Drupal";
        //     $test_store = new Store($name);
        //     $test_store->save();

        //     $name2= "Drupal";
        //     $test_store2 = new Store($name2);
        //     $test_store2->save();

        //     $test_User->addStore($test_store);
        //     $test_User->addStore($test_store2);
        //     //Assert
        //     //we should get both of them back when we call getStores on the test store.
        //     $this->assertEquals($test_User->getStores(), [$test_store, $test_store2]);
        // }
        // //Deletes the ASSOCIATION between the User and the course in the join table
        //     function testDeleteStores() {
        //       //Arrange
        //       $title = "Maths";
        //       $test_book = new User($title);
        //       $test_book->save();

        //       $author_name = "Dennis Lumberg";
        //       $test_author = new Store($author_name);
        //       $test_author->save();
        //       //Act
        //       $test_book->addStore($test_author);
        //       $test_book->delete();

        //       //Assert
        //       $this->assertEquals([], $test_author->getUsers());
        //     }
    }
?>
