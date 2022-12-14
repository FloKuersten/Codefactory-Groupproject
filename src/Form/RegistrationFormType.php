<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, array("attr"=> ["class"=>"form-control inputBackground m-auto border-0 text-dark", "id"=>"inputFieldBackground"]))
        ->add('last_name', TextType::class,array("attr"=> ["class"=>"form-control inputBackground m-auto border-0 text-dark", "id"=>"inputFieldBackground"]))
        
        ->add('birthday', DateType::class,array("attr"=> ["class"=>"form-control inputBackground m-auto border-0 text-dark", "id"=>"inputFieldBackground"]))

            ->add('email', null, array("attr"=> ["class"=>"form-control inputBackground m-auto border-0 text-dark", "id"=>"inputFieldBackground"]))
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                "attr"=> ["class"=>"form-control inputBackground m-auto border-0 text-dark", 'autocomplete' => 'new-password', "id"=>"inputFieldBackground"],
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
