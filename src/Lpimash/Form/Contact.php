<?php
namespace Lpimash\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class Contact extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('email', 'email', array(
                'label' => 'Votre adresse',
                'attr' => array(
                    'placeholder' => 'Ex : jeandupont@xyzmail.fr',
                    'class' => 'test'
                ),
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'le champ "email" ne doit par être vide'
                    )),
                    new Assert\Email(array(
                        'message' => 'L\'adresse email n\'est pas correcte'
                    ))
                )
            ))
            ->add('sujet', 'choice', array(
                'choices'   => array(
                    'S1' => 'à propos du design du site',
                    'S2' => 'proposition de travail',
                    'S3' => 'me passer le bonjour !',
                ),
                'empty_value' => 'Choisissez ...',
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'Merci de choisir un sujet'
                    )),
                ),
            ))
            ->add('message', 'textarea', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                ),
            ))
            ->add('valider', 'submit')
            ->getForm();

    }

    public function getName()
    {
        return 'contact';
    }
}