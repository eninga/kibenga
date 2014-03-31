<?php

namespace Media\PhotoBundle\Controller;

use Media\PhotoBundle\Entity\Albums;
use Media\PhotoBundle\Entity\AlbumViewers;
use Media\PhotoBundle\Entity\Messages;
use Media\PhotoBundle\Entity\Pictures;
use Media\PhotoBundle\Form\AlbumsType;
use Media\PhotoBundle\Form\Messages2Type;
use Media\PhotoBundle\Form\MessagesType;
use Media\PhotoBundle\Form\PicturesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhotoController
 *
 * @author eningabiye
 */
class PhotoController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('MediaPhotoBundle:Albums');
        $albums = $em->findAll();
        return $this->render('MediaPhotoBundle:Photo:album_index.html.twig', array('albums' => $albums));
    }

    public function allAlbumsAction($id) {
        // On récupère le repository
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager()->getRepository('MediaPhotoBundle:Albums');
        $album = $em->find($id);
        $viewerActive = $em->ifActiveViewers($user->getId(), $album->getId());
        if ($viewerActive || $album->getAuteur() == $user) {
            return $this->render('MediaPhotoBundle:Photo:albums.html.twig', array('album' => $album));
        } else {
            return $this->render('MediaPhotoBundle:Photo:acces_albums.html.twig', array('album' => $album));
        }
    }

    public function newAlbumAction($id = null) {
        if ($id == null) {
            $album = new Albums();
        } else {
            $em = $this->getDoctrine()->getRepository('MediaPhotoBundle:Albums');
            $album = $em->find($id);
            if ($album->getAuteur() != $this->get('security.context')->getToken()->getUser()) {
                return $this->redirect($this->generateUrl('media_photo_homepage'));
            }
        }
        $form = $this->createForm(new AlbumsType, $album);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $album->setAuteur($this->get('security.context')->getToken()->getUser());
                $em = $this->getDoctrine()->getManager();
                $em->persist($album);
                $em->flush();

                return $this->redirect($this->generateUrl('media_photo_homepage'));
            }
        }
        return $this->render('MediaPhotoBundle:Photo:newAlbum.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function newPhotoAction($id) {
        $photo = new Pictures();
        $repository = $this->getDoctrine()
                ->getRepository('MediaPhotoBundle:Albums');
        $album = $repository->find($id);
        $form = $this->createForm(new PicturesType, $photo);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $photo->setAuteur($this->get('security.context')->getToken()->getUser());
                $photo->setAlbum($album);
                $photo->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($photo);
                $em->flush();

                return $this->redirect($this->generateUrl('media_photo_homepage'));
            }
        }
        return $this->render('MediaPhotoBundle:Photo:newPhoto.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function demandeAccesAction($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('MediaPhotoBundle:Albums');

        $album = $repo->findOneById($id);
        $user = $this->get('security.context')->getToken()->getUser();
        $exist = $repo->ifViewers($user->getId(), $id);
        $deja = -1;
        if ($exist == null) {
            $viewer = new AlbumViewers();
            $viewer->setAlbum($album);
            $viewer->setUser($user);
            $em->persist($viewer);
            $em->flush();
            $deja = 0;
        } else {
            $deja = 1;
        }
        return $this->render('MediaPhotoBundle:Photo:reponseDemande.html.twig', array('deja' => $deja));
    }

    public function accesAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('MediaPhotoBundle:AlbumViewers');
        $viewers = $em->findAll();
        return $this->render('MediaPhotoBundle:Photo:demande_acces.html.twig', array('viewers' => $viewers));
    }

    public function accepteDemandeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('MediaPhotoBundle:AlbumViewers');
        $viewer = $repo->findOneById($id);
        if ($viewer->getIsActive() == 0) {
            $viewer->setIsActive(1);
            $ajoute = "acceptée";
        } else {
            $viewer->setIsActive(0);
            $ajoute = "desactivée";
        }
        $em->persist($viewer);
        $em->flush();
        return $this->render('MediaPhotoBundle:Photo:accepte.html.twig', array('tag' => $ajoute));
    }

    public function messagesSentAction() {
        $tag = "envoyés";
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('MediaPhotoBundle:Messages');
        $user = $this->get('security.context')->getToken()->getUser();
        $messages = $repo->findMyMessagesSent($user->getId());
        return $this->render('MediaPhotoBundle:Photo:messages.html.twig', array('messages' => $messages, 'tag' => $tag));
    }

    public function messagesReceiveAction() {
        $tag = "reçus";
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('MediaPhotoBundle:Messages');
        $user = $this->get('security.context')->getToken()->getUser();
        $messages = $repo->findMyMessagesReceive($user->getId());
        return $this->render('MediaPhotoBundle:Photo:messages.html.twig', array('messages' => $messages, 'tag' => $tag));
    }

    public function messageAction($source, $id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('MediaPhotoBundle:Messages');
        $user = $this->get('security.context')->getToken()->getUser();
        $message = $repo->find($id);
        if ($message->getSource() != $user) {
            $message->setRead(1);
            $em->persist($message);
            $em->flush();
        }
        $messages = $repo->findMessage($source, $user->getId());

        return $this->render('MediaPhotoBundle:Photo:message.html.twig', array('messages' => $messages));
    }

    public function sendMessageAction($dest = null, $obj = null) {
        $message = new Messages();
        if ($dest != null) {
            $form = $this->createForm(new Messages2Type, $message);
            $em = $this->getDoctrine()->getRepository('MediaUserBundle:User');
            $dest = $em->find($dest);
        } else {
            $form = $this->createForm(new MessagesType, $message);
        }
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $message->setSource($this->get('security.context')->getToken()->getUser());
                if ($dest != null) {
                    $message->setDestinataire($dest);
                    $message->setObjet("Re: " . $obj);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($message);
                $em->flush();

                return $this->redirect($this->generateUrl('media_photo_messageSent'));
            }
        }
        return $this->render('MediaPhotoBundle:Photo:sendMessages.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

}

?>
