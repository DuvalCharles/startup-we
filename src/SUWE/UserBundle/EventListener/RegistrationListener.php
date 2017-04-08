<?php

namespace SUWE\UserBundle\EventListener;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;


class RoutesListener
{
    private $routerInterface;
    private $tokenStorageInterface;

    public function __construct(RouterInterface $routerInterface, TokenStorageInterface $tokenStorageInterface)
    {
        $this->routerInterface = $routerInterface;
        $this->tokenStorageInterface = $tokenStorageInterface;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $routeName = $request->get('_route');

        if ($routeName === 'fos_user_registration_confirmed') {
            return $event->setResponse(
                new RedirectResponse(
                    $this->routerInterface->generate('dashboard_consumer')
                ));
        }

        return false;

    }
}
