<?php

namespace App\Form;

use App\Entity\Membro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nome')
            ->add('cpf')
            ->add('nascimento')
            ->add('email')
            ->add('telefone')
            ->add('logradouro')
            ->add('cidade')
            ->add('estado')
            ->add('igreja_pertencente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membro::class,
        ]);
    }
}
