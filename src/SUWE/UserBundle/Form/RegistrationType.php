<?php

namespace SUWE\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


/**
 * Class RegistrationType
 * @package SUWE\UserBundle\Form
 */
class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annoncer', CheckboxType::class, array(
                'label' => 'Show this entry publicly?',
                'required' => false,
            ))
            ->add('societe', TextType::class, [
                'required' => false,
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('imageUser', ImageType::class, ['required' => false, 'label' => 'Image'])
            ->add('age', NumberType::class, [
                'required' => false,
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('departement', NumberType::class, [
                'required' => false,
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('statusPro', ChoiceType::class, array(
                'choices' => array(
                    'Sans emploi' => 'Sans emploi',
                    'Salarié' => 'Salarié'
                ),
                'required' => false,
                'placeholder' => 'Etudiant'
            ));
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