<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'attr' => [
                    'placeholder' => "Nom",
                    'class' => "large",
                ],
                'label' => ' '
            ])
            ->add('surname',TextType::class,[
                'attr' => [
                    'placeholder' => "Prénom",
                    'class' => "large"
                ],
                'label' => ' '
            ])
            ->add('phone',TelType::class,[
                'attr' => [
                    'placeholder' => "Téléphone",
                    'class' => "small"
                ],
                'label' => ' '
            ])
            ->add('email', EmailType::class,[
                'attr' => [
                    'placeholder' => "E-mail",
                    'class' => "small"
                ],
                'label' => ' '
            ])
            ->add('subject',TextType::class,[
                'attr' => [
                    'placeholder' => "Objet",
                    'class' => "large"
                ],
                'label' => ' '
            ])
            ->add('messege', TextareaType::class,[
                'attr' => [
                    'placeholder' => 'Rédigez votre message ici :',
                    'class' => 'large message'
                ],
                'label' => ' '
            ])
            ->add('Envoyer', SubmitType::class,[
                'attr' => [
                    'class ' => 'button7'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}







