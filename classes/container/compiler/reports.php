<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class reports extends atoum\config\container\compiler
{
    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('atoum.reports') === false)
        {
            return;
        }

        $reports = $container->getParameter('atoum.reports');

        foreach ($reports as $report)
        {
            $this->script->addReport($container->get($report));
        }
    }
} 
