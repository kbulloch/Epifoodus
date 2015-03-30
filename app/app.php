<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/_____.php"; //ADD CLASS NAMES
    require_once __DIR__."/../src/_____.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //home page
    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.twig');
    });

    return $app;
?>
