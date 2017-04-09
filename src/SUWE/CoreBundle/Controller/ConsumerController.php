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

    /**
     * @Route("/loterie", name="loterie_consumer")
     */
    public function loterieAction()
    {
        $lot = null;
        $lots = $this->getEm()->getRepository('SUWESondageBundle:Lot')
            ->findAvailableLots();
        if (count($lots) > 0) {
            $lot = $lots[0];
        }
        return $this->render('SUWECoreBundle:Consumer:loterie.html.twig', array(
            'lot' => $lot
        ));
    }

    /**
     * @Route("/lot/{id}/{userId}", name="lot_code")
     */
    public function lotAction($id, $userId)
    {
        $lot = $this->getEm()->getRepository('SUWESondageBundle:Lot')
            ->find($id);
        $lot->setIsAvailable(false);

        $user = $this->getEm()->getRepository('SUWEUserBundle:User')
            ->find($userId);

        $user->setNbJetons($user->getNbJetons() - 1);
        
        $this->getEm()->persist($lot);
        $this->getEm()->persist($user);

        $this->getEm()->flush();

        return $this->render('SUWECoreBundle:Consumer:lot.html.twig', array(
            'lot' => $lot
        ));
    }

    /**
     * @return object
     */
    private function getEm()
    {
        return $this->getDoctrine()->getManager();
    }
}
