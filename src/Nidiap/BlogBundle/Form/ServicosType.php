<?php

namespace Nidiap\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServicosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('descricao')
            ->add('imagem', ImagemType::class, ['label'=>false])
            ->add('save', SubmitType::class, array(
                'label' => 'Salvar',
                'attr' => [
                    'class' => 'btn btn-success pull-left'
                ]
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'nidiap_blog_bundle_servicos_type';
    }
}
