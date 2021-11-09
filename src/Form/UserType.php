<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('nom')
            ->add('prenom')
            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('lequipe',EntityType::class, array(
                'class'        => Equipe::class,
                'choice_label' => 'nom',
                'multiple' => false ,
                'label' => 'Equipe' 
            )) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
