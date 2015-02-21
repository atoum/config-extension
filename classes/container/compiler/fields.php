<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class fields extends atoum\config\container\compiler
{
    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('atoum.fields') === false)
        {
            return;
        }

        $reportsFields = $container->getParameter('atoum.fields');

        if ($this->script->getRunner()->hasReports() === false)
        {
            $report = $this->script->addDefaultReport();
        }

        $reports = $this->script->getReports();

        foreach ($reportsFields as $report => $fields)
        {
            if ($report === 'default')
            {
                $report = $reports[0];
            }
            else
            {
                $report = $container->get($report);
            }

            foreach ($fields as $field)
            {
                $report->addField($container->get($field));
            }
        }
    }
}
