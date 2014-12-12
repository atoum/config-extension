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
            return;
        }

        $reports = $container->getParameter('atoum.writers');

        foreach ($reports as $report => $writers)
        {
            if ($report === 'default')
            {
                $report = $this->script->addDefaultReport();
            }
            else
            {
                $report = $container->get($report);
            }

            foreach ($writers as $writer)
            {
                $report->addWriter($container->get($writer));
            }
        }
    }
} 
