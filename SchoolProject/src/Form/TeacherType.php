<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class , ['attr'=> ['class' => 'form-control has-feedback-left']])
            ->add('username' ,TextType::class , ['attr'=> ['class' => 'form-control has-feedback-left']])
            ->add('address' ,TextType::class , ['attr'=> ['class' => 'form-control has-feedback-left']])
            ->add('nbPhone' ,TextType::class , ['attr'=> ['class' => 'form-control has-feedback-left']])
            ->add('mail' ,TextType::class , ['attr'=> ['class' => 'form-control has-feedback-left']])
            ->add('valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
