<?php

namespace SUWE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AnnonceurController extends Controller
{
    /**
     * @Route("/", name="home_annonceur")
     */
    public function indexAction()
    {
        return $this->render('SUWECoreBundle:Annoncer:index.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard_annonceur")
     */
    public function dashboardAction()
    {
        return $this->render('SUWECoreBundle:Annoncer:dashboard.html.twig');
    }

    /**
     * @Route("/sondage/creation", name="sondage_creation_annoncer")
     */
    public function sondageCreateAction()
    {
        return $this->render('SUWECoreBundle:Annoncer:sondage_create.html.twig');
    }

    /**
     * @Route("/sondage/{sondage_id}/stats", name="sondage_stats_annoncer")
     */
    public function sondageStatsAction()
    {
        return $this->render('SUWECoreBundle:Annoncer:sondage_stats.html.twig');
    }
}
