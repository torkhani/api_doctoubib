<?php

namespace AppBundle\Repository;

/**
 * SpecialityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SpecialityRepository extends \Doctrine\ORM\EntityRepository
{
    public function getSpecialities()
    {
        $qb = $this->createQueryBuilder('s')
            ->select('s.name, s.slug');

        return $qb->getQuery()->execute();
    }
}
