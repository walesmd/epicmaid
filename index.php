<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;


// Controllers & Routes
$app->get('/', function() use ($app) {
    return $app['twig']->render('index.twig', array(

    ));
});


// Service Provider Registrations
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));


$app->run();
