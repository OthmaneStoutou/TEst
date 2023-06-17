<?php

namespace App\Factory;

use App\Entity\DataCenter;
use App\Repository\DataCenterRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<DataCenter>
 *
 * @method        DataCenter|Proxy create(array|callable $attributes = [])
 * @method static DataCenter|Proxy createOne(array $attributes = [])
 * @method static DataCenter|Proxy find(object|array|mixed $criteria)
 * @method static DataCenter|Proxy findOrCreate(array $attributes)
 * @method static DataCenter|Proxy first(string $sortedField = 'id')
 * @method static DataCenter|Proxy last(string $sortedField = 'id')
 * @method static DataCenter|Proxy random(array $attributes = [])
 * @method static DataCenter|Proxy randomOrCreate(array $attributes = [])
 * @method static DataCenterRepository|RepositoryProxy repository()
 * @method static DataCenter[]|Proxy[] all()
 * @method static DataCenter[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static DataCenter[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static DataCenter[]|Proxy[] findBy(array $attributes)
 * @method static DataCenter[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static DataCenter[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class DataCenterFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'SquareFootage' => self::faker()->randomNumber(),
            'container' => ContainerFactory::new(),
            'DeliveryAddress'=>self::faker()->text(10),
            'Administrator'=>self::faker()->name(10),
            'MaxkW'=>self::faker()->numberBetween(1,10),
            'DrawingFileName'=>self::faker()->text(10),
            'EntryLogging'=>self::faker()->numberBetween(1,10)
            ,'MapX'=>self::faker()->numberBetween(1,10),
            'MapY'=>self::faker()->numberBetween(1,10),
            'U1Position'=>self::faker()->text(20)
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(DataCenter $dataCenter): void {})
        ;
    }

    protected static function getClass(): string
    {
        return DataCenter::class;
    }
}
