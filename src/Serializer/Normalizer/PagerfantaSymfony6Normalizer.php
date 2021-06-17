<?php declare(strict_types=1);

namespace BabDev\PagerfantaBundle\Serializer\Normalizer;

use Pagerfanta\PagerfantaInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Compatibility class supporting Symfony 6.0 and later.
 *
 * Class exists as a separate file to avoid parser errors with this compatibility layer on PHP 7.4.
 *
 * @internal
 */
abstract class PagerfantaSymfony6Normalizer implements NormalizerInterface, CacheableSupportsMethodInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    /**
     * @param mixed $object Object to normalize
     *
     * @throws InvalidArgumentException when the object given is not a supported type for the normalizer
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        if (!$object instanceof PagerfantaInterface) {
            throw new InvalidArgumentException(sprintf('The object must be an instance of "%s".', PagerfantaInterface::class));
        }

        return $this->doNormalize($object, $format, $context);
    }

    abstract protected function doNormalize(PagerfantaInterface $object, string $format = null, array $context = []): array;
}
