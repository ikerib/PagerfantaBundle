<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BabDev\PagerfantaBundle\Serializer\Normalizer\LegacyPagerfantaNormalizer;
use BabDev\PagerfantaBundle\Serializer\Normalizer\PagerfantaNormalizer;
use Composer\InstalledVersions;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $normalizer = PagerfantaNormalizer::class;
    if (class_exists(InstalledVersions::class)) {
        $version = InstalledVersions::getVersion('symfony/serializer');
        if ($version !== null && version_compare($version, '6.3', '<')) {
            $normalizer = LegacyPagerfantaNormalizer::class;
        }
    }

    $services->set('pagerfanta.serializer.normalizer', $normalizer)
        ->tag('serializer.normalizer')
    ;
};
