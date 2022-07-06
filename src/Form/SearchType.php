<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Ship;
use App\Entity\Type;
use App\Entity\Brand;
use App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType as TypeCheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Research a ship'
                ]
            ])
            ->add('brand', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Brand::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('type', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Type::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('size', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Size::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('premium', TypeCheckboxType::class, [
                'label' => 'Premium spaceships',
                'required' => false,
            ])
        // mettre le guillemet ici = bonne pratique
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]); 
    }

    public function getBlockPrefix()
    {
        return '';
    }
}