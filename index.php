<?php require_once __DIR__ . '/vendor/autoload.php';
$app = new Silex\Application();


$app['debug'] = true;

// Controllers & Routes
$app->get('/', function() {
    return 'Yay';
});


$app->run();
