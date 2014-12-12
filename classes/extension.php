<?php

namespace mageekguy\atoum\config;

use mageekguy\atoum;
use mageekguy\atoum\observable;
use mageekguy\atoum\runner;
use mageekguy\atoum\test;
use mageekguy\atoum\config\configuration;

class extension implements atoum\extension
{
	public function __construct(atoum\configurator $configurator = null)
	{
        if ($configurator)
        {
            $parser = $configurator->getScript()->getArgumentsParser();
            $handler = function($script, $argument, $values) {
                $script->getRunner()->addTestsFromDirectory(dirname(__DIR__) . '/tests/units/classes');
            };
            $parser
                ->addHandler($handler, array('--test-ext'))
                ->addHandler($handler, array('--test-it'))
            ;
        }

		if ($configurator)
		{
            $configuration = new configuration();
            $configuration->applyTo($configurator->getScript());
		}
	}

	public function setRunner(runner $runner)
	{
		return $this;
	}

	public function setTest(test $test)
	{
		return $this;
	}

	public function handleEvent($event, observable $observable) {}
} 
