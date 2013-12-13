<?php
namespace Sengine\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

	public function mainMenu(FactoryInterface $factory, array $options)
	{
		$menuItems = $this->container->get('menu')->getMainMenu();
		$menu = $factory->createItem('root');

		$this->setCurrentItem($menu);

		$menu->setChildrenAttribute('class', 'nav nav-justified');
		$menu->setExtra('currentElement', 'active');

		foreach($menuItems as $item) {
			if ($item->getParent()) {
				$em = $this->container->get('doctrine')->getManager();
				$parent = $em->getRepository('SengineMenuBundle:Menu')->find($item->getParent());

				$menu[$parent->getTitle()]
					->setChildrenAttribute('class', 'dropdown-menu dropdown-menu-large row')
					->setAttribute("class", "dropdown dropdown-large")
					->addChild($item->getTitle(), array('uri' => $item->getRoute()))
					->setAttribute("class", "col-sm-6")
				;
			} else {
				$menu->addChild($item->getTitle(), array('uri' => $item->getRoute()));
			}
		}
		return $menu;
	}

	protected function setCurrentItem(ItemInterface $menu)
	{
		$menu->setCurrentUri($this->container->get('request')->getPathInfo());
	}
}