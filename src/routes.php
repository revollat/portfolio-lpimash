<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
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
$app->match('/me-contacter', function (Request $request) use ($app) {
    
    $form = $app['form.factory']->createBuilder( new Lpimash\Form\Contact())->getForm();

    if ($request->isMethod('POST')) {
        $form->bind($request);
        if ($form->isValid()) {
            $form_data = $form->getData();
            $app['session']->getFlashBag()->add('message', 'Votre message a bien été envoyé. Vous serez recontacté sur ' . $form_data['email']);
            return $app->redirect('/');
        }
    }
    return $app['twig']->render('pages/contact.html.twig', array('form' => $form->createView()));
    
})->bind('contact');