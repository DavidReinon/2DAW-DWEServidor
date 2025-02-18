<?php

namespace App\Form;

use App\Entity\Cirujano;
use App\Entity\Enfermo;
use App\Entity\Quirofano;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CirujanoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('especialidad')
            ->add('enfermo', EntityType::class, [
                'class' => Enfermo::class,
                'choice_label' => 'id',
            ])
            ->add('quirofanos', EntityType::class, [
                'class' => Quirofano::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cirujano::class,
        ]);
    }
}
