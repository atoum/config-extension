<?php

namespace mageekguy\atoum\config\container\compiler;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class directories implements CompilerPassInterface
{
    protected $script;

    public function __construct(atoum\scripts\runner $script)
    {
        $this->script = $script;
    }

    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('atoum.directories') === false)
        {
            return;
        }

        $this->script->addTestsFromDirectories($container->getParameter('atoum.directories'));
    }
} 
