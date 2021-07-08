<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextareaType::class)
            ->add('username', TextType::class)
            ->add('password', TextType::class)
            // ->add('roles')
            ->add('save', SubmitType::class,
                ['label' => 'Save User'])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'ADMIN' => 'ADMIN',
                    'PAGE_1' => 'PAGE_1',
                    'PAGE_2' => 'PAGE_2'
             ]]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
