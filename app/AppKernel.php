<?php

use FOS\UserBundle\FOSUserBundle;
use Knp\Bundle\MenuBundle\KnpMenuBundle;
use Sonata\AdminBundle\SonataAdminBundle;
use Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Sengine\MainBundle\SengineMainBundle(),

	        new Sonata\BlockBundle\SonataBlockBundle(),
	        new Sonata\jQueryBundle\SonatajQueryBundle(),
	        new Knp\Bundle\MenuBundle\KnpMenuBundle(),
	        new SonataDoctrineORMAdminBundle(),
	        new Sonata\AdminBundle\SonataAdminBundle(),
	        new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
	        new FOS\UserBundle\FOSUserBundle(),
	        new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
	        new \Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
	        new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
	        new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
	        new Craue\FormFlowBundle\CraueFormFlowBundle(),
            new Sengine\MenuBundle\SengineMenuBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
