<?php
/**
 * Created by PhpStorm.
 * User: proox
 * Date: 10/08/18
 * Time: 01:57
 */

namespace CoreBaseBundle\Services\RoutingInjection;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RouteServiceProvider extends Loader
{

    public function load($resource, $type = null)
    {
        $getBundles = preg_grep('/^([^.])/', array_diff(scandir(__DIR__. '/../../../', 1), array('..', '.')));
        $routes = new RouteCollection();
        foreach ($getBundles as $bundle)
        {
            if(file_exists(__DIR__. '/../../../'.$bundle.'/Resources/config/routing.yml'))
            {
                $resource = '@'.$bundle.'/Resources/config/routing.yml';
                $type = 'yaml';
                $importedRoutes = $this->import($resource, $type);
                $routes->addCollection($importedRoutes);
            }
        }
        return  $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'routing_injection' === $type;
    }
}

