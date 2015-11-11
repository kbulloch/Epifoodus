<?php
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/User.php";
//ADD OTHER CLASSES ONCE COMPLETE [users, likes, ??]


$app = new Silex\Application();
$app['debug'] = true;

$DB = new PDO('pgsql:host=localhost;dbname=epifoodus');

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__.'/../views'
));
use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();


/* session is required for logins.
*  we check admin for each user session because some pages are admin-only
*  vegetarian is also checked, but currently non-functional for page-responses
*/
session_start();
if (empty($_SESSION['user_id'])) {
  $_SESSION['user_id'] = null;
};
if (empty($_SESSION['is_admin'])) {
  $_SESSION['is_admin'] = null;
};

/*  get routes for all user-interacted pages:
*   main, options, choice, cuisine, all cuisines, create_user, user info
*/

//main
//if user is already logged in,
$app->get("/", function() use ($app) {
  $user = User::find($_SESSION['user_id']);
  return $app['twig']->render('main.twig', array('user_id' => $_SESSION['user_id'], 'user' => $user));
});
/////////////////////////////////////////////////////////////
//create user
$app->get("/create_user", function() use($app) {
  return $app['twig']->render('create_user.twig', array(
    'user_id' => $_SESSION['user_id'],
    'exists' => 0,
    'is_admin' => $_SESSION['is_admin']));
  });


  $app->get("/user", function() use($app) {
    $current_user = User::find($_SESSION['user_id']);
    $admin_status = $_SESSION['is_admin'];
    return $app['twig']->render('user.twig', array(
      'user' => $current_user,
      'is_admin' => $admin_status));
    });

    $app->get("/add_person", function() use($app) {
      $current_user = User::find($_SESSION['user_id']);
      $admin_status = $_SESSION['is_admin'];
      return $app['twig']->render('add_person.twig', array(
        'user' => $current_user,
        'is_admin' => $admin_status));
      });


    //create user post route,
    //will render profile page if user doesn't already exist,
    //will render "create user" page with error msg if user exists already
    $app->post("/create_user", function() use($app) {
      $user = null;
      $exists = User::checkIfExists($_POST['username']);

      if ($exists == 0){
        $user = new User($_POST['username'], $_POST['password'],0,0);
        $user->save();
        $new_user_id = $user->getId();
        $_SESSION['user_id'] = $new_user_id;
        $new_user_is_admin = $user->getAdmin();
        $_SESSION['is_admin'] = $new_user_is_admin;
      }
      else {
        return $app['twig']->render('create_user.twig', array(
          'user_exist' => $user,
          'user_id' => $_SESSION['user_id'],
          'exists' => $exists,
          'is_admin' => $_SESSION['is_admin']));
        }
        return $app['twig']->render('user.twig', array(
          'user'=>$user,
          'user_id' => $_SESSION['user_id'],
          'exists' => $exists,
          'is_admin' => $_SESSION['is_admin']));
        });


        $app->post("/logout", function() use($app) {
          $_SESSION['user_id'] = null;
          $user = User::find($_SESSION['user_id']);
          return $app['twig']->render('main.twig', array(
            'user_id' => $_SESSION['user_id'],
            'user' => $user));
          });

          $app->post("/login", function() use($app) {
            $username = $_POST['signin_username'];
            $password = $_POST['user_password'];
            $user = User::authenticatePassword($username, $password);
            if ($user) {
              $user_id= $user->getId();
              $_SESSION['user_id']=$user_id;
              $new_user_is_admin = $user->getAdmin();
              $_SESSION['is_admin'] = $new_user_is_admin;
              return $app['twig']->render('user.twig', array(
                'user'=> $user,
                'user_id' => $_SESSION['user_id'],
                'is_admin' => $_SESSION['is_admin']));
              }
              else {
                return $app['twig']->render('main.twig',array(
                  'user' => $user,
                  'user_id' => $_SESSION['user_id'],
                ));

              }
            });
            /////////////////////////////////////////////////////////////
            //user info

            $app->post("/user", function() use($app) {
              $current_user = User::find($_SESSION['user_id']);
              $admin_status = $_SESSION['is_admin'];
              return $app['twig']->render('user.twig', array(
                'user' => $current_user,
                'is_admin' => $admin_status,));
              });

              return $app;
              ?>
