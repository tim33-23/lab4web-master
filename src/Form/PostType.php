<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name',null,[
                'label' => 'Название',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите название',
                    ]),
                ]
            ])
            ->add('Description',TextareaType::class,[
                'label' => 'Текст вопроса',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите текст записи блога',
                    ])
                ] 
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
