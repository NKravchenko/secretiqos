<?php

namespace Affect\MiniCoreBundle\Repository;

use Affect\MiniCoreBundle\Entity\User;
use Affect\MiniCoreBundle\Enum\CriteriaMatchType;
use Affect\MiniCoreBundle\Enum\StatusType;
use Affect\MiniCoreBundle\Enum\TypeOfRecruitmentType;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{

    /**
     * @param array $params
     *
     * @return User[]
     */
    public function findByAdminCredentials($params = [])
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.id > 5')
            ->orderBy('u.createdAt', 'ASC')
        ;

        if (isset($params['agency'])) {
            $qb->andWhere('u.reffered = ' . $params['agency']);
        }

        if (!isset($params['pr'])) {
            $qb->andWhere('u.typeOfRecruitment != ' . TypeOfRecruitmentType::PR);
        }

        if (!isset($params['view_not_match_users'])) {
            $qb->andWhere('u.matchCriteria != ' . CriteriaMatchType::NO);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @return User[]
     */
    public function findAllUsers()
    {
        return $this->findByAdminCredentials(['vip' => true]);
    }
}