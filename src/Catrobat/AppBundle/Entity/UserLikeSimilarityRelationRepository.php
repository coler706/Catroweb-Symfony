<?php

namespace Catrobat\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;


/**
 * UserLikeSimilarityRelationRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserLikeSimilarityRelationRepository extends EntityRepository
{
    public function removeAllUserRelations()
    {
        $qb = $this->createQueryBuilder('ul');

        $qb
            ->delete()
            ->getQuery()
            ->execute();
    }

    public function getRelationsOfSimilarUsers(User $user)
    {
        $qb = $this->createQueryBuilder('ul');

        return $qb
            ->select('ul')
            ->where($qb->expr()->eq('ul.first_user', ':user'))
            ->orWhere($qb->expr()->eq('ul.second_user', ':user'))
            ->orderBy('ul.similarity', 'DESC')
            ->setParameter('user', $user)
            ->distinct()
            ->getQuery()
            ->getResult();
    }
}
