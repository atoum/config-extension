<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class reports implements CompilerPassInterface
{
    protected $script;

    public function __construct(atoum\scripts\runner $script)
    {
        $this->script = $script;
    }

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
