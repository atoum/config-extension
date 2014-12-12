<?php

namespace mageekguy\atoum\config;

use mageekguy\atoum;

class configuration
{
    public function applyTo(atoum\scripts\runner $script)
    {
        $container = new atoum\config\container();
        $container->build($script);
    }
} 
