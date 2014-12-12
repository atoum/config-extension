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

        $reports = $container->getParameter('atoum.fields');

        foreach ($reports as $report => $fields)
        {
            if ($report === 'default')
            {
                $report = $this->script->addDefaultReport();
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
