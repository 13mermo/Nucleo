<?php

namespace Nidiap\BlogBundle\Form;

use Nidiap\BlogBundle\Entity\LinhasDePesquisa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinhasDePesquisaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('descricao')
            ->add('save', SubmitType::class, array(
                'label' => 'Salvar',
                'attr' => [
                    'class' => 'btn btn-success pull-left'
                ]
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => LinhasDePesquisa::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'nidiap_blog_bundle_linhas_de_pesquisa_type';
    }
}
