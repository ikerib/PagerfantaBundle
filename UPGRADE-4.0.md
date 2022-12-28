# Upgrade from 3.x to 4.0

The below guide will assist in upgrading from the 3.x versions to 4.0.

## Bundle Requirements

- Symfony 5.4 or 6.2+
- PHP 8.1 or later
- Pagerfanta 3.0 or later

## General Changes

- A `Symfony\Component\PropertyAccess\PropertyAccessorInterface` is now required in `BabDev\PagerfantaBundle\RouteGenerator\RequestAwareRouteGeneratorFactory` and `BabDev\PagerfantaBundle\RouteGenerator\RouterAwareRouteGenerator`
- The default Twig template is now `@BabDevPagerfanta/default.html.twig`
- Services which had public visibility deprecated are now private

## Removed Features

- The `Pagerfanta\View\ViewFactory` service alias has been removed, use either the `Pagerfanta\View\ViewFactoryInterface` alias or the `pagerfanta.view_factory` ID
- The `babdev_pagerfanta.default_twig_template` and `babdev_pagerfanta.default_view` container parameters have been removed
