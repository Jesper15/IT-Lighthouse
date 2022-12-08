<?php

namespace App\Form\Events\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateEventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('address', TextType::class)
            ->add('description', TextType::class)
            ->add('datetime', DateTimeType::class, [
                'input' => 'datetime_immutable',
                'mapped' => false
            ])
            ->add('submit', SubmitType::class)
            ->getForm();
    }
}