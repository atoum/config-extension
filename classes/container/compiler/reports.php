<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class reports extends atoum\config\container\compiler
{
	public function process(ContainerBuilder $container)
	{
		if ($container->hasParameter('atoum.reports') === false)
		{
			$container->setParameter('atoum.reports', array('report.default'));
		}

		$this->script->getRunner()->removeReports();

		$reports = $container->getParameter('atoum.reports');

		foreach ($reports as $report)
		{
			$container->getDefinition('script')->addMethodCall('addReport', array($container->getDefinition($report)));
		}
	}
}
