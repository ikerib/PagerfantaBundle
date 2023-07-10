# Installation & Setup

To install this bundle, run the following [Composer](https://getcomposer.org/) command:

```bash
composer require babdev/pagerfanta-bundle
```

<div class="docs-note">The bundle only installs the <code>pagerfanta/core</code> package which provides the core Pagerfanta API. Please see the <a href="/open-source/packages/pagerfanta/docs/installation">Pagerfanta installation</a> documentation for information on how to install the adapters your project will need.</div>

## Register The Bundle

For an application using Symfony Flex the bundle should be automatically registered, but if not you will need to add it to your `config/bundles.php` file.

```php
<?php

return [
    // ...

    BabDev\PagerfantaBundle\BabDevPagerfantaBundle::class => ['all' => true],
];
```
