<?php

namespace G5\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of AppiController
 *
 * @author eningabiye
 */
class AppiController extends Controller {

    public function indexAction() {
        return $this->render('G5ProjetBundle:Common:index.html.twig');
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
