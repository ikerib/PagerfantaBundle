<?php declare(strict_types=1);

namespace BabDev\PagerfantaBundle\Serializer\Normalizer;

use Pagerfanta\PagerfantaInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

if (method_exists(ArrayDenormalizer::class, 'setSerializer')) {
    /**
     * Compatibility class supporting Symfony 5.4 and earlier.
     *
     * @internal
     */
    abstract class PagerfantaCompatNormalizer extends PagerfantaSymfony5Normalizer
    {
    }
} else {
    /**
     * Compatibility class supporting Symfony 6.0 and later.
     *
     * @internal
     */
    abstract class PagerfantaCompatNormalizer extends PagerfantaSymfony6Normalizer
    {
    }
}

final class PagerfantaNormalizer extends PagerfantaCompatNormalizer
{
    protected function doNormalize(PagerfantaInterface $object, string $format = null, array $context = []): array
    {
        return [
            'items' => $this->normalizer->normalize($object->getIterator(), $format, $context),
            'pagination' => [
                'current_page' => $object->getCurrentPage(),
                'has_previous_page' => $object->hasPreviousPage(),
                'has_next_page' => $object->hasNextPage(),
                'per_page' => $object->getMaxPerPage(),
                'total_items' => $object->getNbResults(),
                'total_pages' => $object->getNbPages(),
            ],
        ];
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof PagerfantaInterface;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
