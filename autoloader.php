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
;



$components = array(
	'config' => 'Config',
	'dependency-injection' => 'DependencyInjection',
	'filesystem' => 'FileSystem',
	'yaml' => 'Yaml',
);

foreach ($components as $componentKey => $componentName) {
	$componentDir = $vendorDirectory . '/symfony/' . $componentKey . '/Symfony/Component/' . $componentName;
	if (!is_dir($componentDir)) {
		$componentDir = $vendorDirectory . '/symfony/' . $componentKey;
	}
	atoum\autoloader::get()
		->addDirectory('Symfony\Component\\' . $componentName, $componentDir)
	;
}

