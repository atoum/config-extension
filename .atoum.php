<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

use mageekguy\atoum\config;

$runner->addExtension(new config\extension($script));
