# CRUD Bundle by Dévelopathe

The CRUD Bundle by Developathe extends the Doctrine CRUD command and implements basic templates for Twitter Bootstrap 3.1.1.

Author: [\_alK13](http://al.k13.fr) - [Team Developathe](http://developathe.com)

## Installation

Register the bundle in your composer.json file.
```
{
    "require": {
        "developathe/crud-bundle": "dev-master",
    }
}
```

Install the bundle:
```
$ composer update
```

Register the bundle:
``` php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        new Developathe\CrudBundle\DevelopatheCrudBundle(),
        // ...
    );
}
```

Edit the *app/config/config.yml* file and implement the Twig configuration for form's fields:
```
# Twig Configuration
twig:
    debug:            "%kernel.debug%"
    strict_variables: "%kernel.debug%"
    form:
        resources:
            - 'DevelopatheCrudBundle:Form:fields.html.twig'
```

Edit the *app/config/config.yml* file and add the DevelopatheCrudBundle to the Assetic configuration:
```
assetic:
    debug:          "%kernel.debug%"
    use_controller: false
    bundles:        [ DevelopatheCrudBundle ]
```

## Usage

Now, you can use the DevelopatheCrudBundle command:
```
php app/console developathe:generate:crud
```
