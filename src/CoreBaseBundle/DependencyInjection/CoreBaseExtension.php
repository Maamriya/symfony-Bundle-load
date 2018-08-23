<?php
/**
 * Created by PhpStorm.
 * User: proox
 * Date: 10/08/18
 * Time: 08:46
 */
namespace CoreBaseBundle\DependencyInjection;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CoreBaseExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('config.yml');
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $configs = array_merge($config,Yaml::parse(file_get_contents(__DIR__.'/../Resources/config/config.yml'))['parameters']['core_base']);

        foreach ($configs as $key => $attribute) {
            if(is_array($attribute) && strpos($key, '_in') !== false)
            {
                foreach ($attribute as $param => $value)
                    $container->setParameter('core_base.'.$key.'.'.$param, $value);
            }
            else{
                $container->setParameter('core_base.'.$key, $attribute);
            }
        }
    }

    public function getAlias()
    {
        return 'core_base';
    }

    public function getNamespace()
    {
        return 'CoreBaseBundle';

    }

    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/';
    }
}