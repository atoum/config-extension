<?php

namespace mageekguy\atoum\config;

use mageekguy\atoum;
use mageekguy\atoum\config;
use mageekguy\atoum\config\container;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class container
{
    public function build(atoum\scripts\runner $script)
    {
        $container = new ContainerBuilder();
        $container->registerExtension(new container\extension($script, $container));
        $container
            ->addCompilerPass(new config\container\compiler\reports($script))
            ->addCompilerPass(new config\container\compiler\fields($script))
            ->addCompilerPass(new config\container\compiler\directories($script))
        ;

        $loader = new YamlFileLoader($container, new FileLocator(array(__DIR__ . '/../resources', getcwd())));
        $loader->load('services.yml');
        $loader->load('.atoum.yml');

        $container->compile();
    }
} 
