<?php

namespace App\EventSubscriber;

use App\Entity\Ship;
use App\Entity\ShipImages;
use App\Entity\Brand;
use App\Entity\Size;
use App\Entity\Type;
use App\Entity\Users;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setDateAndUser'],
        ];
    }

    public function setDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (($entity instanceof Ship)) {
            $now = new DateTime('now');
            $entity->setCreatedAt($now);
        }

        if (($entity instanceof ShipImages)) {
            $now = new DateTime('now');
            $entity->setCreatedAt($now);
        }

        if (($entity instanceof Brand)) {
            $now = new DateTime('now');
            $entity->setCreatedAt($now);
        }

        if (($entity instanceof Size)) {
            $now = new DateTime('now');
            $entity->setCreatedAt($now);
        }

        if (($entity instanceof Type)) {
            $now = new DateTime('now');
            $entity->setCreatedAt($now);
        }

        return;
    }
}

