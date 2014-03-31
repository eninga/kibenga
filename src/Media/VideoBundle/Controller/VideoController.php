<?php

namespace Media\VideoBundle\Controller;

use Media\VideoBundle\Entity\AlbumVideo;
use Media\VideoBundle\Entity\Videos;
use Media\VideoBundle\Form\AlbumType;
use Media\VideoBundle\Form\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoController
 *
 * @author eningabiye
 */
class VideoController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('MediaVideoBundle:AlbumVideo');
        $albums = $em->findAll();
        return $this->render('MediaVideoBundle:Video:albumVideo.html.twig', array('albums' => $albums));
    }

    public function videoAction($id) {
        $repository = $this->getDoctrine()
                ->getRepository('MediaVideoBundle:AlbumVideo');
        $album = $repository->find($id);
        return $this->render('MediaVideoBundle:Video:video.html.twig', array('album' => $album));
    }

    public function newAlbumAction($id = null) {
        if ($id == null) {
            $album = new AlbumVideo();
        } else {
            $em = $this->getDoctrine()->getRepository('MediaVideoBundle:AlbumVideo');
            $album = $em->find($id);
            if ($album->getAuteur() != $this->get('security.context')->getToken()->getUser()) {
                return $this->redirect($this->generateUrl('media_video_homepage'));
            }
        }
        $form = $this->createForm(new AlbumType, $album);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $album->setAuteur($this->get('security.context')->getToken()->getUser());
                $em = $this->getDoctrine()->getManager();
                $em->persist($album);
                $em->flush();

                return $this->redirect($this->generateUrl('media_video_homepage'));
            }
        }
        return $this->render('MediaPhotoBundle:Photo:newAlbum.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function newVideoAction($id) {
        $video = new Videos();
        $repository = $this->getDoctrine()
                ->getRepository('MediaVideoBundle:AlbumVideo');
        $album = $repository->find($id);
        $form = $this->createForm(new VideoType, $video);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $video->setAuteur($this->get('security.context')->getToken()->getUser());
                $video->setAlbum($album);
                $video->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($video);
                $em->flush();

                return $this->redirect($this->generateUrl('media_video_homepage'));
            }
        }
        return $this->render('MediaPhotoBundle:Photo:newAlbum.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

}

?>
