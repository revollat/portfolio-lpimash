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
    
    return $app['twig']->render('pages/accueil.html.twig');
    
})->bind('accueil');


//  ==================== TEST AJAX ===================
$app->get('/ajax/{valeur}', function ($valeur) use ($app) {
    
    $tableau = [ // Syntaxe depuis PHP 5.4
        "foo" => [
            [
                "titre" => "Titre1",
                "contenu" => "contenu 1"
            ],
            [
                "titre" => "Titre 2",
                "contenu" => "contenu 2"
            ],
            [
                "titre" => "Titre 3",
                "contenu" => "contenu 3"
            ]
        ],
        "bar" => [
            [
                "titre" => "Titre 4",
                "contenu" => "contenu 4"
            ],
            [
                "titre" => "Tire 5",
                "contenu" => "Contenu 5"
            ]
        ]
    ];
    
    return $app->json($tableau[$valeur]);
    
})
->bind('ajax') // cf. doc routing :  http://silex.sensiolabs.org/doc/usage.html#routing
->assert('valeur', 'foo|bar');
;
