<?php

namespace G5\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of CommonController
 *
 * @author eningabiye
 */
class CommonController extends Controller {

    public function indexAction() {
        return $this->render('G5ProjetBundle:Common:index.html.twig');
    }

    public function messageSizeAction() {
        $repository = $this->getDoctrine()
                ->getManager();
        //$messages = count($repository->getRepository('G5ProjetBundle:Messages')->findAll());

        return $this->render('G5ProjetBundle:Common:message_size.html.twig', array('messages' => "0"));
    }

    public function jobSizeAction() {
        $repository = $this->getDoctrine()
                ->getManager();
        $jobs = count($repository->getRepository('G5ProjetBundle:Jobs')->findAll());
        return $this->render('G5ProjetBundle:Common:job_size.html.twig', array('jobs' => $jobs));
    }

    public function annonceSizeAction() {
        $repository = $this->getDoctrine()
                ->getManager();
        $annonces = count($repository->getRepository('G5ProjetBundle:Annonce')->findAll());
        return $this->render('G5ProjetBundle:Common:annonce_size.html.twig', array('annonces' => $annonces));
    }

    public function searchAction(Request $request) {
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $msg = $request->request->get('category');
            switch ($msg) {
                case 'job':return $this->redirect($this->generateUrl('g5_job_all_job'));
                    break;
                case 'annonce':return $this->redirect($this->generateUrl('g5_all_annonce'));
                    break;

                default:
                    break;
            }
        }
    }

    public function translateAction($val) {
        $request = $this->getRequest();
        $locale = $request->getLocale();
        if ($locale != $val) {
            $request->setLocale($val);
        }
        $this->get('session')->set('_locale', $val);
        return $this->render('G5ProjetBundle:Common:index.html.twig');
    }

}

?>
