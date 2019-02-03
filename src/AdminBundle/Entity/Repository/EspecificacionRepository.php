<?php
/**
 * Created by PhpStorm.
 * User: Camilo
 * Date: 29/08/2017
 * Time: 11:20
 */

namespace AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class EspecificacionRepository extends EntityRepository
{
    public function findByCategoria($categoria_id)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT e FROM AdminBundle:Especificacion e WHERE e.categoria = :categoria_id');
        $query->setParameter('categoria_id', $categoria_id);
        return $query->getArrayResult();
    }
}