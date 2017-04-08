<?php

namespace SUWE\SondageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SondageCreateType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du sondage',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nbQuestions', ChoiceType::class, [
                'label' => 'Nombre de questions',
                'required' => true,
                'choices' => array(
                    5 => true,
                    10 => false,
                    15 => false,
                ),
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('minAge', TextType::class, [
                'label' => 'Age minimum',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('maxAge', TextType::class, [
                'label' => 'Age Maximum',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
//            ->add('gender', TextType::class, [
//                'label' => 'Sexe',
//                'required' => false,
//                'attr' => [
//                    'class' => 'form-control'
//                ]
//            ])
//            ->add('departement', TextType::class, [
//                'label' => 'Departement',
//                'required' => false,
//                'attr' => [
//                    'class' => 'form-control'
//                ]
//            ])
//            ->add('statusPro', TextType::class, [
//                'label' => "Status professionel",
//                'attr' => [
//                    'class' => 'form-control'
//                ],
//                'required' => false
//            ])
//            ->add('hobbies', TextType::class, [
//                'label' => 'Centre d\'interêt',
//                'required' => false,
//                'attr' => [
//                    'class' => 'form-control'
//                ]
//            ])
            ->add('maxBudget', IntegerType::class, [
                'label' => 'Budget',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false
            ]);
    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(array(
            'data_class' => 'SUWE\SondageBundle\Entity\Sondage',
            'allow_extra_fields' => true,
            'attr' => [
                '@submit.prevent' => 'submitForm',
            ]
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'suwe_sondagebundle_sondage';
    }
}