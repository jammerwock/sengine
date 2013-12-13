<?php
namespace Sengine\MenuBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\Query\ResultSetMapping;

class MenuRepository extends EntityRepository
{
	public function getMainMenu()
	{
		return $this->findBy(array('menuTypeId' => 1));
	}
}