<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount', null, ["attr"=> ["class"=>"mt-2 mx-3"]])            
            ->add('startDate', null, ["attr"=> ["class"=>"mt-2 mx-3"]])
            ->add('endDate', null, ["attr"=> ["class"=>"mt-2 mx-3"]])
            ->add('subject', null, ["attr"=> ["class"=>"mt-2 mx-3"]])
            ->add('picture', null, ["attr"=> ["class"=>"mt-2 mx-3"]])
            ->add('status', null, ["attr"=> ["class"=>"mt-2 mx-3"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
