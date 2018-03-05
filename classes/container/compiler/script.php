<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class script extends atoum\config\container\compiler
{
	public function process(ContainerBuilder $container)
	{
		$scriptDefinition = new Definition(get_class($this->script));
		$scriptDefinition->setFactory(array($this, 'getScript'));
		$scriptDefinition->setPublic(true);

		$container->setDefinition('script', $scriptDefinition);
	}

	public function getScript()
	{
		return $this->script;
	}
}
