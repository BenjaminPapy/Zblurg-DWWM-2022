<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditUsersAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('planet', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your planet',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your planete does not exist',
                        // max length allowed by Symfony for security reasons
                        'max' => 20,
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Planete'
                ]
            ])
            ->add('area', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your area',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your area does not exist',
                        // max length allowed by Symfony for security reasons
                        'max' => 20,
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Area'
                ]
            ])
            ->add('city', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a city',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your city does not exist',
                        // max length allowed by Symfony for security reasons
                        'max' => 20,
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'City'
                ]
            ])
            ->add('zipCode', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your zipcode',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your zipcode does not exist',
                        // max length allowed by Symfony for security reasons
                        'max' => 20,
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Zip code'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
