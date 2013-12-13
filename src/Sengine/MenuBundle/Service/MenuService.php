<?php
namespace Sengine\MenuBundle\Service;

use Symfony\Component\DependencyInjection\Container;

class MenuService
{
	private $doctrine;
	private $container;
	private $menuRepository;

	public function __construct(Container $container)
	{
		$this->container = $container;
		$this->doctrine = $this->container->get('doctrine');
		$this->menuRepository = $this->doctrine->getRepository('SengineMenuBundle:Menu');
	}

	public function getMainMenu()
	{
		return $this->menuRepository->getMainMenu();
	}
}