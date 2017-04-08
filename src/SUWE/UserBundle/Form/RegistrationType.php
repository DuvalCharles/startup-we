<?php

namespace SUWE\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


/**
 * Class RegistrationType
 * @package SUWE\UserBundle\Form
 */
class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            ->add('name', TextType::class, [
//                'required' => false,
//                'translation_domain' => 'FOSUserBundle'
//            ])
//            ->add('age', NumberType::class, [
//                'required' => false,
//                'translation_domain' => 'FOSUserBundle'
//            ]);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'suwe_user_registration';
    }
}