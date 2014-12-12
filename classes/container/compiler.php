<?php

namespace mageekguy\atoum\config\container;

use mageekguy\atoum;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

abstract class compiler implements CompilerPassInterface
{
    protected $script;

    public function __construct(atoum\scripts\runner $script)
    {
        $this->script = $script;
    }
} 
