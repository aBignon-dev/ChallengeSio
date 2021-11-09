<?php

namespace App\Form;

use app\Entity\Flag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FlagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nID',null,array(
                'label' => 'N° du flag'
            ))
            ->add('titreQuestion',TextareaType::class,array(
                'label' => 'Titre'
            ))
            ->add('textQuote',TextareaType::class,array(
                'label' => 'Texte'
            ))
            ->add('textReponse',TextareaType::class ,array(
                'label' => 'Réponse'
            ))
            ->add('points')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Flag::class,
        ]);
    }
}