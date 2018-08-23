<?php

namespace CoreBaseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use CoreBaseBundle\DependencyInjection as BaseConfiguration;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('core_base');

        $rootNode
            ->children()
            ->scalarNode('src_dir')->defaultValue('%kernel.project_dir%')->end()
            ->scalarNode('alias')->defaultValue('dddd')->end()
            ->scalarNode('app_id')->defaultValue('ssssssss')->end()
            ->scalarNode('secret')->defaultValue('')->end()
            ->arrayNode('cookie_in')
                ->children()
                    ->scalarNode('new')->defaultValue('')->end()
                    ->scalarNode('hous')->defaultValue('iiiiiii')->end()
                ->end()
            ->end()
            ->arrayNode('permissions')
            ->canBeUnset()->prototype('scalar')->end()->end()
            ->end()
        ;
        return $treeBuilder;
    }
}