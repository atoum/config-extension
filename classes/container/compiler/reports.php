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
            if ($this->script->getRunner()->hasReports() === false)
            {
                $this->script->addDefaultReport();
            }

            return;
        }

        $this->script->getRunner()->removeReports();

        $reports = $container->getParameter('atoum.reports');

        foreach ($reports as $report)
        {
            if ($report === 'default')
            {
                $this->script->addDefaultReport();
            }
            else
            {
                if ($this->script->getRunner()->hasReports())
                {
                    $this->script->addReport($container->get($report));
                }
                else
                {

                    $this->script->setReport($container->get($report));
                }
            }
        }
    }
}
