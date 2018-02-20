<?php
/**
 * Created by PhpStorm.
 * User: Emir
 * Date: 08/02/2018
 * Time: 01:42
 */

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ProfileFormType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('surname');
    }
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

}