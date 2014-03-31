<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository {

    public function findMesAnnonces($user) {
        $mesAnnonces = $this->getEntityManager()
                        ->createQuery(
                                'SELECT a
                        FROM G5ProjetBundle:Annonce a
                        WHERE a.auteur = :user '
                        )->setParameter('user', $user);
        return $mesAnnonces->getResult();
    }
    
     public function findLength() {
        $mesAnnonces = $this->getEntityManager()
                        ->createQuery(
                                'SELECT COUNT(titre)
                        FROM G5ProjetBundle:Annonce
                        WHERE closed=0
                        AND isActive=1'
                        );
        return $mesAnnonces->getResult();
    }

}
