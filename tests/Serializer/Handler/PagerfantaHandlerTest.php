<?php declare(strict_types=1);

namespace BabDev\PagerfantaBundle\Tests\Serializer\Handler;

use BabDev\PagerfantaBundle\Serializer\Handler\PagerfantaHandler;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Pagerfanta\Adapter\FixedAdapter;
use Pagerfanta\Pagerfanta;
use PHPUnit\Framework\TestCase;

final class PagerfantaHandlerTest extends TestCase
{
    public function testSerializeToJson(): void
    {
        $pager = new Pagerfanta(new FixedAdapter(100, range(1, 5)));
        $pager->setMaxPerPage(5);

        self::assertJsonStringEqualsJsonString(
            '{"items":[1,2,3,4,5],"pagination":{"current_page":1,"has_previous_page":false,"has_next_page":true,"per_page":5,"total_items":100,"total_pages":20}}',
            $this->createSerializer()->serialize($pager, 'json')
        );
    }

    private function createSerializer(): SerializerInterface
    {
        $registry = new HandlerRegistry();
        $registry->registerSubscribingHandler(new PagerfantaHandler());

        return SerializerBuilder::create($registry, new EventDispatcher())->build();
    }
}
