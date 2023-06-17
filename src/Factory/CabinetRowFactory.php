<?php

namespace App\Factory;

use App\Entity\CabinetRow;
use App\Entity\DataCenter;
use App\Repository\CabinetRowRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<CabinetRow>
 *
 * @method        CabinetRow|Proxy create(array|callable $attributes = [])
 * @method static CabinetRow|Proxy createOne(array $attributes = [])
 * @method static CabinetRow|Proxy find(object|array|mixed $criteria)
 * @method static CabinetRow|Proxy findOrCreate(array $attributes)
 * @method static CabinetRow|Proxy first(string $sortedField = 'id')
 * @method static CabinetRow|Proxy last(string $sortedField = 'id')
 * @method static CabinetRow|Proxy random(array $attributes = [])
 * @method static CabinetRow|Proxy randomOrCreate(array $attributes = [])
 * @method static CabinetRowRepository|RepositoryProxy repository()
 * @method static CabinetRow[]|Proxy[] all()
 * @method static CabinetRow[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static CabinetRow[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static CabinetRow[]|Proxy[] findBy(array $attributes)
 * @method static CabinetRow[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CabinetRow[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CabinetRowFactory extends ModelFactory
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
            'Name'=>self::faker()->name()
            ,'datacenter'=>DataCenterFactory::randomOrCreate(),
            'zone'=>ZoneFactory::randomOrCreate()
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(CabinetRow $cabinetRow): void {})
        ;
    }

    protected static function getClass(): string
    {
        return CabinetRow::class;
    }
}
