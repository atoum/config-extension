<?php

namespace mageekguy\atoum\config\configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class definition implements ConfigurationInterface
{
	const ROOT_NODE_NAME = 'atoum';
	
	public function getConfigTreeBuilder()
	{
		if (method_exists(TreeBuilder::class, '__construct')) { // conpatibility with symfony config 4.2+
			$tree = new TreeBuilder(self::ROOT_NODE_NAME);
			$root = $tree->getRootNode();
		} else {
			// TODO remove this `else` when symfony config requirements is 4.2+
			$tree = new TreeBuilder();
			$root = $tree->root(self::ROOT_NODE_NAME);
		}		

		$root
			->children()
				->booleanNode('loop')
					->defaultValue((bool) getenv('ATOUM_LOOP'))
				->end()
				->booleanNode('debug')
					->defaultValue((bool) getenv('ATOUM_DEBUG'))
				->end()
				->integerNode('verbosity')
					->defaultValue((int) getenv('ATOUM_VERBOSITY'))
				->end()

				->arrayNode('directories')
					->prototype('scalar')->end()
					->defaultValue(array_filter(explode(',', getenv('ATOUM_DIRECTORIES'))))
				->end()

				->arrayNode('reports')
					->prototype('scalar')->end()
					->defaultValue(array_filter(explode(',', getenv('ATOUM_REPORTS'))))
				->end()

				->arrayNode('fields')
					->prototype('array')
						->prototype('scalar')->end()
					->end()
				->end()

				->arrayNode('writers')
					->prototype('array')
						->prototype('scalar')->end()
					->end()
				->end()
			->end()
		;

		return $tree;
	}
}
