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
