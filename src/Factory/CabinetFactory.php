<?php

namespace App\Factory;

use App\Entity\Cabinet;
use App\Repository\CabinetRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Cabinet>
 *
 * @method        Cabinet|Proxy create(array|callable $attributes = [])
 * @method static Cabinet|Proxy createOne(array $attributes = [])
 * @method static Cabinet|Proxy find(object|array|mixed $criteria)
 * @method static Cabinet|Proxy findOrCreate(array $attributes)
 * @method static Cabinet|Proxy first(string $sortedField = 'id')
 * @method static Cabinet|Proxy last(string $sortedField = 'id')
 * @method static Cabinet|Proxy random(array $attributes = [])
 * @method static Cabinet|Proxy randomOrCreate(array $attributes = [])
 * @method static CabinetRepository|RepositoryProxy repository()
 * @method static Cabinet[]|Proxy[] all()
 * @method static Cabinet[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Cabinet[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Cabinet[]|Proxy[] findBy(array $attributes)
 * @method static Cabinet[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Cabinet[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CabinetFactory extends ModelFactory
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
            'MapY1' => self::faker()->numberBetween(1,10),
            'MaxWeight' => self::faker()->numberBetween(1,10),
            'U1Position' => self::faker()->realText(),
            'FrontEdge'=>self::faker()->text(10)
            ,'Location'=>self::faker()->locale(10)
            ,'AssignedTo'=>self::faker()->numberBetween(1,20)
            ,'CabinetHeight'=>self::faker()->numberBetween(1,20)
            ,'Model'=>self::faker()->text(10)
            ,'Keylock'=>self::faker()->text(10)
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Cabinet $cabinet): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Cabinet::class;
    }
}
