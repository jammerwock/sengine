<?php
namespace Sengine\MenuBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MenuAdmin extends Admin{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('title', null, array())
			->add('route', null, array())
			->add('alias', null, array())
			->add('static', null, array('required' => false))
			->add('menuTypeId', 'sonata_type_model', array(
					'class'=>'SengineMenuBundle:MenuType',
					'property'=>'title',
					'required' => false
				)
			)
		;
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('title', null, array())
			->add('id', null, array())
			->add('route', null, array())
		;
	}

	public function configureShowField(ShowMapper $showMapper){
		$showMapper
			->add('title', null, array())
			->add('id', null, array())
			->add('route', null, array())
		;
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('title', null, array())
			->add('route', null, array())
			->add('id', null, array())
			->add('menuTypeId', 'entity', array(
					'class'=>'SengineMenuBundle:MenuType',
					'property'=>'title'
				)
			)
		;
	}
}