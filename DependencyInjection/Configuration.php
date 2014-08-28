<?php

namespace Fullpipe\ImageBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fullpipe_image');

        $rootNode
            ->children()
                ->scalarNode('data_root')->isRequired()->end()
                ->scalarNode('web_root')->isRequired()->end()
            ->end()
            ;

        return $treeBuilder;
    }
}
