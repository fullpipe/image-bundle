<?php

namespace Fullpipe\ImageBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Build image form listener
 */
class BuildImageFormListener implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::POST_SUBMIT   => 'postSubmit',
            FormEvents::SUBMIT   => 'submit'
        );
    }

    /**
     * Submit listener
     * @param  FormEvent $event
     */
    public function submit(FormEvent $event)
    {
        $image = $event->getData();

        if ($image && $image->isNew() && !$image->hasFile()) {
            $event->setData(null);
        }
    }

    /**
     * Post form submit listener
     * @param  FormEvent $event
     */
    public function postSubmit(FormEvent $event)
    {
        $image = $event->getData();

        if ($image && $image->hasFile()) {
            $image->setPath(null);
        }
    }
}
