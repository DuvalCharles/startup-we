<?php

namespace SUWE\CoreBundle\Controller;

use SUWE\SondageBundle\Entity\Question;
use SUWE\SondageBundle\Entity\Response;
use SUWE\SondageBundle\Entity\Sondage;

use SUWE\SondageBundle\Form\Type\SondageCreateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AnnonceurController extends Controller
{
    /**
     * @Route("/", name="home_annonceur")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if ($user && $user->isAnnoncer()) return $this->redirect($this->generateUrl('dashboard_annonceur'));
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
    public function sondageCreateAction(Request $request)
    {
        $sondage = new Sondage();
        $form = $this->createForm(SondageCreateType::class, $sondage);
        $form->handleRequest($request);
        $questionsArr = [];

        if ($form->isValid() && $form->isSubmitted()) {
            foreach ($request->request as $key => $value) {

                if (!is_array($value)) {
                    $nbQuestion = $sondage->getNbQuestions();
                    if (strpos($key, "intitule")) {
                        $index = explode("-", $key)[1];
                        $questionsArr[$index] = [];
                        $question = new Question();
                        $question->setTitle($value);
                        array_push($questionsArr[$index], $question);
                    }

                    if (strpos($key, "type")) {
                        $index = explode("-", $key)[1];
                        if (!$value) $questionsArr[$index][0]->setType('Binaire');
                        else  $questionsArr[$index][0]->setType($value);
                    }

                    if (strpos($key, 'response')) {
                        $response = new Response();
                        $response->setTitle($value);
                        $questionsArr[$index][0]->addResponse($response);
                    }

                }
            }
            foreach ($questionsArr as $question) {
                $sondage->addQuestion($question[0]);
            }
            $sondage->setCreator($this->getUser());
            $this->getDoctrine()->getManager()->persist($sondage);
            $this->getDoctrine()->getManager()->flush();

        }


        dump($questionsArr);
        return $this->render('SUWECoreBundle:Annoncer:sondage_create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sondage/{sondage_id}/stats", name="sondage_stats_annoncer")
     */
    public
    function sondageStatsAction()
    {
        return $this->render('SUWECoreBundle:Annoncer:sondage_stats.html.twig');
    }
}
