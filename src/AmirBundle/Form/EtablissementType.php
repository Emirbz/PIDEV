<?php

namespace AmirBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('description')
            ->add('phone')
            ->add('email')
            ->add('website')
            ->add('facebook')
            ->add('categorie')
            ->add('souscategorie')
            ->add('lundisamedio')
            ->add('lundisamedif')
            ->add('dimancheo')
            ->add('dimanchef')
            ->add('parking')
            ->add('cartecredit')
            ->add('chaiseroulante')
            ->add('fumer')
            ->add('terasse')
            ->add('wifi')
            ->add('reservations')
            ->add('etoile')
            ->add('nbrchambre')
            ->add('checkin')
            ->add('checkout')
            ->add('lpd')
            ->add('dp')
            ->add('pc')
            ->add('allinclusive')
            ->add('livraison')
            ->add('climatisation')
            ->add('prixmoy')
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
