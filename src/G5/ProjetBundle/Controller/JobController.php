<?php

namespace G5\ProjetBundle\Controller;

use G5\ProjetBundle\Entity\Category;
use G5\ProjetBundle\Entity\JobCategory;
use G5\ProjetBundle\Entity\JobPostulat;
use G5\ProjetBundle\Entity\Jobs;
use G5\ProjetBundle\Form\CategoryType;
use G5\ProjetBundle\Form\JobCategoryType;
use G5\ProjetBundle\Form\JobPostulatType;
use G5\ProjetBundle\Form\JobsType;
use HTML2PDF;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller {

    public function indexAction() {
        return $this->render('G5ProjetBundle:Job:index.html.twig');
    }

    public function myJobAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Jobs');
        $job = $repository->find($id);
        if (!$job) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        if ($job->getAuteur()!=$this->get('security.context')->getToken()->getUser()) {
            throw $this->createNotFoundException("Cette annonce ne vous appartient pas:[");
        }
        return $this->render('G5ProjetBundle:Job:myJob.html.twig', array("job" => $job));
    }

    public function myJobsAction() {
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('G5ProjetBundle:Jobs');

        $jobs = $repository->findMesJobs($this->get('security.context')->getToken()->getUser());
        return $this->render('G5ProjetBundle:Job:myJobs.html.twig', array('jobs' => $jobs));
    }

    public function showAnnonceAction() {
        // On récupère le repository
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('G5ProjetBundle:Annonces');

        $annonces = $repository->findAll();
        return $this->render('G5ProjetBundle:Job:showAnnonce.html.twig', array('annonces' => $annonces));
    }

    public function createAction() {
        $category = new Category();
        // On crée le FormBuilder grâce à la méthode du contrôleur
        //$formBuilder = $this->createFormBuilder($category);
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        //$formBuilder
        //     ->add('name', 'text')
        //     ->add('description', 'textarea');
        // À partir du formBuilder, on génère le formulaire
        //$form = $formBuilder->getForm();
        // On récupère la requête
        //____________________________
        $form = $this->createForm(new CategoryType, $category);
        $request = $this->get('request');

        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $category contient les valeurs entrées dans le formulaire par le visiteur
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On l'enregistre notre objet $category dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();

                // On redirige vers la page de visualisation de l'category nouvellement créé
                return $this->redirect($this->generateUrl('g5_job_cat_show', array('id' => $category->getId())));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
        // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('G5ProjetBundle:Job:addCategory.html.twig', array(
                    'form' => $form->createView(),
                ));
        /* ->add('auteur', 'text')
          ->add('publication', 'checkbox');
          $category->setName('Immobilier');
          $category->setDescription('maisons, terrains, ...');

          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($category);
          $em->flush();
         * 
         */

        //return new Response('la category a été créé avec id ' . $category->getId());
    }

    public function showAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:JobCategory');

        $category = $repository->find($id);

        if (!$category) {
            throw $this->createNotFoundException('categorie non trouvé avec id ' . $id);
        }

        // faire quelque chose comme envoyer l'objet $product à un template
        return new Response('la category  ' . $category->getName() . $category->getId() . ' trouvée');
        //return $this->render('G5ProjetBundle:Job:index.html.twig',array("category"=>$id));
    }

    public function updateAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $category = $em->getRepository('G5ProjetBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException('No product found for id ' . $id);
        } else {

            $category->setName('Informatiques');
            $em->flush();

            return $this->redirect($this->generateUrl('g5_job_cat_show', array('id' => $id)));
        }
    }

    public function traductionAction($name) {
        return $this->render('G5ProjetBundle:Job:traduction.html.twig', array(
                    'name' => $name
                ));
    }

    public function addJobCategoryAction() {
        $category = new JobCategory();

        $form = $this->createForm(new JobCategoryType, $category);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();
                return $this->redirect($this->generateUrl('g5_job_add_job'));
            }
        }

        return $this->render('G5ProjetBundle:Job:addJobCategory.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function addJobAction($id = null) {
        if ($id == null) {
            $job = new Jobs();
        } else {
            $repository = $this->getDoctrine()
                    ->getRepository('G5ProjetBundle:Jobs');
            $job = $repository->find($id);
        }
        $form = $this->createForm(new JobsType, $job);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $job->setAuteur($this->get('security.context')->getToken()->getUser());
                $em = $this->getDoctrine()->getManager();
                $em->persist($job);
                $em->flush();

                return $this->redirect($this->generateUrl('g5_job_all_job'));
            }
        }

        return $this->render('G5ProjetBundle:Job:newJob.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function allJobsAction() {
        // On récupère le repository
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('G5ProjetBundle:Jobs');

        $jobs = $repository->findAll();
        return $this->render('G5ProjetBundle:Job:allJobs.html.twig', array('jobs' => $jobs));
    }

    public function showJobAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Jobs');
        $job = $repository->find($id);
        if (!$job) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        return $this->render('G5ProjetBundle:Job:showJob.html.twig', array("job" => $job));
    }

    public function showJobPdfAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Jobs');
        $job = $repository->find($id);
        if (!$job) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        ob_start();
        $html = $this->renderView('G5ProjetBundle:Job:showJobPdf.html.twig', array("job" => $job));
        ob_get_clean();

        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html, isset($_GET['vuehtml']));
        $fichier = $html2pdf->Output($job->getTitre() . '.pdf');

        $response = new Response();
        $response->clearHttpHeaders();
        $response->setContent(file_get_contents($fichier));
        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-disposition', 'filename = ' . $fichier);

        return $response;
    }

    public function addReponseAction($id) {
        $reponse = new JobPostulat();
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Jobs');
        $job = $repository->find($id);
        $form = $this->createForm(new JobPostulatType, $reponse);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $reponse->setAuteur($this->get('security.context')->getToken()->getUser());
                $reponse->setJob($job);
                $reponse->uploadCv();
                $reponse->uploadLm();
                $em = $this->getDoctrine()->getManager();
                $em->persist($reponse);
                $em->flush();
                return $this->redirect($this->generateUrl('g5_job_all_job'));
            }
        }

        return $this->render('G5ProjetBundle:Common:addAnnonce.html.twig', array(
                    'form' => $form->createView(),
                    'tag' => ' : Réponse'));
    }

}

