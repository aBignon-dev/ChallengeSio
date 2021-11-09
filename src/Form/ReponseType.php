<?php

namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbTentative')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('reussie')
            ->add('nbIndices')
            ->add('lequipe',EntityType::class, array(
                'class'        => Equipe::class,
                'choice_label' => 'nom',
                'multiple' => false ,
                'label' => 'Equipe' 
            )) 
            ->add('leflag',EntityType::class, array(
                'class'        => Flag::class,
                'choice_label' => 'titreQuestion',
                'multiple' => false ,
                'label' => 'Flag' 
            )) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}
