<?php

namespace Nidiap\BlogBundle\Form;

use Nidiap\BlogBundle\Entity\Arquivo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ArquivoFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arquivoFile', VichFileType::class, [
                'label'=>false,
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'download_label' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Arquivo::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'nidiap_blog_bundle_arquivo_file_type';
    }
}
