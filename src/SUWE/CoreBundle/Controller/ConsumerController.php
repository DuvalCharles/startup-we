<?php

namespace SUWE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ConsumerController extends Controller
{
    /**
     * @Route("/", name="home_consumer")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $this->checkIfUserIsConsumer($user);

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
    public function sondageAction(Request $request, $sondage_id)
    {
        $user = $this->getUser();
        if (!$user) return $this->redirect($this->generateUrl('dashboard_consumer'));
        if (count($user->getAnsweredSondages()) > 0) return $this->redirect($this->generateUrl('dashboard_consumer'));
        $sondage = $this->getEm()->getRepository('SUWESondageBundle:Sondage')->findSondage($sondage_id);
        if ($request->request->get('done') === "done") {
            $user->setTotalPoints($user->getTotalPoints() + 25);
            $user->setNbJetons($user->getNbJetons() + 1);
            $user->addAnsweredSondage($sondage[0]);
            $this->getEm()->flush();
            return $this->redirect($this->generateUrl('dashboard_consumer'));
        }

        return $this->render('SUWECoreBundle:Consumer:sondage.html.twig', [
            'sondage' => $sondage[0]
        ]);
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

    private function checkIfUserIsConsumer($user)
    {
        if ($user && $user->getAnnoncer()) return $this->redirect($this->generateUrl('home_annonceur'));
    }

    /**
     * @return object
     */
    private function getEm()
    {
        return $this->getDoctrine()->getManager();
    }
}
