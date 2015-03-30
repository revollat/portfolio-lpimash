<?php
/*
                                     ,----, 
                 ,--.              ,/   .`| 
   ,---,       ,--.'|   ,---,    ,`   .'  : 
,`--.' |   ,--,:  : |,`--.' |  ;    ;     / 
|   :  :,`--.'`|  ' :|   :  :.'___,/    ,'  
:   |  '|   :  :  | |:   |  '|    :     |   
|   :  |:   |   \ | :|   :  |;    |.';  ;   
'   '  ;|   : '  '; |'   '  ;`----'  |  |   
|   |  |'   ' ;.    ;|   |  |    '   :  ;   
'   :  ;|   | | \   |'   :  ;    |   |  '   
|   |  ''   : |  ; .'|   |  '    '   :  |   
'   :  ||   | '`--'  '   :  |    ;   |.'    
;   |.' '   : |      ;   |.'     '---'      
'---'   ;   |.'      '---'                  
        '---'                               
                                            
*/

$app = new Silex\Application();

// Pour avoir des information de debuggage de l'application
$app['debug'] = true;

// On initialise TWIG en lui indiquant le dossier ou se trouve les templates.
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../templates'));

// Service URL generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Doctrine 
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'o_revollat-cours-1389601', // à remplacer : SHOW VARIABLES WHERE Variable_name = 'hostname';
        'dbname' => 'c9',
        'port'     => 3306,
        'user' => 'o_revollat', // à remplacer
        'charset' => 'utf8'
    ),
));

// Formulaire
$app->register(new Silex\Provider\FormServiceProvider());

// Validation
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());

// Session
$app->register(new Silex\Provider\SessionServiceProvider());

// Services perso. Cf. http://silex.sensiolabs.org/doc/services.html
$app['menu'] = function ($app) {
    return new Lpimash\Model\Menu($app['db']);
};

// Ajout du menu dispo globalement dans tous les templates Twig
$app["twig"]->addGlobal('menu' , $app['menu']->getItems());
