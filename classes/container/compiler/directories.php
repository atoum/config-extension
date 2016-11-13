<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class directories extends atoum\config\container\compiler
{
	public function process(ContainerBuilder $container)
	{
		if ($container->hasParameter('atoum.directories') === false)
		{
			return;
		}

		$this->script->addTestsFromDirectories($container->getParameter('atoum.directories'));
	}
} 
