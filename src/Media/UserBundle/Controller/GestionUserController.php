<?php

namespace Media\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionUserController
 *
 * @author eningabiye
 */
class GestionUserController extends Controller {

    public function allUserAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('MediaUserBundle:User');
        $users = $em->findAll();
        return $this->render('MediaUserBundle:User:allUser.html.twig', array('users' => $users));
    }

    public function addRoleAction($username, $role) {
        $roles = "ROLE_USER";
        switch ($role) {
            case 1:$roles = "ROLE_PHOTO";
                break;
            case 2:$roles = "ROLE_VIDEO";
                break;
            case 3:$roles = "ROLE_ADMIN";
                break;

            default:$roles = "ROLE_FORBIDEN";
                break;
        }
        $user = $this->get('fos_user.util.user_manipulator');
        $tag = $user->addRole($username, $roles);
        return $this->render('MediaUserBundle:User:addRole.html.twig', array('roles' => $roles, 'tag' => $tag, 'username' => $username));
    }

    public function removeRoleAction($username, $role) {
        $roles = "ROLE_USER";
        switch ($role) {
            case 1:$roles = "ROLE_PHOTO";
                break;
            case 2:$roles = "ROLE_VIDEO";
                break;
            case 3:$roles = "ROLE_ADMIN";
                break;

            default:$roles = "ROLE_UNKNOWN";
                break;
        }
        $user = $this->get('fos_user.util.user_manipulator');
        $tag = $user->removeRole($username, $roles);
        return $this->render('MediaUserBundle:User:removeRole.html.twig', array('roles' => $roles, 'tag' => $tag, 'username' => $username));
    }

    public function indexAction($name) {

        $message = Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo('recipient@example.com')
                ->setBody($this->renderView('HelloBundle:Hello:email.txt.twig', array('name' => $name)));

        $this->get('mailer')->send($message);

        return $this->render();
    }

}

?>
