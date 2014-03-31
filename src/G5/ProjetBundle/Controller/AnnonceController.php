<?php

namespace G5\ProjetBundle\Controller;

use G5\ProjetBundle\Entity\Annonce;
use G5\ProjetBundle\Entity\AnnonceImages;
use G5\ProjetBundle\Entity\AnnonceReponse;
use G5\ProjetBundle\Entity\AnnonceSousReponse;
use G5\ProjetBundle\Form\AnnonceImagesType;
use G5\ProjetBundle\Form\AnnonceReponseType;
use G5\ProjetBundle\Form\DiversType;
use G5\ProjetBundle\Form\ImmobilierType;
use G5\ProjetBundle\Form\VehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of AnnonceController
 *
 * @author eningabiye
 */
class AnnonceController extends Controller {

    public function indexAction() {
        return $this->render('G5ProjetBundle:Projet:index.html.twig');
    }

    public function addSousReponseAction($idRep, $titre, $idAnnonce) {
        $reponse = new AnnonceSousReponse();
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:AnnonceReponse');
        $annonceReponse = $repository->find($idRep);
        $form = $this->createForm(new AnnonceReponseType, $reponse);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $reponse->setAuteur($this->get('security.context')->getToken()->getUser());
                $reponse->setAnnonceReponse($annonceReponse);
                $em = $this->getDoctrine()->getManager();
                $em->persist($reponse);
                $em->flush();
                 $this->get('session')->getFlashBag()->add(
                        'add_reponse', 'Votre réponse a été envoyée!'
                );
                if ($annonceReponse->getAuteur() == $this->get('security.context')->getToken()->getUser()) {
                    return $this->redirect($this->generateUrl('g5_show_annonce', array("id" => $idAnnonce, "titre" => $titre)));
                } else {
                    return $this->redirect($this->generateUrl('g5_show_mon_annonce', array("id" => $idAnnonce, "titre" => $titre)));
                }
            }
        }

        return $this->render('G5ProjetBundle:Common:addAnnonce.html.twig', array(
                    'form' => $form->createView(),
                    'tag' => ' : Réponse'));
    }

    public function deleteAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        if (!$annonce) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        if ($annonce->getAuteur() != $this->get('security.context')->getToken()->getUser()) {
            throw $this->createNotFoundException("Cette annonce ne vous appartient pas:[");
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($annonce);
        $em->flush();
         $this->get('session')->getFlashBag()->add(
                        'suppression', 'Suppression réussie!'
                );
        return $this->render('G5ProjetBundle:Annonce:delete.html.twig', array("annonce" => $annonce));
    }

    public function removeReponseAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:AnnonceReponse');
        $reponse = $repository - find($id);
        if (!$reponse) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        if ($reponse->getAuteur() != $this->get('security.context')->getToken()->getUser()) {
            throw $this->createNotFoundException("Cette annonce ne vous appartient pas:[");
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($reponse);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
                        'suppression', 'Suppression réussie!'
                );
        return $this->render('G5ProjetBundle:Annonce:delete.html.twig', array("annonce" => $reponse
                ));
    }

    public function mesAnnoncesAction() {
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('G5ProjetBundle:Annonce');

        $annonces = $repository->findMesAnnonces($this->get('security.context')->getToken()->getUser());
        return $this->render('G5ProjetBundle:Annonce:mesAnnonces.html.twig', array('annonces' => $annonces));
    }

    public function monAnnonceAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        if (!$annonce) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        if ($annonce->getAuteur() != $this->get('security.context')->getToken()->getUser()) {
            throw $this->createNotFoundException("Cette annonce ne vous appartient pas:[");
        }
        /*
          $message = Swift_Message::newInstance()
          ->setSubject('Hello Email')
          ->setFrom('support@eningabiye.com')
          ->setTo('eningabiye@yahoo.fr')
          ->setBody($this->renderView('G5ProjetBundle:Annonce:monAnnonce.html.twig', array("annonce" => $annonce)));
          $this->get('mailer')->send($message);
         */
        return $this->render('G5ProjetBundle:Annonce:monAnnonce.html.twig', array("annonce" => $annonce));
    }

    public function reponseAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        return $this->render('G5ProjetBundle:Annonce:reponse.html.twig', array("annonce" => $annonce));
    }

    public function photoAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        return $this->render('G5ProjetBundle:Annonce:photo.html.twig', array("annonce" => $annonce));
    }

    public function categoriesAction() {
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('G5ProjetBundle:AnnonceCategory');

        $categories = $repository->findAll();
        return $this->render('G5ProjetBundle:Annonce:categories.html.twig', array('categories' => $categories));
    }

    public function addAnnonceAction($category, $idCat, $id = null) {
        if ($id == null) {
            $annonce = new Annonce();
        } else {
            $repository = $this->getDoctrine()
                    ->getRepository('G5ProjetBundle:Annonce');
            $annonce = $repository->find($id);
        }
        $repo = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:AnnonceCategory');
        $annonceCategory = $repo->find($idCat);
        switch ($category) {
            case "divers": $form = $this->createForm(new DiversType, $annonce);
                break;

            case "immobilier": $form = $this->createForm(new ImmobilierType, $annonce);
                break;

            case "vehicule": $form = $this->createForm(new VehiculeType, $annonce);
            //default :echo "aucune catégory trouvé";
        }
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $annonce->setAuteur($this->get('security.context')->getToken()->getUser());
                $annonce->setAnnonceCategory($annonceCategory);
                $em = $this->getDoctrine()->getManager();
                $em->persist($annonce);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'add_annonce', 'Votre annonce a été ajoutée!'
                );
                return $this->redirect($this->generateUrl('g5_all_annonce'));
            }
        }

        return $this->render('G5ProjetBundle:Common:addAnnonce.html.twig', array(
                    'form' => $form->createView(),
                    'tag' => $category));
    }

    public function searchAction() {
        return $this->render('G5ProjetBundle:Projet:index.html.twig');
    }

    public function addReponseAction($id) {
        $reponse = new AnnonceReponse();
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        $form = $this->createForm(new AnnonceReponseType, $reponse);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $reponse->setAuteur($this->get('security.context')->getToken()->getUser());
                $reponse->setAnnonce($annonce);
                $em = $this->getDoctrine()->getManager();
                $em->persist($reponse);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'add_reponse', 'Votre réponse a été envoyée!'
                );
                return $this->redirect($this->generateUrl('g5_show_annonce', array("id" => $id, "titre" => $annonce->getTitre())));

                //return $this->redirect($this->generateUrl('g5_reponse_annonce', array("id" => $id)));
            }
        }

        return $this->render('G5ProjetBundle:Common:addAnnonce.html.twig', array(
                    'form' => $form->createView(),
                    'tag' => ' : Réponse'));
    }

    public function addPhotoAction($id) {
        $photo = new AnnonceImages();
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        if ($annonce->getAuteur() != $this->get('security.context')->getToken()->getUser()) {
            throw $this->createNotFoundException("Cette annonce ne vous appartient pas:[");
        }
        $form = $this->createForm(new AnnonceImagesType, $photo);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $photo->setAnnonce($annonce);
                $photo->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($photo);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'add_photo', 'Votre photo a été ajoutée!'
                );
                return $this->redirect($this->generateUrl('g5_show_mon_annonce', array("id" => $id, "titre" => $annonce->getTitre())));

                // return $this->redirect($this->generateUrl('g5_photo_annonce', array("id" => $id)));
            }
        }
        return $this->render('G5ProjetBundle:Common:addAnnonce.html.twig', array(
                    'form' => $form->createView(),
                    'tag' => ' : Nouvelle photo'));
    }

    public function allAction() {
        // On récupère le repository
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('G5ProjetBundle:Annonce');

        $annonces = $repository->findAll();
        return $this->render('G5ProjetBundle:Annonce:annonces.html.twig', array('annonces' => $annonces));
    }

    public function showAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('G5ProjetBundle:Annonce');
        $annonce = $repository->find($id);
        if (!$annonce) {
            throw $this->createNotFoundException("Cette annonce n'existe plus");
        }
        return $this->render('G5ProjetBundle:Annonce:showAnnonce.html.twig', array("annonce" => $annonce));
    }

}

?>
