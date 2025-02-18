<?php

namespace App\Form;

use App\Entity\Cirujano;
use App\Entity\Quirofano;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuirofanoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codigoQuirofano')
            ->add('estado')
            ->add('cirujanos', EntityType::class, [
                'class' => Cirujano::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quirofano::class,
        ]);
    }
}
