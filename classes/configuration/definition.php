<?php

namespace mageekguy\atoum\config\configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class definition implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder();
        $root = $tree->root('atoum');

        $root
            ->children()
                ->arrayNode('directories')
                    ->prototype('scalar')->end()
                ->end()

                ->arrayNode('reports')
                    ->prototype('scalar')->end()
                ->end()

                ->arrayNode('fields')
                    ->prototype('array')
                            ->prototype('scalar')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $tree;
    }
} 
