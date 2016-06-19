<?php

namespace mageekguy\atoum\config;

use mageekguy\atoum;

$vendorDirectory = __DIR__ . '/vendor';

if (is_dir($vendorDirectory) === false)
{
	$vendorDirectory = __DIR__ . '/../..';
}

atoum\autoloader::get()
	->addNamespaceAlias('atoum\config', __NAMESPACE__)
	->addDirectory(__NAMESPACE__, __DIR__ . DIRECTORY_SEPARATOR . 'classes')
	->addDirectory('Symfony\Component\Config', $vendorDirectory . '/symfony/config/Symfony/Component/Config')
	->addDirectory('Symfony\Component\DependencyInjection', $vendorDirectory . '/symfony/dependency-injection/Symfony/Component/DependencyInjection')
	->addDirectory('Symfony\Component\FileSystem', $vendorDirectory . '/symfony/filesystem/Symfony/Component/FileSystem')
	->addDirectory('Symfony\Component\Yaml', $vendorDirectory . '/symfony/yaml/Symfony/Component/Yaml')
;

if (defined('mageekguy\atoum\scripts\runner') === true) {
	\mageekguy\atoum\scripts\runner::addConfigurationCallable(function($script, $runner) {
		$runner->addExtension(new \mageekguy\atoum\config\extension($script));
	});
}
