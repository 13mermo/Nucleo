<?php

namespace Nidiap\BlogBundle\Form;

use Nidiap\BlogBundle\Entity\Imagem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'label'=>false,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => false,
                'required' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Imagem::class,
        ));

    }

    public function getBlockPrefix()
    {
        return 'nidiap_blog_bundle_imagem_type';
    }
}
