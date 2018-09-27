<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
  public function registerBundles()
  {
    $bundles = [
      new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
      new Symfony\Bundle\SecurityBundle\SecurityBundle(),
      new Symfony\Bundle\TwigBundle\TwigBundle(),
      new Symfony\Bundle\MonologBundle\MonologBundle(),
      new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),

      new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
      new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),

      new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

      new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),

      //Begin Sonata--Admin

      // Sonata --
      new Sonata\AdminBundle\SonataAdminBundle(),
      new Sonata\CoreBundle\SonataCoreBundle(),
      new Sonata\BlockBundle\SonataBlockBundle(),
      new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
      // ...
      new FOS\UserBundle\FOSUserBundle(),
      new Sonata\UserBundle\SonataUserBundle(),
      // ...

      new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
      new Knp\Bundle\MenuBundle\KnpMenuBundle(),

      new FR3D\LdapBundle\FR3DLdapBundle(),
      //End Sonata--Admin,

      new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
      new FOS\RestBundle\FOSRestBundle(),

      new Liip\ThemeBundle\LiipThemeBundle(),
      new Bazinga\GeocoderBundle\BazingaGeocoderBundle(),
      new Catrobat\AppBundle\AppBundle(),
      new EightPoints\Bundle\GuzzleBundle\EightPointsGuzzleBundle(),

      new \Symfony\Bundle\AclBundle\AclBundle(),
    ];

    if (in_array($this->getEnvironment(), ['dev', 'test'], true))
    {
      $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
      $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
      $bundles[] = new \Symfony\Bundle\MakerBundle\MakerBundle();
//      $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
    }

    return $bundles;
  }

  public function registerContainerConfiguration(LoaderInterface $loader)
  {
    $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
  }
}
