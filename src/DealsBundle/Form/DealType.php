<?php

namespace DealsBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DealType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('cat', EntityType::class, array(
            'class'=>'DealsBundle:CatDeal',
            'choice_label'=>'nom'
            ))
        ->add('oldprix')->add('promotion')->add('description')
        ->add('newprix',HiddenType::class)
        ->add('Valider',SubmitType::class)->add('validite',ChoiceType::class,array(
            'choices'=>array(
                '1 Jour'=>1,
                '2 Jours'=>2,
                '3 Jours'=>3,
                '4 Jours'=>4,
                '5 Jours'=>5,
                '6 Jours'=>6,
                '7 Jours'=>7,
            )
            ))->add('devisFile', FileType::class)->add('datecreation',HiddenType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DealsBundle\Entity\Deal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Dealsbundle_deal';
    }


}
