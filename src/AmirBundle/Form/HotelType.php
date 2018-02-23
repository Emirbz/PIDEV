<?php

namespace AmirBundle\Form;

use AmirBundle\Repository\EtablissementRepository;
use AmirBundle\Repository\SouscategorieRepository;
use Doctrine\ORM\EntityRepository;
use SlimBundle\Repository\Sous_CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('img1', FileType::class,array('data_class' => null))
            ->add('img2', FileType::class,array('data_class' => null))
            ->add('img3', FileType::class,array('data_class' => null))
            ->add('name')
            ->add('longitude')
            ->add('latitude')
            ->add('address')
            ->add('description')
            ->add('phone')
            ->add('email')
            ->add('website')
            ->add('facebook')
            ->add('categorie',HiddenType::class)
            ->add('souscat', EntityType::class, array(
                'class'=>'SlimBundle\Entity\Sous_Categorie',
                'choice_label'=>'nom',
                'query_builder'=> function(Sous_CategorieRepository $sous_CategorieRepository){
                    return $sous_CategorieRepository->createaQueryBuilder2();
                }
            ))->add('nbrchambre')->add('prixmoy')->add('lpd')
            ->add('pc')->add('allinclusive')->add('dp')
            ->add('etoile')
            ->add('parking')
            ->add('cartecredit')
            ->add('chaiseroulante')
            ->add('fumer')
            ->add('terasse')
            ->add('wifi')
            ->add('reservations')

            ->add('climatisation')
            ->add('animaux')
            ->add('alcool')
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

