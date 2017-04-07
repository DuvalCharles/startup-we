<?php

namespace SUWE\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;


class UserApiController extends Controller
{

    /**
     * @param Request $request
     * @return Users
     *
     * @Rest\View(statusCode=Response::HTTP_OK, serializerGroups={"user"})
     * @Rest\Get('users')
     */
    public function cgetUsersAction(Request $request)
    {
        return $this->getEm()->getRepository('UserBundle:User')->findAll();
    }


    private function getEm()
    {
        return $this->getDoctrine()->getManager();
    }

}