<?php

namespace mageekguy\atoum\config\container;

use mageekguy\atoum;
use mageekguy\atoum\config;
use mageekguy\atoum\config\configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class extension implements ExtensionInterface
{
    protected $script;
    protected $container;

    public function __construct(atoum\scripts\runner $script)
    {
        $this->script = $script;
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new configuration\processor();
        $configs = $processor->processConfiguration(new configuration\definition(), $configs);

        $container->setParameter('atoum.reports', $configs['reports']);
        $container->setParameter('atoum.fields', $configs['fields']);
        $container->setParameter('atoum.directories', $configs['directories']);

        if (isset($configs['loop']) && $configs['loop'] === true)
        {
            $this->script->enableLoopMode();
        }

        if (isset($configs['debug']) && $configs['debug'] === true)
        {
            $this->script->enableDebugMode();
        }

        if (isset($configs['verbosity']))
        {
            $verbosity = (int) $configs['verbosity'];

            while ($verbosity > 0)
            {
                $this->script->increaseVerbosityLevel();

                $verbosity--;
            }
        }
    }

    public function getAlias()
    {
        return 'atoum';
    }

    public function getNamespace()
    {
        return 'atoum';
    }

    public function getXsdValidationBasePath()
    {
        return __DIR__ . '/../../resources';
    }
} 
