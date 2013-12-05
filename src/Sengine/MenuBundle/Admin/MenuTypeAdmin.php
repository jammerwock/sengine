<?php
namespace Sengine\MenuBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MenuTypeAdmin extends Admin{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('title', null, array())
		;
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('title', null, array())
			->add('id', null, array())
		;
	}

	public function configureShowField(ShowMapper $showMapper){
		$showMapper
			->add('title', null, array())
			->add('id', null, array())
		;
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('title', null, array())
			->add('id', null, array())
		;
	}
}