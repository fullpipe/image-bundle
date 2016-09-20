<?php

namespace Fullpipe\ImageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Fullpipe\ImageBundle\Form\EventListener\BuildImageFormListener;
use Symfony\Component\Form\Extension\Core\Type\FileType;

/**
 * Image type.
 */
class ImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventSubscriber(new BuildImageFormListener())
            ->add('file', FileType::class, array(
                'label'     => 'fullpipe_image.form.image.file',
                'required'  => false,
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['image'] = $form->getData();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fullpipe_image_image';
    }
}
