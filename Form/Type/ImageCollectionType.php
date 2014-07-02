<?php

namespace Fullpipe\ImageBundle\Form\Type;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Braincrafted\Bundle\BootstrapBundle\Form\Type\BootstrapSortableCollectionType;

/**
 * Image collection. For using with https://github.com/fullpipe/bootstrap-bundle/tree/sortable-form
 */
class ImageCollectionType extends BootstrapSortableCollectionType
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        $view->vars = array_replace(
            $view->vars,
            array(
                'image_col' => $options['image_col'],
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver
            ->setDefaults(array(
                'image_col' => 1,
            ))
            ->addAllowedTypes(array(
                'image_col' => array('integer')
            ));
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'collection';
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'image_collection';
    }
}
