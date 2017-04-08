<?php

namespace SUWE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConsumerController extends Controller
{
    /**
     * @Route("/", name="home_consumer")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if ($user && !$user->isAnnoncer()) return $this->redirect($this->generateUrl('dashboard_consumer'));
        return $this->render('SUWECoreBundle:Consumer:index.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard_consumer")
     */
    public function dashboardAction()
    {
        return $this->render('SUWECoreBundle:Consumer:dashboard.html.twig');
    }

    /**
     * @Route("/boutique", name="shop_consumer")
     */
    public function boutiqueAction()
    {
        return $this->render('SUWECoreBundle:Consumer:boutique.html.twig');
    }

    /**
     * @Route("/sondage/{sondage_id}", name="sondage_consumer")
     */
    public function sondageAction()
    {
        return $this->render('SUWECoreBundle:Consumer:sondage.html.twig');
    }
}
