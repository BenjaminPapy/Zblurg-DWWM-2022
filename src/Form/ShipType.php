<?php

namespace App\Form;

use App\Entity\Ship;
use App\Entity\Type;
use App\Entity\Brand;
use App\Entity\ShipView;
use App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ShipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Name of the ship'
                ],
            ])
            ->add('slug', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Name for the url'
                ],
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name',
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Type of the ship'
                ],
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
                'choice_label' => 'name',
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Brand of the ship'
                ],
            ])
            ->add('size', EntityType::class, [
                'class' => Size::class,
                'choice_label' => 'name',
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Size of the ship'
                ],
            ])
            ->add('description', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Description of the ship'
                ],
            ])
            ->add('length', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Length of the ship'
                ],
            ])
            ->add('beam', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Beam of the ship'
                ],
            ])
            ->add('height', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Height of the ship'
                ],
            ])
            ->add('mass', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'mass of the ship'
                ],
            ])
            ->add('cargoCap', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Cargo capacity of the ship'
                ],
            ])
            ->add('scmSpeed', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'SCM speed of the ship'
                ],
            ])
            ->add('afterburnSpeed', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'AfterBurn speed of the ship'
                ],
            ])
            ->add('minCrew', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Minimum Crew for the ship'
                ],
            ])
            ->add('maxCrew', null, [
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Maximum crew for the ship'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ship::class,
        ]);
    }
}
