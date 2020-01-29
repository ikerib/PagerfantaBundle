<?php declare(strict_types=1);

namespace BabDev\PagerfantaBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class PagerfantaExtension extends AbstractExtension
{
    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('pagerfanta', [PagerfantaRuntime::class, 'renderPagerfanta'], ['is_safe' => ['html']]),
            new TwigFunction('pagerfanta_page_url', [PagerfantaRuntime::class, 'getPageUrl']),
        ];
    }
}
