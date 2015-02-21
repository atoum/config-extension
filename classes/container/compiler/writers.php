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

        $reportsWriters = $container->getParameter('atoum.writers');

        if ($this->script->getRunner()->hasReports() === false)
        {
            $report = $this->script->addDefaultReport();
        }

        $reports = $this->script->getReports();

        foreach ($reportsWriters as $report => $writers)
        {
            if ($report === 'default')
            {
                $report = $reports[0];
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
