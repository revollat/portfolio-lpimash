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
            "div1" => "Lorem ipsum dolor sit amet.",
            "div2" => "Donec mattis neque at leo."
        ],
        "bar" => [
            "div1" => "Praesent metus tellus, egestas id.",
            "div2" => "Nullam volutpat, nisi pretium posuere."
        ]
    ];
    
    return $app->json($tableau[$valeur]);
    
})
->bind('ajax') // cf. doc routing :  http://silex.sensiolabs.org/doc/usage.html#routing
->assert('valeur', 'foo|bar');
;
