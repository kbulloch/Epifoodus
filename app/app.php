<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";
    //ADD OTHER CLASSES ONCE COMPLETE [users, likes, ??]


    $app = new Silex\Application();
    $app['debug'] = true;

    //do we need session info here for users who don't sign in ?

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    /*  get routes for all user-interacted pages:
    *   main, options, choice, cuisine, all cuisines, create_user, user info
    */

    //main
    $app->get("/", function() use ($app) {
        return $app['twig']->render('main.twig');
    });


    //options -- randomly shows 2 restaurant options out of all restaurants
    $app->get("/options", function() use($app) {

      $restaurants = Restaurant::getAll();

      $choices = array_rand($restaurants, 2);

      $restaurant1 = $restaurants[$choices[0]];
      $restaurant2 = $restaurants[$choices[1]];

      return $app['twig']->render('options.twig', array('restaurants' => Restaurant::getAll(), 'restaurant1' => $restaurant1, 'restaurant2' => $restaurant2));
    });

    //choice
    $app->get("/choice/{id}", function($id) use($app) {
      $current_restaurant = Restaurant::find($id);
      return $app['twig']->render('choice.twig', array('restaurant' => $current_restaurant, 'cuisine' => $current_restaurant->getCuisines()));
    });

    //cuisine
    $app->get("/cuisines/{id}", function($id) use($app) {
      $current_cuisine = Cuisine::find($id);
      return $app['twig']->render('cuisine.twig', array('cuisine' => $current_cuisine, 'restaurants' => $current_cuisine->getRestaurants()));
    });

    //all cuisines
    $app->get("/cuisines", function() use($app) {
      return $app['twig']->render('cuisines.twig', array('cuisines' => Cuisine::getAll()));
    });

    //create user
    $app->get("/create_user", function() use($app) {
      return $app['twig']->render('create_user.twig');
    });

    //user info
    $app->get("/user/{id}", function($id) use($app) {
      $current_user = User::find($id);
      return $app['twig']->render('user.twig', array('user' => $current_user));
    });

    /* post routes for adding user + restaurant
      (cuisine will be created when restaurant is created)
    */
    $app->post("/add_user", function() use($app) {
      $user = new User($_POST['name'], $_POST['password']);
    });

    $app->get("/restaurant_form", function() use($app) {
        return $app['twig']->render('restaurant_form.twig');
    });

    $app->post("/add_restaurant", function() use($app) {
      // needs all info for restaurant class & form. twig page currently blank
        $new_restaurant = new Restaurant(
            $_POST['name'],
            $_POST['address'],
            $_POST['phone'],
            $_POST['price'],
            $_POST['vegie'],
            $_POST['opentime'],
            $_POST['closetime']);

        $new_restaurant->save();

        //for now, do the check for dupes later bra
        $new_cuisine = new Cuisine($_POST['cuisine']);
        $new_cuisine->save();

        $new_restaurant->addCuisine($new_cuisine);

        return $app['twig']->render('add_restaurant.twig', array('restaurant' => $new_restaurant, 'cuisine' => $new_cuisine));
    });


    /* a route for keeping option 1 / option 2 but re-randoming the other
    * if we keep option 1, we use array_pop to drop restaurant2 from $choices
    * if we keep option 2, we use array_shift to drop restuarant1 from $choices
    */
    $app->get("/keep1", function() use($app) {
      array_pop($choices);

      $restaurants = Restaurant::getAll();

      $new_choices = array_rand($restaurants, 2);

      $restaurant3 = $new_choices[0];
      $restaurant4 = $new_choices[1];

      return $app['twig']->render('options.twig', array('restaurants' => Restaurant::getAll(), 'restaurant1' => $choices[0], 'restaurant2' => $restaurant3));
    });

    $app->get("/keep2", function() use($app) {
      array_shift($choices);

      $restaurants = Restaurant::getAll();

      $new_choices = array_rand($restaurants, 2);

      $restaurant3 = $new_choices[0];
      $restaurant4 = $new_choices[1];

      return $app['twig']->render('options.twig', array('restaurants' => Restaurant::getAll(), 'restaurant2' => $choices[0], 'restaurant1' => $restaurant3));
    });

    return $app;
?>
