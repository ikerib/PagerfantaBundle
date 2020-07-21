<?php declare(strict_types=1);

namespace BabDev\PagerfantaBundle\Tests\DependencyInjection;

use BabDev\PagerfantaBundle\DependencyInjection\BabDevPagerfantaExtension;
use BabDev\PagerfantaBundle\DependencyInjection\Configuration;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Pagerfanta\View\ViewFactory;
use Pagerfanta\View\ViewFactoryInterface;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\KernelEvents;

final class BabDevPagerfantaExtensionTest extends AbstractExtensionTestCase
{
    public function testContainerIsLoadedWithDefaultConfigurationWhenTwigBundleIsNotInstalled(): void
    {
        $this->container->setParameter(
            'kernel.bundles',
            []
        );

        $this->load();

        $this->assertContainerBuilderHasParameter('babdev_pagerfanta.default_view');
        $this->assertContainerBuilderHasParameter('babdev_pagerfanta.default_twig_template');

        $this->assertContainerBuilderHasAlias(ViewFactory::class, 'pagerfanta.view_factory');
        $this->assertContainerBuilderHasAlias(ViewFactoryInterface::class, 'pagerfanta.view_factory');

        $listeners = [
            'pagerfanta.event_listener.convert_not_valid_max_per_page_to_not_found',
            'pagerfanta.event_listener.convert_not_valid_current_page_to_not_found',
        ];

        foreach ($listeners as $listener) {
            $this->assertContainerBuilderHasServiceDefinitionWithTag(
                $listener,
                'kernel.event_listener',
                [
                    'event' => KernelEvents::EXCEPTION,
                    'method' => 'onKernelException',
                    'priority' => 512,
                ]
            );
        }

        $twigServices = [
            'pagerfanta.twig_extension',
            'pagerfanta.twig_runtime',
            'pagerfanta.view.twig',
        ];

        foreach ($twigServices as $twigService) {
            $this->assertContainerBuilderNotHasService($twigService);
        }
    }

    public function testContainerIsLoadedWithDefaultConfigurationWhenTwigBundleIsInstalled(): void
    {
        $this->container->setParameter(
            'kernel.bundles',
            [
                'TwigBundle' => TwigBundle::class,
            ]
        );

        $this->load();

        $this->assertContainerBuilderHasParameter('babdev_pagerfanta.default_view');
        $this->assertContainerBuilderHasParameter('babdev_pagerfanta.default_twig_template');

        $this->assertContainerBuilderHasAlias(ViewFactory::class, 'pagerfanta.view_factory');
        $this->assertContainerBuilderHasAlias(ViewFactoryInterface::class, 'pagerfanta.view_factory');

        $listeners = [
            'pagerfanta.event_listener.convert_not_valid_max_per_page_to_not_found',
            'pagerfanta.event_listener.convert_not_valid_current_page_to_not_found',
        ];

        foreach ($listeners as $listener) {
            $this->assertContainerBuilderHasServiceDefinitionWithTag(
                $listener,
                'kernel.event_listener',
                [
                    'event' => KernelEvents::EXCEPTION,
                    'method' => 'onKernelException',
                    'priority' => 512,
                ]
            );
        }

        $twigServices = [
            'pagerfanta.twig_extension',
            'pagerfanta.twig_runtime',
            'pagerfanta.view.twig',
        ];

        foreach ($twigServices as $twigService) {
            $this->assertContainerBuilderHasService($twigService);
        }
    }

    public function testContainerIsLoadedWhenBundleIsConfiguredWithCustomExceptionStrategies(): void
    {
        $this->container->setParameter(
            'kernel.bundles',
            []
        );

        $bundleConfig = [
            'exceptions_strategy' => [
                'out_of_range_page' => Configuration::EXCEPTION_STRATEGY_CUSTOM,
                'not_valid_current_page' => Configuration::EXCEPTION_STRATEGY_CUSTOM,
            ],
        ];

        $this->load($bundleConfig);

        $this->assertContainerBuilderHasParameter('babdev_pagerfanta.default_view');
        $this->assertContainerBuilderHasParameter('babdev_pagerfanta.default_twig_template');

        $this->assertContainerBuilderHasAlias(ViewFactory::class, 'pagerfanta.view_factory');
        $this->assertContainerBuilderHasAlias(ViewFactoryInterface::class, 'pagerfanta.view_factory');

        $listeners = [
            'pagerfanta.event_listener.convert_not_valid_max_per_page_to_not_found',
            'pagerfanta.event_listener.convert_not_valid_current_page_to_not_found',
        ];

        foreach ($listeners as $listener) {
            $this->assertContainerBuilderNotHasService($listener);
        }
    }

    protected function getContainerExtensions(): array
    {
        return [
            new BabDevPagerfantaExtension(),
        ];
    }
}
