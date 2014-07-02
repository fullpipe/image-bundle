<?php

namespace Fullpipe\ImageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

use Fullpipe\ImageBundle\Form\EventListener\BuildImageFormListener;

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
            ->add('file', 'file', array(
                'label'        => 'fullpipe_image.form.image.file',
                'required' => false,
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
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'sortable' => true,
            'property_path'      => 'id',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fullpipe_image_image';
    }
}
