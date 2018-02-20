<?php

namespace OussamaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class eventsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('dateEvenement', \Symfony\Component\Form\Extension\Core\Type\DateType::class)
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Tous' => 'Tous',
                    'Sport' => 'Sport',
                    'Bal' => 'Bal',
                    'Cirque' => 'Cirque',
                    'Culture' => 'Culture',
                    'Developpement durable' => 'Developpement durable',
                    'Festival' => 'Festival',
                    'Fête privée' => 'Fête privée',
                    'Spectacle' => 'Spectacle',
                    'Sortie' => 'Sortie',
                    'Visite' => 'Visite',
                    'Rassemblement' => 'Rassemblement',)))
            ->add('Description')
            ->add('devisFile', FileType::class)
            ->add('Ajouter', SubmitType::class);    }
            /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OussamaBundle\Entity\Events'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oussamabundle_events';
    }


}
