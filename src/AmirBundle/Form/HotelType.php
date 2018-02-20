<?php

namespace AmirBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HotelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DevisFile',FileType::class)->add('DevisName',HiddenType::class)
            ->add('name')
            ->add('address')
            ->add('description')
            ->add('phone')
            ->add('email')
            ->add('website')
            ->add('facebook')
            ->add('categorie',HiddenType::class)
            ->add('souscategorie')
            ->add('parking')
            ->add('cartecredit')
            ->add('chaiseroulante')
            ->add('fumer')
            ->add('terasse')
            ->add('wifi')
            ->add('reservations')
            ->add('prixmoy')
            ->add('etoile')
            ->add('nbrchambre')
            ->add('checkin',ChoiceType::class,array('choices'=>array(
                '10:00'=>'10:00',
                '11:00'=>'11:00',
                '12:00'=>'12:00',
                '13:00'=>'13:00',
                '14:00'=>'14:00',
                '15:00'=>'15:00',
                '16:00'=>'16:00',
                '17:00'=>'17:00',


            )))
            ->add('checkout',ChoiceType::class,array('choices'=>array(
                '10:00'=>'10:00',
                '11:00'=>'11:00',
                '12:00'=>'12:00',
                '13:00'=>'13:00',
                '14:00'=>'14:00',
                '15:00'=>'15:00',
                '16:00'=>'16:00',
                '17:00'=>'17:00',


            )))
            ->add('lpd')
            ->add('dp')
            ->add('pc')
            ->add('allinclusive')

            ->add('climatisation')
            ->add('animaux')
            ->add('alcool')
          ->add('Ajouter',SubmitType::class)
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmirBundle\Entity\Etablissement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amirbundle_etablissement';
    }


}
