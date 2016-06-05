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
    public function __construct()
    {
        $this->container = new ContainerBuilder();
    }

    public function build(atoum\scripts\runner $script)
    {
        $this->container->registerExtension(new container\extension($script));
        $this->container
            ->addCompilerPass(new config\container\compiler\reports($script))
            ->addCompilerPass(new config\container\compiler\fields($script))
            ->addCompilerPass(new config\container\compiler\writers($script))
            ->addCompilerPass(new config\container\compiler\directories($script))
        ;

        $loader = new YamlFileLoader($this->container, new FileLocator(array(__DIR__ . '/../resources')));
        $loader->load('services.yml');

        $configFile = getcwd() . DIRECTORY_SEPARATOR . '.atoum.yml';
        if (is_file($configFile)) {
            $loader = new YamlFileLoader($this->container, new FileLocator());
            $loader->load($configFile);
        }

        $this->container->compile();
    }

    public function set($id, $service)
    {
        $this->container->set($id, $service);

        return $this;
    }
}
