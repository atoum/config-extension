# atoum/config-extension [![Build Status](https://travis-ci.org/atoum/config-extension.svg?branch=master)](https://travis-ci.org/atoum/config-extension)

![atoum](http://downloads.atoum.org/images/logo.png)

## Install it

Install extension using [composer](https://getcomposer.org):

```json
{
    "require-dev": {
        "atoum/config-extension": "~1.0"
    },
}

```

Enable the extension using atoum configuration file:

```php
<?php

// .atoum.php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use mageekguy\atoum\config;

$runner->addExtension(new config\extension($script));

// Or

new config\extension($script);
```

## Use it

```yaml
# .atoum.yml

atoum:
    directories:
        - ./tests/units/classes

    fields:
        default:
            - field.logo
            - field.logo.result
            - field.coverage

    reports:
        - default
        - report.coverage.clover

```
