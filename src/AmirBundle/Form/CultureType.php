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

class CultureType extends AbstractType
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
            ->add('longitude')
            ->add('latitude')
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
                    return $sous_CategorieRepository->createaQueryBuilder4();
                }
            ))

            ->add('parking')
            ->add('cartecredit')
            ->add('chaiseroulante')
            ->add('fumer')
            ->add('terasse')
            ->add('wifi')
            ->add('reservations')

            ->add('climatisation')
            ->add('animaux')

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
