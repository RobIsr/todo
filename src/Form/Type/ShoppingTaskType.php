<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ShoppingTaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Title', TextType::class)
        ->add('Products', CollectionType::class,
            array (
                    'entry_type'    => TextType::class,
                    'entry_options' => [
                        'label' => 'Product',
                    ],
                    'label' => 'Add and remove products and press Save.',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'attr' => array(
                        'class' => 'my-selector',
                    ),
                )
            )
            ->add('Save', SubmitType::class)
        ;
    }
}