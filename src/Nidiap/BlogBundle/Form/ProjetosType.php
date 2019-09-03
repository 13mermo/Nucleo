<?php

namespace Nidiap\BlogBundle\Form;

use Nidiap\BlogBundle\Entity\Projetos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('autor')
            ->add('descricao')
            ->add('imagem', ImagemType::class, ['label'=>false])
            ->add('arquivo', ArquivoFileType::class, ['label' =>false])
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
            'data_class' => Projetos::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'nidiap_blog_bundle_projetos_type';
    }
}
