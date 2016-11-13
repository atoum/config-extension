<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class writers extends atoum\config\container\compiler
{
	public function process(ContainerBuilder $container)
	{
		if ($container->hasParameter('atoum.writers') === false)
		{
			$container->setParameter('atoum.writers', array('report.default' => array('writer.stdout')));
		}

		$reportsWriters = $container->getParameter('atoum.writers');

		foreach ($reportsWriters as $report => $writers)
		{
			$report = $container->getDefinition($report);

			foreach ($writers as $writer)
			{
				$report->addMethodCall('addWriter', array($container->getDefinition($writer)));
			}
		}
	}
}
