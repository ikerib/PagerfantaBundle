# Upgrade from 3.x to 4.0

The below guide will assist in upgrading from the 3.x versions to 4.0.

## Bundle Requirements

- Symfony 5.4 or 6.2+
- PHP 8.1 or later
- Pagerfanta 3.0 or later

## General Changes

- A `Symfony\Component\PropertyAccess\PropertyAccessorInterface` is now required in `BabDev\PagerfantaBundle\RouteGenerator\RequestAwareRouteGeneratorFactory` and `BabDev\PagerfantaBundle\RouteGenerator\RouterAwareRouteGenerator`

## Removed Features
