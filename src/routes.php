<?php
/*
  _____   ____  _    _ _______ ______  _____ 
 |  __ \ / __ \| |  | |__   __|  ____|/ ____|
 | |__) | |  | | |  | |  | |  | |__  | (___  
 |  _  /| |  | | |  | |  | |  |  __|  \___ \ 
 | | \ \| |__| | |__| |  | |  | |____ ____) |
 |_|  \_\\____/ \____/   |_|  |______|_____/ 
  
*/

//  ==================== ACCUEIL =====================
$app->get('/', function () use ($app) {
    
    return $app['twig']->render('pages/accueil.html.twig', array(
        'menu' => $app['menu']->getItems()
    ));
    
})->bind('accueil');

// Realisations
$app->get('/mes-realisations', function () use ($app) {
    return $app['twig']->render('pages/realisations.html.twig');
})->bind('realisations');

// CV
$app->get('/mon-cv', function () use ($app) {
    return $app['twig']->render('pages/cv.html.twig');
})->bind('cv');

// Contact
$app->get('/me-contacter', function () use ($app) {
    return $app['twig']->render('pages/contact.html.twig');
})->bind('contact');