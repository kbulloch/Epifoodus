<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cuisine.php"; //ADD CLASS NAMES
    require_once __DIR__."/../src/Restaurant.php";

    $app = new Silex\Application();
    $app['debug'] = true;

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

      $restaurant1 = $choices[0];
      $restaurant2 = $choices[1] ;

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

    $app->post("/add_restaurant", function() use($app) {
      // needs all info for restaurant class & form. twig page currently blank
    });


    return $app;
?>
