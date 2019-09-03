<?php

namespace Nidiap\BlogBundle\Form;


use Nidiap\BlogBundle\Entity\Noticia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoticiaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('autor')
            ->add('descricao')
            ->add('imagem', ImagemType::class, ['label'=>false])
            ->add('save', SubmitType::class, array(
                'label' => 'Salvar',
                'attr' => [
                    'class' => 'btn btn-success pull-left'
                ]
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Noticia::class,
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'nidiap_blog_bundle_noticia_type';
    }
}
