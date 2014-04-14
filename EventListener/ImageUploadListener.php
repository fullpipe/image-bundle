<?php
namespace Fullpipe\ImageBundle\EventListener;

use Fullpipe\ImageBundle\Uploader\ImageUploaderInterface;
use Fullpipe\ImageBundle\Entity\ImageInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;

class ImageUploadListener implements EventSubscriber
{
    protected $uploader;

    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
            'onFlush',
            'preRemove'
        );
    }

    public function prePersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if ($entity instanceOf ImageInterface) {
            if ($entity->hasFile()) {
                $this->uploader->upload($entity);
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $event)
    {
        $this->prePersist($event);
    }

    public function onFlush(OnFlushEventArgs $event)
    {
        $em = $event->getEntityManager();
        $uow = $em->getUnitOfWork();

        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if ($entity instanceOf ImageInterface) {
                if ($entity->isNew() && !$entity->hasFile()) {
                    $uow->detach($entity);
                }
            }
        }
    }

    public function preRemove(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if ($entity instanceOf ImageInterface) {
            $this->uploader->remove($entity);
        }
    }
}
