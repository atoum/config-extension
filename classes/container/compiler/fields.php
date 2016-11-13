<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class fields extends atoum\config\container\compiler
{
	public function process(ContainerBuilder $container)
	{
		if ($container->hasParameter('atoum.fields') === false)
		{
			return;
		}

		$reportsFields = $container->getParameter('atoum.fields');

		foreach ($reportsFields as $report => $fields)
		{
			$report = $container->getDefinition($report);

			foreach ($fields as $field)
			{
				$report->addMethodCall('addField', array($container->getDefinition($field)));
			}
		}
	}
}
