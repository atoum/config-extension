# atoum/config-extension [![Build Status](https://travis-ci.org/atoum/config-extension.svg?branch=master)](https://travis-ci.org/atoum/config-extension)

This extension will allow you to configure atoum using a YAML file and/or environnement variables.

## Example

When using this extension, you can put a `.atoum.yml` on the root of your repository to configure atoum. Here is an exemple on how to tell atoum to look for unit tests in the `tests/units/classes` folder.

```yaml
# .atoum.yml

atoum:
    directories:
        - ./tests/units/classes
```

## Install it

Install extension using [composer](https://getcomposer.org):

```
composer require --dev atoum/config-extension
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

## Configuration reference

### atoum.loop

`boolean` : enable/disable atoum's [loop mode](http://docs.atoum.org/en/latest/mode-loop.html). Defaults on `ATOUM_LOOP` environnement variable.

Exemple:

```
atoum:
  loop: true
```

### atoum.debug

`boolean` : enable/disable atoum's [debug mode](http://docs.atoum.org/en/latest/mode-debug.html). Defaults on `ATOUM_DEBUG` environnement variable.

Exemple:

```
atoum:
  debug: true
```

### atoum.verbosity

`integer` : value between 1 and 3 determining atoum's verbosity level'. Defaults on `ATOUM_VERBOSITY` environnement variable.

Exemple:

```
atoum:
  verbosity: 2
```

### atoum.directories

`array` : List of directories where atoum will look for unit tests. Defaults on `ATOUM_DIRECTORIES` environnement variable (a coma separated list of directories).

```yaml
atoum:
    directories:
        - ./tests/units/classes
```

### atoum.reports

`array` : List of reports. Defaults on `ATOUM_REPORTS` environnement variable (a coma separated list of reports).

Example:

```yaml
atoum:
    reports:
        - default
        - report.coverage.clover
```

Possible values :

#### default

adds atoum's default reporter (when the reports key is defined, atoum's default reporter is no longer used).

#### report.coverage.clover

Adds a clover [coverage reporter](http://docs.atoum.org/en/latest/configuration_bootstraping.html#code-coverage).

Path to were the report will be written could be configured using the [coverage.clover.filename](#coveragecloverfilename) parameter.

#### report.xunit

Adds an [xUnit reporter](http://docs.atoum.org/en/latest/configuration_bootstraping.html#using-standard-reports).

Path to were the report will be written could be configured using the [xunit.filename](#xunitfilename) parameter.

#### report.tap

Adds a [TAP reporter](http://docs.atoum.org/en/latest/configuration_bootstraping.html#using-standard-reports).

#### report.vim

Adds a [vim reporter](http://docs.atoum.org/en/latest/configuration_bootstraping.html#using-standard-reports).

##### report.nyancat

Adds a reporter that displays a nyancat.

#### report.santa

Adds a [santa reporter](http://docs.atoum.org/en/latest/configuration_bootstraping.html#having-fun-with-atoum).


### atoum.fields

Fields allows you to customize reports.
You can add fields for each report.

You need to add the report name as key, then add an array of fields.

This example adds the logo field to the default report :

```yaml
atoum:
    reports:
        - default

    fields:
        default:
            - field.logo
```

#### field.logo

Displays atoum's logo at the begining of the report.
Only works on cli reports.

#### field.logo.result

Displays atoum's logo at the end of the report.
Only works on cli reports.

#### field.coverage.html

Generate an HTML coverage reports.
Needs the php extension `xdebug` to be installed.

The project name in generated report and folder where the report will be generated could by configured with the [project.name](#projectname) and [coverage.html.directory](#coveragehtmldirectory) and parameters.


### parameters

You can customize the way reports or fields are generated using the `parameters` section on the `.atoum.yml` file.

Here is an example that changes the path where the xunit report is generated:

```yaml
atoum:
    reports:
        - report.xml
parameters:
    xunit.filename: "mylogs/file.xml"
```

#### xunit.filename

Default value : `xunit.xml`.

Path were the xUnit report will be written in the [report.xunit](#reportxunit) report.

The directory where the file is generated must exists, it will not be created by atoum.

#### coverage.html.directory

Default value : `./coverage`.

Path to the folder where the HTML coverage files will be written. See [field.coverage.html](#fieldcoveragehtml) field.

#### project.name

Default value : `atoum`.

Will be used when generating the [field.coverage.html](#fieldcoveragehtml) field.


#### coverage.clover.filename

Default value : `clover.xml`.

Path where the clover report will be written in the [report.clover](#reportclover) report.


## Links

* [atoum](http://atoum.org)
* [atoum's documentation](http://docs.atoum.org)

## License

config-extension is released under the BSD-3-Clause License. See the bundled LICENSE file for details.

![atoum](http://atoum.org/images/logo/atoum.png)
