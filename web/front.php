<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;


// On initialise TWIG en lui indiquant le dossier ou se trouve les templates.
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../templates',
));
// ACCUEIL
$app->get('/', function () use ($app) {
    return $app['twig']->render('pages/accueil.html.twig');
});

$app->run();