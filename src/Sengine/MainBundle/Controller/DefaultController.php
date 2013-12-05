<?php

namespace Sengine\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	/**
	 * @Template
	 *
	 * @return array
	 */
	public function indexAction()
    {
        return array();
//        return $this->render('SengineMainBundle:Default:index.html.twig', array('name' => $name));
    }
}
