<?php

namespace Fullpipe\ImageBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BuildImageFormListener implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::POST_SUBMIT   => 'postSubmit'
        );
    }

    /**
     * Post form submit listener
     * @param  FormEvent $event
     */
    public function postSubmit(FormEvent $event)
    {
        $image = $event->getData();

        if ($image->hasFile()) {
            $image->setPath(null);
        }
    }
}
