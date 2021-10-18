<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndiceType extends AbstractType
{
    /**
     * Construit le formulaire pour définir quels indices ont été donnés à une équipe pour un Flag précis.
     *
     * @param array $options Contient une array avec les equipes et une array avec les flags
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $data = $options['data'];
        $builder
            ->add('Equipe', ChoiceType::class, [
                'choices' => $data['equipes'],
                'choice_label' => 'Nom',
            ])
            ->add('Flag', ChoiceType::class, [
                'choices' => $data['flags'],
                'choice_label' => 'id',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // TODO
        ]);
    }
}
