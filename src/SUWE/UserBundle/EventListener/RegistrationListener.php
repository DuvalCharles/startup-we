<?php

namespace SUWE\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\Asset\Packages;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class RegistrationListener
 * @package SUWE\UserBundle\EventListener
 */
class RegistrationListener implements EventSubscriberInterface
{
    private $assets;
    private $routerInterface;

    public function __construct(Packages $assets, RouterInterface $routerInterface)
    {
        $this->assets = $assets;
        $this->routerInterface = $routerInterface;
    }

    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::REGISTRATION_CONFIRMED => 'onRegistrationConfirmed'
        ];
    }

    public function onRegistrationConfirmed($event)
    {
        exit(dump('salut'));
        $event->setResponse(new RedirectResponse(
            $this->routerInterface->generate('dashboard_consumer')
        ));
    }
}